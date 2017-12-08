@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>站点列表</h3>
@endsection

@section('content')
<div class="row">
	<form action="/zhandian" class="navbar-form">
              <div class="row">
                  <div class="col-sm-6">
                      <div class="dataTables_length" id="dataTables-example_length">每页显示
                          <select name="num" aria-controls="dataTables-example" class="nput-sm">
                                  <option value="10" @if($num == 10) selected @endif>10</option>
                                  <option value="25" @if($num == 25) selected @endif>25</option>
                                  <option value="50" @if($num == 50) selected @endif>50</option>
                                  <option value="100" @if($num == 100) selected @endif>100</option>
                          </select>条
                      </div>
                  </div>
                  <div class="col-sm-6 text-right">
                      <div id="dataTables-example_filter" class="dataTables_filter">
                          <label>关键字:
                              <input type="search" value="{{$keywords}}" name="keywords" class="form-control input-sm" placeholder="" aria-controls="dataTables-example"><button type="submit" class="btn btn-sm btn-info">搜索</button>
                          </label>
                      </div>
                  </div>
              </div>
          </form>
  	<div class="col-lg-12">
      	<section class="panel">          	          
          	<table class="table table-striped table-advance table-hover">
           		<tbody>
              		<tr>
              			<th> ID</th>
                 		<th> 公司名称</th>
                 		<th> 网站名称</th>
                 		<th> 京ICP证</th>
                 		<th> 京ICP备</th>
                    <th> 京公网安备</th>
                    <th> 京网文</th>
                    <th> 操作</th>
              		</tr>
                  @if(count($infor) > 0)
              		@foreach ($infor as $k => $v)
              		<tr class="col-md-12">
                 		<td>{{$v->id}}</td>                 		
                 		<td class="col-md-2">{{$v->comname}}</td>
                 		<td class="col-md-2">{{$v->webname}}</td>
                    <td class="col-md-2">{{$v->zheng}}</td>
                    <td class="col-md-2">{{$v->bei}}</td>
                    <td class="col-md-1">{{$v->gongwang}}</td>
                    <td class="col-md-1">{{$v->wangwen}}</td>                 		
                 		<td>
                  		<div class="btn-group">
                      		<a class="btn btn-primary" href="/zhandian/{{$v->id}}/edit"><i class="icon_plus_alt2"></i></a>
                          	
                            <form class="del" action="/zhandian/{{$v->id}}" method="post" style="float:left">
                            {{method_field('DELETE')}}
                            {{csrf_field()}}
                          	<button class="btn btn-danger " href="#"><i class="icon_close_alt2"></i></button>
                  		      </form>
                      </div>
                  		</td>
              		</tr>
              		@endforeach
              		@else
                  <tr><td colspan="5" class="text-center">暂无数据</td></tr>
                  @endif
	                
	              </tr>                              
           		</tbody>

        	</table>
        	<div class="row">
                        <div class="col-lg-12 text-right">
                            <div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
                                {{ $infor->appends(['num'=>$num, 'keywords'=>$keywords])->links() }}
                            </div>
                        </div>
                    </div>
      	</section>
    </div>
</div>
@endsection

@section('js')
<script>
$('.del').submit(function(){
    if(!confirm('您确定要删除该站点吗?')) return false;
    
});
</script>
@endsection