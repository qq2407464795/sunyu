<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ZhandianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $num = $request->input('num', 10);
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $infor = DB::table('infor')
                ->where('title','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $infor = DB::table('infor')->paginate($num);
        }


        //解析模板
        return view('admin.zhandian.index', [
            'infor'=>$infor,
            'keywords' => $keywords,
            'num' => $num
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.zhandian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       //获取参数
        $data = $request->only(['comname','webname','zheng','bei','gongwang','wangwen']);


        //将数据插入到数据库中
        if(DB::table('infor')->insert($data)) {
            return redirect('/zhandian')->with('msg','添加成功');
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
         //读取当前用户的信息
        $zhandian = DB::table('infor')->where('id',$id)->first();

        return view('admin.zhandian.edit', ['zhandian'=>$zhandian]);
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
        //获取参数
        $data = $request->only(['comname','webname','zheng','bei','gongwang','wangwen']);

        //将数据插入到数据库中
        if(DB::table('infor')->where('id',$id)->update($data)) {
            return redirect('/zhandian')->with('msg','更新成功');
        }else{
            return back()->with('msg','更新失败!!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //执行删除
        if(DB::table('infor')->where('id', $id)->delete()) {
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败!!');
        }
    }
}
