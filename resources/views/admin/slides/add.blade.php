@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin.home')}}">首页</a> &raquo; 轮播图管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加轮播图</h3>
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
                <a href="{{route('slides.create')}}"><i class="fa fa-plus"></i>添加轮播图</a>
                <a href="{{route('slides.index')}}"><i class="fa fa-recycle"></i>全部轮播图</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form id="submit_form" action="{{route('slides.store')}}" method="post">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i> 标题：</th>
                    <td>
                        <input type="text" class="lg" name="title">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i> 简介：</th>
                    <td>
                        <textarea name="description"></textarea>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i> 图片：</th>
                    <td>
                        <input id="upload" name="upload" type="file">
                        <input id="image" name="image" type="hidden">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <img src="" alt="" id="upload_img" style="max-width: 700px; max-height:350px;">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i> 排序：</th>
                    <td>
                        <input type="text" class="sm" name="order">
                    </td>
                </tr>
                <tr>
                    <th> 链接：</th>
                    <td>
                        <input type="text" class="lg" name="redirect_url">
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
                    var submit_url = '{{route("slides.store")}}'
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
