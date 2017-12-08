@extends('admin.index')

@section('title')
<h3 class="page-header"><i class="fa fa-laptop"></i>分类列表</h3>
@endsection

@section('content')
<div class="row">
  	<div class="col-lg-12">
      	<section class="panel">          	          
          	<table class="table table-striped table-advance table-hover">
           		<tbody>
              		<tr>
              			<th> ID</th>
                 		<th> 分类名称</th>
                    <th> 图片</th>                 		
                 		<th> 操作</th>
              		</tr>
                  @if(count($cates) > 0)
              		@foreach ($cates as $k => $v)
              		<tr class="col-md-12">
                 		<td class="col-md-3">{{$v->id}}</td>                 		
                 		<td class="col-md-4">{{$v->name}}</td>
                    <td class="col-md-4"><img width="30" src="{{$v->img}}" alt=""></td>                  		
                 		<td>
                  		<div class="btn-group">
                      		<a class="btn btn-primary" href="/cate/{{$v->id}}/edit"><i class="icon_plus_alt2"></i></a>
                          	
                            <form class="del" action="/cate/{{$v->id}}" method="post" style="float:left">
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
    if(!confirm('您确定要删除该分类吗?')) return false;
    
});
</script>
@endsection