@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>站点更新</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
      	<div class="panel-body">
          	<form role="form" action="/zhandian/{{$zhandian->id}}" method="post" enctype="multipart/form-data">
              	<div class="form-group">
                    <label for="exampleInputEmail1">公司名称</label>
                    <input type="text" class="form-control" name="comname" value="{{$zhandian->comname}}">
              	</div>
                <div class="form-group">
                    <label for="exampleInputEmail1">网站名称</label>
                    <input type="text" class="form-control" name="webname" value="{{$zhandian->webname}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京ICP证</label>
                    <input type="text" class="form-control" name="zheng" value="{{$zhandian->zheng}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京ICP备</label>
                    <input type="text" class="form-control" name="bei" value="{{$zhandian->bei}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京公网安备</label>
                    <input type="text" class="form-control" name="gongwang" value="{{$zhandian->gongwang}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">京网文</label>
                    <input type="text" class="form-control" name="wangwen" value="{{$zhandian->wangwen}}">
                </div>
	            {{method_field('PUT')}}
                {{csrf_field()}}        
                <button type="submit" class="btn btn-primary">更新</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection