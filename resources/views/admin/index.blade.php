@extends('layouts/admin')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">正德后台管理</div>
			<ul>
				<li><a href="{{url('/')}}" target="_blank" class="active">前台首页</a></li>
				<li><a href="{{route('admin.info')}}" target="main">系统信息</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员：admin</li>
				<li><a href="{{route('admin.pass')}}" target="main">修改密码</a></li>
				<li><a href="{{route('admin.quit')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>职工管理</h3>
				<ul class="sub_menu">
					<li><a href="{{route('staff.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加职工</a></li>
					<li><a href="{{route('staff.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>职工列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>轮播图管理</h3>
				<ul class="sub_menu">
					<li><a href="{{route('slides.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加轮播图</a></li>
					<li><a href="{{route('slides.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>轮播图列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>新闻管理</h3>
				<ul class="sub_menu">
					<li><a href="{{route('news.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加新闻</a></li>
					<li><a href="{{route('news.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>新闻列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>课程管理</h3>
				<ul class="sub_menu">
                    <li><a href="{{route('course.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加课程</a></li>
					<li><a href="{{route('course.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>课程列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>分类管理</h3>
				<ul class="sub_menu">
					<li><a href="{{route('category.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加分类</a></li>
					<li><a href="{{route('category.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>分类列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>博客管理</h3>
				<ul class="sub_menu">
                    <li><a href="{{route('article.create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加文章</a></li>
					<li><a href="{{route('article.index')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>文章列表</a></li>
				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/links')}}" target="main"><i class="fa fa-fw fa-cubes"></i>友情链接</a></li>
					<li><a href="{{url('admin/navs')}}" target="main"><i class="fa fa-fw fa-navicon"></i>自定义导航</a></li>
					<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-cogs"></i>网站配置</a></li>
				</ul>
			</li>
		</ul>
	</div>
    <!--左侧导航 结束-->

    <!--主体部分 开始-->
    <div class="main_box">
        <iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
    </div>
    <!--主体部分 结束-->
    
	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.baidu.com">http://www.baidu.com</a>.
	</div>
	<!--底部 结束-->

@endsection
