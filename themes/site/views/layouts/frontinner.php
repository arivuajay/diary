<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
<?php $this->beginContent('//layouts/head'); ?>
    <?php
        $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl;
        ?>
    
    
  <body class="forms-page">
<script> var boxtest = localStorage.getItem('boxed'); if (boxtest === 'true') {document.body.className+=' boxed-layout';} </script> 

<!-- Start: Header -->
<header class="navbar navbar-fixed-top">
  <div class="navbar-branding"> <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span> <a class="navbar-brand" href="dashboard.html"><img src="<?php echo $themeUrl; ?>/css/frontend/img/logos/header-logo.png"></a> </div>
<!--  advertisement-->
<!--  <div class="navbar-left">
    <div class="navbar-divider"></div>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
 e2h 
<ins class="adsbygoogle"
     style="display:inline-block;width:468px;height:60px"
     data-ad-client="ca-pub-8758067131866544"
     data-ad-slot="6920464373"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
  </div>-->
  
  <div class="navbar-right">
    <div class="navbar-search">
      <input type="text" id="HeaderSearch" placeholder="Search..." value="Search...">
    </div>
    <div class="navbar-menus">
      <div class="btn-group" id="alert_menu">
        <button type="button" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicons glyphicons-bell"></span> <b>3</b> </button>
        <ul class="dropdown-menu media-list" role="menu">
          <li class="dropdown-header">Recent Messages<span class="pull-right glyphicons glyphicons-bell"></span></li>
          <li class="p15 pb10">
            <ul class="list-unstyled">
              <li><span class="glyphicons glyphicons-bell text-orange2 fs16 mr15"></span><b>CEO</b> lunch meeting Tuesday</li>
              <li class="pt10"><span class="glyphicons glyphicons-facebook text-blue2 fs16 mr15"></span>Facebook likes are at <b>4,100</b></li>
              <li class="pt10"><span class="glyphicons glyphicons-paperclip text-teal2 fs16 mr15"></span>Mark <b>uploaded</b> 3 new Docs</li>
              <li class="pt10"><span class="glyphicons glyphicons-gift text-purple2 fs16 mr15"></span>It's <b>Marks</b> 34th Birthday</li>
              <li class="pt10"><span class="glyphicons glyphicons-cup text-red2 fs16 mr15"></span>Best new employee awarded to <b>Jessica</b></li>
            </ul>
          </li>
        </ul>
      </div>      
    </div>
  </div>
</header>
<!-- End: Header --> 
<!-- Start: Main -->
<div id="main"> 
  <!-- Start: Sidebar -->
  <aside id="sidebar_left">
    <div class="user-info">
      <div class="media"> <a class="pull-left" href="#">
        <div class="media-object border border-purple br64 bw2 p2"> <img class="br64" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/5.jpg" alt="..."> </div>
        </a>
        <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
        <div class="media-body">
          <h5 class="media-heading mt5 mbn fw700 cursor">Rajat Grover<span class="caret ml5"></span></h5>
          <div class="media-links fs11"><a href="#">Menu</a><i class="fa fa-circle text-muted fs3 p8 va-m"></i><a href="<?php echo $baseUrl;?>/site/users/logout">Sign Out</a></div>
        </div>
      </div>
    </div>
    <div class="user-divider"></div>
    <div class="user-menu">
      <div class="row text-center mb15">
        <div class="col-xs-4"> <a href="dashboard.html"> <span class="glyphicons glyphicons-home fs22 text-blue2"></span>
          <h5 class="fs11">Manage Journal</h5>
          </a> </div>
        <div class="col-xs-4"> <a href="write-an-entry.html"> <span class="glyphicons glyphicons-inbox fs22 text-orange2"></span>
          <h5 class="fs11">Write a journal</h5>
          </a> </div>
        <div class="col-xs-4"> <a href="tables.html"> <span class="glyphicons glyphicons-bell fs22 text-purple2"></span>
          <h5 class="fs11">Mood report</h5>
          </a> </div>
      </div>      
    </div>
    <div class="sidebar-menu">
      <ul class="nav sidebar-nav">
      <li> <a class="accordion-toggle" href="about.html"><span class="glyphicons glyphicons-book"></span><span class="sidebar-title">About Us</span><span class="caret"></span></a>
          <ul id="sideFive" class="nav sub-nav">
            <li><a href="#"><span class="glyphicons glyphicons glyphicons-user"></span> Profile</a></li>
            <li><a href="#"><span class="glyphicons glyphicons-picture"></span> Testimonials</a></li>
            <li><a href="#"><span class="glyphicons glyphicons-film"></span> Media</a></li>
            <li><a href="#"><span class="glyphicons glyphicons glyphicons-print"></span> Awards</a></li>
            <li> <a href="careers.html" class="ajax-disable"><span class="glyphicons glyphicons-calendar"></span><span class="sidebar-title">Careers</span></a> </li>
          </ul>
        </li>        
        <li> <a href="#" class="ajax-disable"><span class="glyphicons glyphicons-book_open"></span><span class="sidebar-title">Writing Tips</span></a> </li>
        <li> <a href="faq.html" class="ajax-disable"><span class="glyphicons glyphicons-edit"></span><span class="sidebar-title">FAQ</span></a> </li>
        <li> <a href="#"><span class="glyphicons glyphicons-globe"></span><span class="sidebar-title">Contact us</span></a> </li>
        <li> <a href="#"><span class="glyphicons glyphicons-settings"></span><span class="sidebar-title">Offers</span></a> </li>
        <li> <a href="#"><span class="glyphicons glyphicons-pencil"></span><span class="sidebar-title">Tell a Friend</span></a> </li>
        <li> <a href="#"><span class="glyphicons glyphicons-link"></span><span class="sidebar-title">Donation</span></a> </li>
        <li> <a href="#"><span class="glyphicons glyphicons-edit"></span><span class="sidebar-title">Feedback</span></a> </li>
        <li> <a href="#"><span class="glyphicons glyphicons-table"></span><span class="sidebar-title">Blog</span></a> </li>
        <li> <a href="privacy.html" class="ajax-disable"><span class="glyphicons glyphicons-inbox"></span><span class="sidebar-title">Privacy</span></a> </li>
      </ul>
    </div>
  </aside>
  <!-- End: Sidebar --> 
  <!-- Start: Content -->
 <?php echo $content; ?>
  <!-- End: Content --> 
  
  <!-- Start: Right Sidebar -->
  <aside id="sidebar_right">
    <div class="sidebar-right-header">
      <div class="pull-right posr"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <i class="fa fa-circle text-orange2 fs8"></i> <span class="caret text-muted"></span> </a>
        <ul class="dropdown-menu dropdown-sm" role="menu">
          <li class="menu-arrow">
            <div class="menu-arrow-up"></div>
          </li>
          <li><a href="javascript:void(0);"><i class="fa fa-circle text-green2 pr5"></i> Online</a></li>
          <li><a href="javascript:void(0);"><i class="fa fa-circle text-red2 pr5"></i> Busy</a></li>
          <li class="divider"></li>
          <li><a href="javascript:void(0);"><i class="fa fa-circle text-orange2 pr5"></i> Away</a></li>
        </ul>
      </div>
      <div class="media mtn"> <a class="pull-left mt5" href="#"> <img class="thumbnail thumbnail-sm rounded" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/2.jpg" alt="..."> </a>
        <div class="media-body">
          <h5 class="small mt5 mbn text-cloud"><b>Current Status:</b></h5>
          <h5 class="small text-white"><b>"Away: Lunch meeting"</b></h5>
        </div>
      </div>
    </div>
    <div class="sidebar_right_content p25">
      <div class="sidebar_right_menu row text-center">
        <div class="col-xs-4 pln"> <a href="calendar.html"> <span class="glyphicons glyphicons-imac fs22 text-grey2"></span>
          <h5 class="fs11 text-white">Calendar</h5>
          </a> </div>
        <div class="col-xs-4"> <a href="profile.html"> <span class="glyphicons glyphicons-settings fs22 text-green"></span>
          <h5 class="fs11 text-white">Settings</h5>
          </a> </div>
        <div class="col-xs-4 prn"> <a href="messages.html"> <span class="glyphicons glyphicons-inbox fs22 text-orange"></span>
          <h5 class="fs11 text-white">Inbox</h5>
          </a> </div>
      </div>
      <hr class="mb25 mtn border-dark3"/>
      <h5 class="text-muted fs13 mb25">Notes</h5>
      <h5 class="text-white mbn">9:30 AM - Ford Pitch</h5>
      <p class="text-light6 fs12 fw600 mb15">Client expects a working draft</p>
      <h5 class="text-white mbn">12:15 AM - Lunch Meeting</h5>
      <p class="text-light6 fs12 fw600 mb15">To discuss Ford Pitch outcome</p>
      <h5 class="text-white mbn">2:30 AM - Computer Repair</h5>
      <p class="text-light6 fs12 fw600 mb15">Coming to replace failing HD </p>
      <h5 class="text-white mbn">4:15 AM - First Yoga Class</h5>
      <p class="text-light6 fs12 fw600">Ask about your free classes</p>
      <hr class="mb25 mt25 border-dark3"/>
      <h5 class="text-muted fs13 pull-left mr20">Users</h5>
      <div class="btn-group pull-left">
        <button type="button" class="btn btn-gradient btn-xs bg-blue7-alt dropdown-toggle fs11 fw600" data-toggle="dropdown"><i class="fa fa-circle text-green2 fs8 pr5"></i> Online <span class="caret caret-sm ml5"></span> </button>
        <ul class="dropdown-menu dropdown-sm" role="menu">
          <li class="menu-arrow">
            <div class="menu-arrow-up"></div>
          </li>
          <li><a href="javascript:void(0);"><i class="fa fa-circle text-green2 pr5"></i> Online</a></li>
          <li><a href="javascript:void(0);"><i class="fa fa-circle text-red2 pr5"></i> Busy</a></li>
          <li class="divider"></li>
          <li><a href="javascript:void(0);"><i class="fa fa-circle text-orange2 pr5"></i> Away</a></li>
        </ul>
      </div>
      <div class="clearfix"></div>
      <div class="media mt30 border-none"> <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/4.jpg" alt="..."> </a>
        <div class="media-body">
          <h5 class="media-heading text-white mbn">Simon Rivers</h5>
          <p class="text-muted fs12"> What's up, buddy</p>
        </div>
      </div>
      <div class="media border-none"> <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/5.jpg" alt="..."> </a>
        <div class="media-body">
          <h5 class="media-heading text-white mbn">Eric Ulrich</h5>
          <p class="text-muted fs12"> Client Problem pg.14</p>
        </div>
      </div>
      <div class="media border-none"> <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/6.jpg" alt="..."> </a>
        <div class="media-body">
          <h5 class="media-heading text-white mbn">Hershel Sandin</h5>
          <p class="text-muted fs12"> Looking for an intern?</p>
        </div>
      </div>
      <div class="media border-none"> <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/7.jpg" alt="..."> </a>
        <div class="media-body">
          <h5 class="media-heading text-white mbn">Jacob Hill</h5>
          <p class="text-muted fs12"> Lunch meeting tomorrow.</p>
        </div>
      </div>
      <div class="media border-none"> <a class="pull-left" href="#"> <img class="media-object thumbnail thumbnail-sm rounded" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/3.jpg" alt="..."> </a>
        <div class="media-body">
          <h5 class="media-heading text-white mbn">Dante Harper</h5>
          <p class="text-muted fs12"> I have a new twitter!</p>
        </div>
      </div>
    </div>
  </aside>
  <!-- End: Right Sidebar --> 
</div>
<!-- End: Main --> 

<!-- Google Map API --> 
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script> 

<script type="text/javascript">
jQuery(document).ready(function () {
	  
	 "use strict";

     // Init Theme Core 	  
     Core.init();

     // Enable Ajax Loading 	  
     Ajax.init();     
     
	 
	 // Init Markitup Editor
	 $("#markitup").markItUp(mySettings);
	 
	 // Init Summernote
     $('.summernote').summernote({
	   height: 255,   //set editable area's height
	   focus: false  //set focus editable area after Initialize summernote
	 });
		  
	 // Init Ckeditor. Replace Text area with Ckeditor
	 // and assign it a custom skin class
     CKEDITOR.replace( 'editor1',
	 {
	   on : { instanceReady : function ( evt )  {
			 $('#cke_editor1').addClass('fusionSkin');
		    }}
	 });

     // Turn off automatic editor initilization.
	 // Used to prevent conflictions with multiple text 
	 // editors being displayed on the same page.
     CKEDITOR.disableAutoInline = true; 
	 
	 var prevColor = "";
	 
	 // Theme Example - Ckeditor Colorpicker
	 $('.editor-ui-color').click(function () {
	 	var color = $(this).val();
		$('.fusionSkin .cke_top, .markItUpHeader, .note-toolbar').addClass(color).removeClass(prevColor);
		prevColor = color;
	 });


 });

</script> 
<script type="text/javascript">
jQuery(document).ready(function () {
	  
	 "use strict";

     // Init Theme Core 	  
     Core.init();

     // Enable Ajax Loading 	  
     Ajax.init();     
     
	 
	 	
	 // validate the comment form when it is submitted
	 $("#altForm").validate();

	 //Init jquery Date Picker
	 $('.datepicker').datepicker()
	 
	 //Init jquery Date Range Picker
	 $('.rangepicker').daterangepicker();
	 
	 //Init jquery Color Picker
	 $('.colorpicker').colorpicker() 
	 $('.rgbapicker').colorpicker() 
	 
	 //Init jquery Time Picker
	 $('.timepicker').timepicker();
	  
	 //Init jquery Tags Manager 
	 $(".tm-input").tagsManager({
        tagsContainer: '.tags',
		prefilled: ["Miley Cyrus", "Apple", "Wow This is a really Long tag", "Na uh"],
		tagClass: 'tm-tag-success',
     });
	 			        	
	//Init Boostrap Multiselect
	$('#multiselect1').multiselect();
	
	$('#multiselect2').multiselect({
		includeSelectAllOption: true
	});
	
	$('#multiselect3').multiselect();
	
	$('#multiselect4').multiselect({
		enableFiltering: true,
	});
	  
	  
	//Init jquery spinner init - default
	$("#spinner1").spinner();
	
	//Init jquery spinner init - currency 
	$("#spinner2").spinner({
      min: 5,
      max: 2500,
      step: 25,
      start: 1000,
      //numberFormat: "C"
    });
	
	//Init jquery spinner init - decimal  
	$( "#spinner3" ).spinner({
      step: 0.01,
      numberFormat: "n"
    });
	
	//Init jquery time spinner
    $.widget( "ui.timespinner", $.ui.spinner, {
		options: {
		  // seconds
		  step: 60 * 1000,
		  // hours
		  page: 60
		},
		_parse: function( value ) {
		  if ( typeof value === "string" ) {
			// already a timestamp
			if ( Number( value ) == value ) {
			  return Number( value );
			}
			return +Globalize.parseDate( value );
		  }
		  return value;
		},
	 
		_format: function( value ) {
		  return Globalize.format( new Date(value), "t" );
		}
	  });
    $( "#spinner4" ).timespinner();

	//Init jquery masked inputs
	$('.date').mask('99/99/9999');
	$('.time').mask('99:99:99');
	$('.date_time').mask('99/99/9999 99:99:99');
	$('.zip').mask('99999-999');
	$('.phone').mask('(999) 999-9999');
	$('.phoneext').mask("(999) 999-9999 x99999");
	$(".money").mask("999,999,999.999"); 
	$(".product").mask("999.999.999.999"); 
	$(".tin").mask("99-9999999");
	$(".ssn").mask("999-99-9999");
	$(".ip").mask("9ZZ.9ZZ.9ZZ.9ZZ");
	$(".eyescript").mask("~9.99 ~9.99 999");
	$(".custom").mask("9.99.999.9999");
	
});
</script>
</body>



</html>
<?php $this->endContent(); ?>