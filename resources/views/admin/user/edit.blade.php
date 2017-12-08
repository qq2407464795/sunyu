@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>用户更新</h3>
@endsection

@section('content')

              
<div class="row">
<div class="col-lg-6">
    
        <div class="panel-body">
            <form role="form" action="/user/{{$user->id}}" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="exampleInputEmail1">用户名</label>
                    <input type="text" class="form-control" name="username" placeholder="Name" value="{{$user->username}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">手机号</label>
                    <input type="text" class="form-control" name="tel" placeholder="Tel" value="{{$user->tel}}">
                </div>
                <div class="form-group">
                    <img src="{{$user->file}}" alt="" width="200">
                    <label for="exampleInputFile">头像</label>
                    <input type="file" name="file">
                </div> 
                {{csrf_field()}}
                {{method_field('PUT')}}     
                <button type="submit" class="btn btn-primary">确认更新</button>
            </form>
        </div>
    
</div>
</div>
                  
@endsection