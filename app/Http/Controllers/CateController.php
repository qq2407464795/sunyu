<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cates = DB::select("select id,name,parentid,img,concat(path,'_',id) as paths from cates  order by paths");
        //dd($cates);
        foreach ($cates as $key => $value) {
            //dd(explode('_',$value->paths));
            $count = count(explode('_',$value->paths))-2;
            //dd($count);

            $value->name = str_repeat('|----',$count).$value->name;
        }

       
        //解析模板

        return view('admin.cate.index',[
            'cates'=>$cates
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = DB::table('cates')->get();
        return view('admin.cate.create',['cates'=>$cates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        
        if($data['parentid'] == 0) {
            $data['path'] = '0';
        }else{
            $p = DB::table('cates')->where('id',$data['parentid'])->first();
            $data['path'] = $p->path.'_'.$p->id;
             //dd($data['path']);
        }

        //文件上传
        if($request->hasFile('img')) {
            //获取文件的后缀名
            $suffix = $request->file('img')->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $request->file('img')->move($dir, $name);
            //获取文件的路径
            $data['img'] = trim($dir.'/'.$name,'.');
        
        }


        //将数据插入到数据库中
        if(DB::table('cates')->insert($data)) {
            return redirect('/cate')->with('msg','添加成功');
        }else{
            return back()->with('msg','添加失败!!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cate = DB::table('cates')->where('id',$id)->first();
        $path = $cate->path .'_'.$cate->id;
        $res = DB::table('cates')->where('path','like',$path.'%')->delete();

        if(DB::table('cates')->where('id',$id)->delete()) {
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败');
        };
    }
}
