@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin.home')}}">首页</a> &raquo; 职工管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_title">
                <h3>职工列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{route('staff.create')}}"><i class="fa fa-plus"></i>添加职工</a>
                    <a href="{{route('staff.index')}}"><i class="fa fa-recycle"></i>全部职工</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>姓名</th>
                        <th>图片</th>
                        <th>qq</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->id}})" value="{{$v->order}}">
                            </td>
                            <td class="tc">{{$v->id}}</td>
                            <td>
                                <a href="#">{{$v->name}}</a>
                            </td>
                            <td>
                                <img src="{{$v->image}}" alt="" id="upload_img" style="max-width: 300px; max-height:150px;">
                            </td>
                            <td>{{$v->qq}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                                <a href="{{route('staff.edit',['id' => $v->id])}}">修改</a>
                                <a href="javascript:;" onclick="delArt( '{{route("staff.destroy",["id" => $v->id])}}' )">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

                <!--分页-->
                <div class="page_list">
                    {{$data->links()}}
                </div>

            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <style>
        .result_content ul li span {
            font-size: 15px;
            padding: 6px 12px;
        }
    </style>

    <script>
        function changeOrder(obj,id){
            var order = $(obj).val();
            $.post("{{route('staff.change-order')}}",{'_token':'{{csrf_token()}}','id':id,'order':order},function(data){
                    console.log(data)
                if(data.status == 0){
                    layer.msg(data.msg, {icon: 6});
                }else{
                    layer.msg(data.msg, {icon: 5});
                }
            });
        }

        function delArt(url) {
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post(url,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
                    console.log(data.data);
                    if(data.success){
                        location.href = location.href;
                        layer.msg(data.data, {icon: 6});
                    }else{
                        layer.msg(data.message, {icon: 5});
                    }
                });
//            layer.msg('的确很重要', {icon: 1});
            }, function(){

            });
        }
    </script>

@endsection
