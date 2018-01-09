<!DOCTYPE HTML>
<html>
<head>
    @yield('info')
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="{{asset('home/css/bootstrap-3.1.1.min.css')}}" rel='stylesheet' type='text/css' />
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/bootstrap.min.js')}}"></script>
<!-- Custom Theme files -->
<link href="{{asset('home/css/style.css')}}" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="{{asset('home/css/jquery.countdown.css')}}" />

<link href='https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700' rel='stylesheet' type='text/css'>
<!----font-Awesome----->
<link href="{{asset('home/css/font-awesome.css')}}" rel="stylesheet"> 
<!----font-Awesome----->
<script>
$(document).ready(function(){
    $(".dropdown").hover(            
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideDown("fast");
            $(this).toggleClass('open');        
        },
        function() {
            $('.dropdown-menu', this).stop( true, true ).slideUp("fast");
            $(this).toggleClass('open');       
        }
    );
});
</script>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
	    <div class="navbar-header">
	        <a class="navbar-brand" href="index.html">正德书屋</a>
	    </div>
	    <!--/.navbar-header-->
	    <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1" style="height: 1px;">
	        <ul class="nav navbar-nav">
		        <li class="dropdown">
		            <a href="login.html"><i class="fa fa-user"></i><span>登录</span></a>
		        </li>
		        <li class="dropdown">
		        	<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-list"></i><span>课程</span></a>
		        	  <ul class="dropdown-menu">
			            <li><a href="courses.html">分类</a></li>
			            <li><a href="courses.html">列表</a></li>
			            <li><a href="course_detail.html">详情</a></li>
		              </ul>
		        </li>
                <!--
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-calendar"></i><span>Events</span></a>
		             <ul class="dropdown-menu">
			            <li><a href="events.html">Event1</a></li>
			            <li><a href="events.html">Event2</a></li>
			            <li><a href="events.html">Event3</a></li>
		             </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><span>English</span></a>
		            <ul class="dropdown-menu">
			            <li><a href="#"><span><i class="flags us"></i><span>English</span></span></a></li>
			            <li><a href="#"><span><i class="flags newzland"></i><span>Newzland</span></span></a></li>
			        </ul>
		        </li>
		        <li class="dropdown">
		            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i><span>Search</span></a>
		            <ul class="dropdown-menu search-form">
			           <form>        
                            <input type="text" class="search-text" name="s" placeholder="Search...">    
                            <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
                       </form>
			        </ul>
		        </li>
                -->
		    </ul>
	    </div>
	    <div class="clearfix"> </div>
	  </div>
	    <!--/.navbar-collapse-->
</nav>
<nav class="navbar nav_bottom" role="navigation">
 <div class="container">
 <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header nav_2">
      <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#"></a>
   </div> 
   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
        <ul class="nav navbar-nav nav_1">
            <li><a href="index.html">首页</a></li>
            <li><a href="about.html">关于我们</a></li>
    		<li class="dropdown mega-dropdown active">
			    <a href="#" class="dropdown-toggle" data-toggle="dropdown">招生<span class="caret"></span></a>				
				<div class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid">
    				    <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="men">
                            <ul class="nav-list list-inline">
                                <li><a href="admission.html"><img src="home/images/t7.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t8.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t9.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t1.jpg" class="img-responsive" alt=""/></a></li>
                            </ul>
                          </div>
                          <div class="tab-pane" id="women">
                            <ul class="nav-list list-inline">
                                <li><a href="admission.html"><img src="home/images/t1.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t2.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t3.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t4.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t5.jpg" class="img-responsive" alt=""/></a></li>
                                <li><a href="admission.html"><img src="home/images/t6.jpg" class="img-responsive" alt=""/></a></li>
                            </ul>
                         </div>
                       </div>
                    </div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                       <li class="active"><a href="#men" role="tab" data-toggle="tab">书法</a></li>
                       <li><a href="#women" role="tab" data-toggle="tab">绘画</a></li>
                   </ul>                    
				</div>				
			</li>
			<li><a href="faculty.html">课堂</a></li>
            <!--
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">方案<span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="terms.html">Terms of use</a></li>
                <li><a href="shortcodes.html">Shortcodes</a></li>
                <li><a href="faq.html">Faq</a></li>
              </ul>
            </li>
            <li><a href="services.html">Services</a></li>
            <li><a href="features.html">Features</a></li>
            <li><a href="career.html">Career</a></li>
            -->
            <li><a href="blog.html">博客</a></li>
            <li class="last"><a href="contact.html">联系我们</a></li>
        </ul>
     </div><!-- /.navbar-collapse -->
   </div>
</nav>

@yield('content')
</body>
</html>
