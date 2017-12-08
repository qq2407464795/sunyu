<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>后台</title>

    <!-- Bootstrap CSS -->    
    <!-- bootstrap theme -->
    <link href="{{url('/admins/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="/admins/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="/admins/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="/admins/css/font-awesome.min.css" rel="stylesheet" />    
    <!-- full calendar css-->
    <!-- <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" /> -->
    <!-- <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" /> -->
    <!-- easy pie chart-->
    <!-- <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/> -->
    <!-- owl carousel -->
    <link rel="stylesheet" href="/admins/css/owl.carousel.css" type="text/css">
    <link href="/admins/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="/admins/css/fullcalendar.css">
    <link href="/admins/css/widgets.css" rel="stylesheet">
    <link href="/admins/css/style.css" rel="stylesheet">
    <link href="/admins/css/style-responsive.css" rel="stylesheet" />
    <link href="/admins/css/xcharts.min.css" rel=" stylesheet"> 
    <link href="/admins/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="/admins/js/html5shiv.js"></script>
      <script src="/admins/js/respond.min.js"></script>
      <script src="/admins/js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
     
      
      <header class="header dark-bg">
            <div class="toggle-nav">
                <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"></div>
            </div>

            <!--logo start-->
            <a href="index.html" class="logo">小米商城 <span class="lite">网站后台</span></a>
            <!--logo end-->

            <div class="nav search-row" id="top_menu">
                <!--  search form start -->
                <ul class="nav top-menu">                    
                    <li>
                        <form class="navbar-form">
                            <input class="form-control" placeholder="Search" type="text">
                        </form>
                    </li>                    
                </ul>
                <!--  search form end -->                
            </div>

            <div class="top-nav notification-row">                
                <!-- notificatoin dropdown start-->
                <ul class="nav pull-right top-menu">
                    
                    <!-- task notificatoin start -->
                    
                    <!-- alert notification end-->
                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <img alt="" src="/admins/img/avatar1_small.jpg">
                            </span>
                            <span class="username">Jenifer Smith</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>
                            <li class="eborder-top">
                                <a href="#"><i class="icon_profile"></i> My Profile</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
                            </li>
                            <li>
                                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
                            </li>
                            <li>
                                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                            <li>
                                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
                            </li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
                <!-- notificatoin dropdown end-->
            </div>
      </header>      
      <!--header end-->

      <!--sidebar start-->
      @include('layouts.menu')
      <!--sidebar end-->
      
      <!--main content start-->
    <section id="main-content">
        <section class="wrapper">            
            <!--右侧 start-->
        <div class="row">
            
            <div class="col-lg-12">
            @section('title')
                <h3 class="page-header"><i class="fa fa-laptop"></i>WELCOME</h3>
            @show
            </div>
            
        </div>
            @if(session('msg'))
            <div class="alert alert-info">
            {{session('msg')}}
            </div>
            @endif
            @section('content')
            <div class="row">
                
            </div>
            @show
            

         <!--右侧 start--> 
        
        </section>
    </section>
      <!--main content end-->
  </section>
  <!-- container section start -->

    <!-- javascripts -->
    <script src="/admins/js/jquery.js"></script>
    <script src="/admins/js/jquery-ui-1.10.4.min.js"></script>
    <script src="/admins/js/jquery-1.8.3.min.js"></script>
    <!-- <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script> -->
    <!-- bootstrap -->
    <script src="/admins/js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="/admins/js/jquery.scrollTo.min.js"></script>
    <script src="/admins/js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- charts scripts -->
    <script src="/admins/assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="/admins/js/jquery.sparkline.js" type="text/javascript"></script>
    <script src="/admins/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
    <script src="/admins/js/owl.carousel.js" ></script>
    <!-- jQuery full calendar -->
    <script src="/admins/js/fullcalendar.min.js"></script> <!-- Full Google Calendar - Calendar -->
    <!-- <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script> -->
    <!--script for this page only-->
    <script src="/admins/js/calendar-custom.js"></script>
    <script src="/admins/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="/admins/js/jquery.customSelect.min.js" ></script>
    <!-- <script src="assets/chart-master/Chart.js"></script> -->
   
    <!--custome script for all page-->
    <script src="/admins/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="/admins/js/sparkline-chart.js"></script>
    <script src="/admins/js/easy-pie-chart.js"></script>
    <script src="/admins/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/admins/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="/admins/js/xcharts.min.js"></script>
    <script src="/admins/js/jquery.autosize.min.js"></script>
    <script src="/admins/js/jquery.placeholder.min.js"></script>
    <script src="/admins/js/gdp-data.js"></script>  
    <script src="/admins/js/morris.min.js"></script>
    <script src="/admins/js/sparklines.js"></script>    
    <script src="/admins/js/charts.js"></script>
    <script src="/admins/js/jquery.slimscroll.min.js"></script>
    <script src="/admins/js/holder.min.js"></script>
    @section('js')
    @show

  <script>

    
      //knob
      $(function() {
        $(".knob").knob({
          'draw' : function () { 
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
          $("#owl-slider").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 400,
              singleItem : true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });
      
      /* ---------- Map ---------- */
    $(function(){
      $('#map').vectorMap({
        map: 'world_mill_en',
        series: {
          regions: [{
            values: gdpData,
            scale: ['#000', '#000'],
            normalizeFunction: 'polynomial'
          }]
        },
        backgroundColor: '#eef3f7',
        onLabelShow: function(e, el, code){
          el.html(el.html()+' (GDP - '+gdpData[code]+')');
        }
      });
    });



  </script>

  </body>
</html>
