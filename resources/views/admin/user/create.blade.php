@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>用户添加</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
      	<div class="panel-body">
          	<form role="form" action="/user" method="post" enctype="multipart/form-data">
              	<div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" class="form-control" name="username" placeholder="Name">
              	</div>
	            <div class="form-group">
	                <label for="exampleInputPassword1">密码</label>
                  	<input type="password" class="form-control" name="password" placeholder="Password">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputPassword1">确认密码</label>
                  	<input type="password" class="form-control" name="repassword" placeholder="Repassword">
	            </div>
	            <div class="form-group">
	                <label for="exampleInputPassword1">手机号</label>
                  	<input type="text" class="form-control" name="tel" placeholder="Tel">
	            </div>
              	<div class="form-group">
	                <label for="exampleInputFile">头像</label>
	                <input type="file" name="file">
                </div> 
                {{csrf_field()}}        
                <button type="submit" class="btn btn-primary">添加</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection