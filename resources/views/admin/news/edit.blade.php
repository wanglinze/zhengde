@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin.home')}}">首页</a> &raquo; 新闻管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>修改新闻</h3>
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
            <div class="mark" id="error_message" style="display:none">
            </div>
        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="{{route('news.create')}}"><i class="fa fa-plus"></i>添加新闻</a>
                <a href="{{route('news.index')}}"><i class="fa fa-recycle"></i>全部新闻</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form  id="submit_form" action="{{route('news.update',['id' => $field->id])}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i> 标题：</th>
                    <td>
                        <input type="text" class="lg" name="title" value="{{$field->title}}">
                    </td>
                </tr>
                <tr>
                    <th> 作者：</th>
                    <td>
                        <input type="text" class="sm" name="author" value="{{$field->author}}">
                    </td>
                </tr>
                <tr>
                    <th>缩略图：</th>
                    <td>
                        <input id="upload" name="upload" type="file">
                        <input id="image" name="image" type="hidden" value="{{$field->image}}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <img alt="" id="upload_img" style="max-width: 350px; max-height:100px;" src="{{$field->image}}">
                    </td>
                </tr>
                <tr>
                    <th>关键词：</th>
                    <td>
                        <input type="text" class="lg" name="tag" value="{{$field->tag}}">
                    </td>
                </tr>
                <tr>
                    <th>简介：</th>
                    <td>
                        <textarea name="description">{{$field->description}}</textarea>
                    </td>
                </tr>

                <tr>
                    <th><i class="require">*</i>内容：</th>
                    <td>
                        <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/ueditor.config.js')}}"></script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/ueditor.all.min.js')}}"> </script>
                        <script type="text/javascript" charset="utf-8" src="{{asset('org/ueditor/lang/zh-cn/zh-cn.js')}}"></script>
                        <script id="editor" name="content" type="text/plain" style="width:860px;height:500px;">{!! $field->content !!}</script>
                        <script type="text/javascript">
                            var ue = UE.getEditor('editor');
                        </script>
                        <style>
                            .edui-default{line-height: 28px;}
                            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                            {overflow: hidden; height:20px;}
                            div.edui-box{overflow: hidden; height:22px;}
                        </style>
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {

            var options = {
                success: function (data) {
                    $("#error_message").empty();
                    var submit_url = '{{route("news.update",["id" => $field->id])}}'
                    $("#submit_form").attr('action',submit_url);

                    if (data.success) {
                        $("#image").val(data.data);
                        $("#upload_img").attr('src',data.data);
                    } else {
                        let message = data.message;
                        $("#error_message").append('<p>' + message + '</p>');
                        $("#error_message").show();
                    }
                }
            };

            $("#upload").change(function () {
                var upload_url = '{{route("upload")}}'
                $("#submit_form").attr('action',upload_url);
                $("#submit_form").ajaxSubmit(options);
            });

        });
    </script>
@endsection
