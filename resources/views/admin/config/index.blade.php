@extends('layouts.admin')
@section('content')
    <!--面包屑配置项 开始-->
    <div class="crumb_warp">
        <i class="fa fa-home"></i> <a href="{{route('admin.home')}}">首页</a> &raquo; 配置项管理
    </div>
    <!--面包屑配置项 结束-->

    <!--搜索结果页面 列表 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>配置项列表</h3>
            @if(count($errors)>0)
                <div class="mark">
                    @if(is_object($errors))
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @else
                        <p>{{$errors}}</p>
                    @endif
                </div>
            @endif
        </div>
        <!--快捷配置项 开始-->
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{route('config.create')}}"><i class="fa fa-plus"></i>添加配置项</a>
                <a href="{{route('config.index')}}"><i class="fa fa-recycle"></i>全部配置项</a>
            </div>
        </div>
        <!--快捷配置项 结束-->
    </div>

    <div class="result_wrap">
        <div class="result_content">
            <form action="{{route('config.change-content')}}" method="post">
                {{csrf_field()}}
                <table class="list_tab">
                    <tr>
                        <th class="tc" width="5%">排序</th>
                        <th class="tc" width="5%">ID</th>
                        <th>标题</th>
                        <th>名称</th>
                        <th>内容</th>
                        <th>操作</th>
                    </tr>

                    @foreach($data as $v)
                        <tr>
                            <td class="tc">
                                <input type="text" onchange="changeOrder(this,{{$v->conf_id}})" value="{{$v->conf_order}}">
                            </td>
                            <td class="tc">{{$v->conf_id}}</td>
                            <td>
                                <a href="#">{{$v->conf_title}}</a>
                            </td>
                            <td>{{$v->conf_name}}</td>
                            <td>
                                {{$v->conf_content}}
                            </td>
                            <td>
                                <a href="{{route('config.edit',['id' => $v->conf_id])}}">修改</a>
                                <a href="javascript:;" onclick="delItem( '{{route("config.destroy",["id" => $v->conf_id])}}' )">删除</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="btn_group">
                    <input type="submit" value="提交">
                    <input type="button" class="back" onclick="history.go(-1)" value="返回" >
                </div>
            </form>
        </div>
    </div>
    <!--搜索结果页面 列表 结束-->

    <script>
        function changeOrder(obj,conf_id){
            var conf_order = $(obj).val();
            $.post("{{route('config.change-order')}}",{'_token':'{{csrf_token()}}','conf_id':conf_id,'conf_order':conf_order},function(data){
                if(data.success){
                    layer.msg(data.data, {icon: 6});
                }else{
                    layer.msg(data.message, {icon: 5});
                }
            });
        }

        function delItem(url) {
            layer.confirm('您确定要删除吗？', {
                btn: ['确定','取消'] //按钮
            }, function(){
                $.post(url,{'_method':'delete','_token':"{{csrf_token()}}"},function (data) {
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
