@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin.home')}}">首页</a> &raquo; 课程管理
    </div>
    <!--面包屑导航 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_title">
                <h3>课程列表</h3>
            </div>
            <div class="result_content">
                <div class="short_wrap">
                    <a href="{{route('course.create')}}"><i class="fa fa-plus"></i>添加课程</a>
                    <a href="{{route('course.index')}}"><i class="fa fa-recycle"></i>全部课程</a>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th>标题</th>
                        <th>图片</th>
                        <th>授课人</th>
                        <th>点击</th>
                        <th>发布时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $v)
                        <tr>
                            <td class="tc">{{$v->id}}</td>
                            <td>
                                <a href="#">{{$v->title}}</a>
                            </td>
                            <td>
                                <img src="{{$v->image}}" alt="" id="upload_img" style="max-width: 200px; max-height:100px;">
                            </td>
                            <td>{{$v->staff->name}}</td>
                            <td>{{$v->view}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>
                                <a href="{{route('course.edit',['id' => $v->id])}}">修改</a>
                                <a href="javascript:;" onclick="delArt( '{{route("course.destroy",["id" => $v->id])}}' )">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>

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
        //删除分类
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
