@extends('layouts.admin')
@section('content')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="{{route('admin.home')}}">首页</a> &raquo; 课程管理
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>添加课程</h3>
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
                <a href="{{route('course.create')}}"><i class="fa fa-plus"></i>添加课程</a>
                <a href="{{route('course.index')}}"><i class="fa fa-recycle"></i>全部课程</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form id="submit_form" action="{{route('course.update', ['id' => $field->id])}}" method="post">
            <input type="hidden" name="_method" value="PUT">
            {{csrf_field()}}
            <table class="add_tab">
                <tbody>
                <tr>
                    <th><i class="require">*</i> 名称：</th>
                    <td>
                        <input type="text" class="lg" name="title" value="{{$field->title}}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i> 类型：</th>
                    <td>
                        <select name="type" id="course_type">
                            <option value="normal" 
                                @if($field->type == 'normal')
                                    selected="selected"
                                @endif
                            >长期</option>
                            <option value="temporary"
                                @if($field->type == 'temporary')
                                    selected="selected"
                                @endif
                            >临时</option>
                        </select>
                    </td>
                </tr>
                <tr id="temporary_date" style="display:none">
                    <th><i class="require">*</i> 上课日期：</th>
                    <td>
                        <input id="temporary_start_date" type="text" class="md" name="temporary_start_date" >
                    </td>
                </tr>
                <tr id="temporary_time" style="display:none">
                    <th><i class="require">*</i> 起止时间：</th>
                    <td>
                        <input id="temporary_start_time" type="text" class="sm" name="temporary[start_time]">
                        &nbsp;&nbsp;-&nbsp;&nbsp;
                        <input id="temporary_end_time" type="text" class="sm" name="temporary[end_time]">
                    </td>
                </tr>

                <tr id="normal_date">
                    <th><i class="require">*</i> 起止日期：</th>
                    <td>
                        <input id="start_date" type="text" class="md" name="start_date">
                        &nbsp;&nbsp;-&nbsp;&nbsp;
                        <input id="end_date" type="text" class="md" name="end_date">
                    </td>
                </tr>
                <tr id="normal_time">
                    <th><i class="require">*</i> 星期：</th>
                    <td id="normal_box">
                        <select name="normal[0][week]" class="sm">
                            <option value="1" selected="selected">星期一</option>
                            <option value="2">星期二</option>
                            <option value="3">星期三</option>
                            <option value="4">星期四</option>
                            <option value="5">星期五</option>
                            <option value="6">星期六</option>
                            <option value="0">星期日</option>
                        </select>
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>起止时间：</span>&nbsp;&nbsp;&nbsp;
                        <input id="start_time" type="text" class="sm" name="normal[0][start_time]">
                        &nbsp;&nbsp;-&nbsp;&nbsp;
                        <input id="end_time" type="text" class="sm" name="normal[0][end_time]">
                        <span style="cursor:pointer" id="add_item">[+ 添加]</span>
                    </td>
                </tr>
                <tr id="before_element">
                    <th><i class="require">*</i> 授课人：</th>
                    <td>
                        <select name="staff_id" class="sm">
                            <option value="">请选择</option>
                            @foreach($staffs as $staff)
                                <option value="{{$staff->id}}"
                                    @if($staff->id == $field->staff_id)
                                        selected="selected"
                                    @endif
                                >{{$staff->name}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>

                <tr>
                    <th>图片：</th>
                    <td>
                        <input id="upload" name="upload" type="file">
                        <input id="image" name="image" type="hidden" value="{{$field->image}}">
                    </td>
                </tr>
                <tr>
                    <th></th>
                    <td>
                        <img value="{{$field->image}} alt="" id="upload_img" style="max-width: 350px; max-height:100px;">
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
                    <th><i class="require">*</i> 内容：</th>
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

    <script type="text/javascript" src="{{asset('js/datatimepikcer-2.5.16/jquery.datetimepicker.full.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('js/datatimepikcer-2.5.16/jquery.datetimepicker.min.css')}}">
    <script type="text/javascript">
        $(document).ready(function () {
            var options = {
                success: function (data) {
                    $("#error_message").empty();
                    var submit_url = '{{route("course.store")}}'
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
            
            var datepicker_option = {
                lang:'ch',
                timepicker:false,
                format:'Y-m-d',
                formatDate:'Y-m-d',
            };
            var timepicker_option = {
                datepicker:false,
                format:'H:i',
                step:5
            };
            $('#start_date').datetimepicker(datepicker_option);
            $('#end_date').datetimepicker(datepicker_option);
            $('#start_time').datetimepicker(timepicker_option);
            $('#end_time').datetimepicker(timepicker_option);

            $('#temporary_start_date').datetimepicker(datepicker_option);
            $('#temporary_start_time').datetimepicker(timepicker_option);
            $('#temporary_end_time').datetimepicker(timepicker_option);

            function add_item(week = '',start_time = '', end_time = ''){
                var timepicker_option = {
                    datepicker:false,
                    format:'H:i',
                    step:5
                };
                var random_key = Math.random().toString(36).substr(2);
                var week_id = 'week_' + random_key;
                var start_time_id = 'start_time_' + random_key;
                var end_time_id = 'end_time_' + random_key;
                var newText = ''+
                    '<tr>'+
                        '<th></th>'+
                        '<td>'+
                            '<select name="normal[' + random_key + '][week]" id="' + week_id + '" class="sm">'+
                                '<option value="1" selected="selected">星期一</option>'+
                                '<option value="2">星期二</option>'+
                                '<option value="3">星期三</option>'+
                                '<option value="4">星期四</option>'+
                                '<option value="5">星期五</option>'+
                                '<option value="6">星期六</option>'+
                                '<option value="0">星期日</option>'+
                            '</select>'+
                            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>起止时间：</span>&nbsp;&nbsp;&nbsp;'+
                            '<input id="' + start_time_id + '" type="text" value="' + start_time + '" class="sm" name="normal[' + random_key + '][start_time]">'+
                            '&nbsp;&nbsp;-&nbsp;&nbsp;'+
                            '<input id="' + end_time_id + '" type="text"  value="' + end_time + '" class="sm" name="normal[' + random_key + '][end_time]">'+
                            '<span style="cursor:pointer" onclick="$(this).parent().parent().remove()">[- 删除]</span>'+
                        '</td>'+
                    '</tr>';
                
                $('#before_element').before(newText);
                $('#' + start_time_id).datetimepicker(timepicker_option);
                $('#' + end_time_id).datetimepicker(timepicker_option);
                $('#' + week_id).val(week);
            }

            function initData(){
                var course_type = '{!! $field->type !!}';
                var class_time = {!! json_encode($field->class_time) !!};
                var start_date = '{!! $field->start_date !!}';
                var end_date = '{!! $field->end_date !!}';

                if(course_type == 'normal'){
                    var count = 0;

                    $("#start_date").val(start_date);
                    $("#end_date").val(end_date);

                    for(var i in class_time){
                        let week = class_time[i].week;
                        let start_time = class_time[i].start_time;
                        let end_time = class_time[i].end_time;
                        if(count == 0){
                            $('#normal_box select').val(week);
                            $('#normal_box input').eq(0).val(start_time);
                            $('#normal_box input').eq(1).val(end_time);
                        }else{
                            add_item(week,start_time,end_time);
                        }
                        count++;
                    }

                }else{
                    var course_type = '{!! $field->type !!}';
                    var course_type = '{!! $field->type !!}';
                    $("#temporary_start_date").val(start_date);
                    $("#temporary_start_time").val(class_time.start_time);
                    $("#temporary_end_time").val(class_time.end_time);
                }

            }

            function judgeType(){
                if($("#course_type").val() == 'normal'){
                    $("#normal_date").show();
                    $("#normal_time").show();
                    $("#temporary_date").hide();
                    $("#temporary_time").hide();
                }else{
                    $("#normal_date").hide();
                    $("#normal_time").hide();
                    $("#temporary_date").show();
                    $("#temporary_time").show();
                }
            }

            initData();
            judgeType();

            $('#add_item').click(function(){
                add_item();
            });

            $('#course_type').change(function(){
                judgeType();
            });

        });

    </script>
@endsection
