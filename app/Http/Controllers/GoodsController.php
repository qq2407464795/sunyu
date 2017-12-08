<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class GoodsController extends Controller
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
            $goods = DB::table('goods')
                ->where('title','like','%'.$keywords.'%')
                ->paginate($num);
        }else{
            //列表显示
            $goods = DB::table('goods')->paginate($num);
        }


        //解析模板
        return view('admin.goods.index', [
            'goods'=>$goods,
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
        return view('admin.goods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

        $data = $request->only(['title','xianjia','yuanjia','content','kucun']);

        //时间
        $data['addtime'] = datE('Y-m-d H:i:s');
        $data['status'] = 1;

        //将数据插入商品表中
        $res = DB::table('goods')->insertGetid($data);

        if($res > 0) {
            if($request->hasFile('img')){
                $images = [];
            foreach ($request->file('img') as $k=>$v) {
                $tmp =[];
            //获取文件的后缀名
            $suffix = $v->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $v->move($dir, $name);
            //获取文件路径
            $tmp['goods_id'] = $res;
            $tmp['img'] = trim($dir.'/'.$name,'.');
            $images[] = $tmp;
            
            }

            //将图片信息插入商品图片中
            DB::table('goods_pic')->insert($images);
            }
            return redirect('/goods')->with('msg','添加成功');
            }else{
                return redirect('/goods')->with('msg','添加失败');
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
        //获取商品信息
        $goods = DB::table('goods')->where('id',$id)->first();
        //读取商品信息
        $goods_pic = DB::table('goods_pic')->where('goods_id',$id)->get();


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $goods = DB::table('goods')->where('id',$id)->first();
        return view('admin.goods.edit', ['goods'=>$goods]);
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
        $data = $request->only(['title','xianjia','yuanjia','content','kucun']);
        // dd($data);
        //时间
        $data['addtime'] = datE('Y-m-d H:i:s');
        $data['status'] = 1;
        $res = DB::table('goods')->where('id',$id)->update($data);
        // dd($res);

        if($res > 0) {
            if($request->hasFile('img')){
                $images = [];
            foreach ($request->file('img') as $k=>$v) {
                $tmp =[];
            //获取文件的后缀名
            $suffix = $v->extension();
            //创建一个新的随机名称
            $name = uniqid('img_').'.'.$suffix;
            //文件夹路径
            $dir = './uploads/'.date('Y-m-d');
            //移动文件
            $v->move($dir, $name);
            //获取文件路径
            $tmp['goods_id'] = $res;
            $tmp['img'] = trim($dir.'/'.$name,'.');
            $images[] = $tmp;
            
            }

            //将图片信息插入商品图片中
            DB::table('goods_pic')->update($images);
            }
            return redirect('/goods')->with('msg','添加成功');
            }else{
                return redirect('/goods')->with('msg','添加失败');
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
        //
    }
}
