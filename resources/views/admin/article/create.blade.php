@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>商品添加</h3>
@endsection

@section('content')
<script type="text/javascript" charset="utf-8" src="/plugings/ueditor/ueditor.config.js"></script>
<script type="text/javascript" charset="utf-8" src="/plugings/ueditor/ueditor.all.min.js"> </script>
<!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
<!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
<script type="text/javascript" charset="utf-8" src="/plugings/ueditor/lang/zh-cn/zh-cn.js"></script>
              
<div class="row">
<div class="col-lg-6">
    
      	<div class="panel-body">
          	<form role="form" action="/article" method="post" enctype="multipart/form-data">
              	<div class="form-group">
                    <label for="exampleInputEmail1">商品名称</label>
                    <input type="text" class="form-control" name="title" placeholder="Name">
              	</div>
                <div class="form-group">
                    <label for="exampleInputEmail1">父级分类</label>
                    <select  class="form-control" name="parentid">
                      <option value="0">顶级分类</option>
                      @foreach($articles as $k=>$v)
                        <option value="{{$v->id}}">{{$v->title}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品现价</label>
                    <input type="text" class="form-control" name="xianjia" placeholder="Xianjia">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">商品原价</label>
                    <input type="text" class="form-control" name="yuanjia" placeholder="Yuanjia">
                </div>
              	<div class="form-group">
	                <label for="exampleInputFile">商品图片</label>
	                <input type="file" name="img">
                </div> 
                <div class="form-group">
                  <label for="exampleInputFile">商品介绍</label>          
                  <script id="editor" type="text/plain" name="content" style="width:1024px;height:200px;"></script>
                </div> 
                {{csrf_field()}}        
                <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
    
</div>
</div>
 
 <script>
    var ue = UE.getEditor('editor',{
        // toolbars: [
        //     ['fullscreen', 'source', 'undo', 'redo', 'bold']
        // ]
    });
 </script>                 
@endsection