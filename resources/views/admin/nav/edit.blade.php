@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>导航更新</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
      	<div class="panel-body">
          	<form role="form" action="/nav" method="post" enctype="multipart/form-data">
              	<div class="form-group">
                    <label for="exampleInputEmail1">导航名称</label>
                    <input type="text" class="form-control" style="width: 50%;" name="title" value="{{$nav->title}}">
              	</div>
	            
                {{csrf_field()}}        
                <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection