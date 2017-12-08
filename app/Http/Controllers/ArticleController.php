<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles = DB::select("select id,parentid,img,title,xianjia,yuanjia,content,concat(path,'_',id) as paths from articles order by paths");

        

        foreach ($articles as $key => $value) {
            $count = count(explode('_',$value->paths))-2;

            $value->title = str_repeat('|----',$count).$value->title;
        }

        $num = $request->input('num', 10);
        $keywords = $request->input('keywords','');

        //关键字检索
        if($request->has('keywords')) {
            //列表显示
            $articles = DB::table('articles')
                ->where('title','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $articles = DB::table('articles')->paginate($num);
        }


        //解析模板
        return view('admin.article.index', [
            'articles'=>$articles,
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
        $articles = DB::table('articles')->get();
        return view('admin.article.create',[
            'articles'=>$articles
            ]);
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
        $data = $request->except(['_token']);


        if($data['parentid'] == 0) {
            $data['path'] = '0';
        }else{
            $p = DB::table('articles')->where('id',$data['parentid'])->first();
            $data['path'] = $p->path.'_'.$p->id;
        }

        //针对图片处理
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
        if(DB::table('articles')->insert($data)) {
            return redirect('/article')->with('msg','添加成功');
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
        $article = DB::table('articles')->where('id',$id)->first();

        return view('admin.article.edit', ['article'=>$article]);
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
        $data = $request->only(['title','xianjia','yuanjia','content','parentid']);

        //针对图片处理
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
        if(DB::table('articles')->where('id',$id)->update($data)) {
            return redirect('/article')->with('msg','更新成功');
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

        $article = DB::table('articles')->where('id',$id)->first();
        $path = $article->path .'_'.$article->id;
        $res = DB::table('articles')->where('path','like',$path.'%')->delete();
        //执行删除
        if(DB::table('articles')->where('id', $id)->delete()) {
            return back()->with('msg','删除成功');
        }else{
            return back()->with('msg','删除失败!!');
        }
    }
}
