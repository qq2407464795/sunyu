@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>站点添加</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
      	<div class="panel-body">
          	<form role="form" action="/zhandian" method="post" enctype="multipart/form-data">
              	<div class="form-group">
                    <label for="exampleInputEmail1">公司名称</label>
                    <input type="text" class="form-control" name="comname" placeholder="Common">
              	</div>
                <div class="form-group">
                    <label for="exampleInputEmail1">网站名称</label>
                    <input type="text" class="form-control" name="webname" placeholder="Web">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京ICP证</label>
                    <input type="text" class="form-control" name="zheng" placeholder="京ICP证">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京ICP备</label>
                    <input type="text" class="form-control" name="bei" placeholder="京ICP备">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京公网安备</label>
                    <input type="text" class="form-control" name="gongwang" placeholder="京公网安备">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京网文</label>
                    <input type="text" class="form-control" name="wangwen" placeholder="京网文">
                </div>
	            
                {{csrf_field()}}        
                <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection