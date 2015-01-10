<?php
/* @var $this DefaultController */

//$this->breadcrumbs=array(
//	$this->module->id,
//);
?>
<!--<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>

<p>
This is the view content for action "<?php echo $this->action->id; ?>".
The action belongs to the controller "<?php echo get_class($this); ?>"
in the "<?php echo $this->module->id; ?>" module.
</p>
<p>
You may customize this page by editing <tt><?php echo __FILE__; ?></tt>
</p>-->

<?php
        $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl;
        ?>

            <div id="mask">

                <!--Header 
                =============================-->

                <div id="header" class="header">
                    <div class="menu-inner">
                        <div class="container"><div class="row">
                                <div class="header-table col-md-12 header-menu">
                                    <!--  Logo section -->
                                    <div class="brand"><a href="#home"  class="nav-link">Express <span> 2 </span>Help</a></div>
                                    <!--  // Logo section -->

                                    <!-- Sub Page Menu section -->
                                    <nav class="main-nav">
                                        <a href="#" class="nav-toggle"></a>
                                        <ul id="sub-nav" class="nav">
                                            <li><a href="#home" class="nav-link">Main</a></li>
                                            <li><a href="#" class="nav-link">About Us</a></li>
                                            <li><a href="#" class="nav-link">Faq</a></li>
                                            <li><a href="#" class="nav-link">Your Personal Diary<span class="sub-toggle"></span></a>
                                                <ul>
                                                    <li><a href="#" class="nav-link">Why you need Diary</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" class="nav-link">Testimonial</a></li>	
                                            <li><a href="#" class="nav-link">Contact Us</a></li>
                                            <li><a href="#" class="nav-link">Feedback</a></li>
                                            <li><a href="#" class="nav-link">Blog</a></li>
                                        </ul>
                                    </nav>
                                    <!--  // Sub Page Menu section -->

                                </div>
                            </div></div>   
                    </div>
                </div>

                <!-- // Header 
                =============================-->

                <!--Home Page
                =============================-->

                <div id="home" class="item">
                    <img src="<?php echo $themeUrl; ?>/css/home/assets/img/2.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="clearfix">
                        <div class="header_details">
                            <div class="container">
                                <div class="header_icons accura-header-block accura-hidden-2xs">
                                    <a href="#"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/logo-png.png" border="0"></a></div>
                                <div class="call">
                                    <div class="home_address">
                                        NO.OF. USERS & <br>
                                    </div>
                                    VISITORS</div>
                            </div>

                            <div class="container">

                                <!--<form id="hcontact_form" class="hcont_form pad_top13" action="" method="post">-->
                                    <?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'hcontact_form',
    'enableAjaxValidation'=>false,
    'action' => array( '/site/entry/create' ), // change depending on your project
)); ?>

                                    <div class="clearfix hcont_form pad_top20"> 
                                        <input type="email" name="email"  class="validate['required','email']  textbox1"
                                               placeholder="* Email : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Email :'" required/><br>
                                        <input type="text" name="phone" class="validate['required','phone']  textbox1"
                                               placeholder="* Select Your Mood : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Select Your Mood :'" /><br>
                                        <input id="hcontactsubmitBtn1" value="Write an Entry" type="submit" class="submitBtn">
                                    </div>
                                    
                                <?php $this->endWidget(); ?>
                                <!--</form>-->

                            </div>



                            <!-- Mainheader Menu Section -->

                            <div class="mainheaderslide" id="slide">
                                <div id="mainheader" class="header">
                                    <div class="menu-inner">
                                        <div class="container">
                                            <div class="row">
                                                <div class="header-table col-md-12 header-menu">

                                                    <!--  Logo section -->
                                                    <div class="brand">
                                                        <div class="header_icons accura-header-block accura-hidden-2xs">
                                                            <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                                                <li id="1"><a href="http://www.facebook.com" target="_blank" class="accura-social-icon-facebook circle"><i class="fa fa-facebook"></i></a></li>
                                                                <li id="2"><a href="http://www.twitter.com" target="_blank" class="accura-social-icon-twitter circle"><i class="fa fa-twitter"></i></a></li>
                                                                <li id="3"><a href="http://www.googleplus.com" target="_blank" class="accura-social-icon-gplus circle"><i class="fa fa-google-plus"></i></a></li>
                                                                <li id="4"><a href="https://www.pinterest.com/login/" target="_blank" class="accura-social-icon-pinterest circle"><i class="fa fa-pinterest"></i></a></li>
                    <!--						<li id="5"><a href="https://www.linkedin.com/uas/login" target="_blank" class="accura-social-icon-linkedin circle"><i class="fa fa-linkedin"></i></a></li>
                                                                -->					  </ul>
                                                        </div>
                                                    </div>
                                                    <!--  // Logo section -->

                                                    <!-- Home Page Menu section -->
                                                    <nav class="main-nav">
                                                        <a href="#" class="nav-toggle"></a>
                                                        <ul  id="home_nav" class="nav">
                                                            <li><span class="nav-link selected1">Main</span></li>
                                                            <li><a href="#" class="nav-link">About Us</a></li>
                                                            <li><a href="#" class="nav-link">Faq</a></li>
                                                            <li><a href="#" class="nav-link">Your Personal Diary<span class="sub-toggle"></span></a>
                                                                <ul>
                                                                    <li><a href="#" class="nav-link">Why you need Diary</a></li>
                                                                </ul>
                                                            </li>
                                                            <li><a href="#" class="nav-link">Testimonial</a></li>		
                                                            <li><a href="#" class="nav-link">Contact Us</a></li>	
                                                            <li><a href="#" class="nav-link">Feedback</a></li>
                                                            <li><a href="#" class="nav-link">Blog</a></li>
                                                        </ul>
                                                    </nav>
                                                    <!--  // Home Page Menu section -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>	

                            <!-- // Mainheader Menu Section -->
                        </div>
                        <div id="boxgallery" class="boxgallery" data-effect="effect-2">
                            <div class="panel"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/2.jpg" alt="image 2"/></div>
                            <div class="panel"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/3.jpg" alt="image 3"/></div>
                            <div class="panel"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/4.jpg" alt="image 4"/></div>
                            <div class="panel"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/5.jpg" alt="image 5"/></div>
                        </div>
                    </div>
                </div>

                <!-- // Home Page
                =============================-->




                <!--About us
                =============================-->    

                <div id="about" class="item">
                    <img src="<?php echo $themeUrl; ?>/css/home/assets/img/12.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>About Us</h1>
                                        <div class="clearfix pad_top13">
                                            <div class="col-md-6">
                                                <p class="row">
                                                    <span class="bold">Specializes in Non-veg , 65, Thanthuri, Sandwich, 65 smoked sandwich.</span><br/><br/> Our team of highly qualified professionals headed by an experienced Chef. Lnim ad minim veniam, quis nostrud.<br /><br />

                                                    Exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla  do tempore ercitationem ut labore. et dolore magna aliqua.								</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="right_content ">
                                                    <div class="sub_title">
                                                        <h4>Opening hours:</h4>
                                                    </div>

                                                    <div class="hour_table">
                                                        <table>
                                                            <tr>
                                                                <td class="days">mon - Fri</td>
                                                                <td>9:00am - 4:00pm</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sat</td>	
                                                                <td>9:00am - 2:00pm</td>		
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sun</td>	
                                                                <td>8:30am - 1:00pm</td>		
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="sub_title">
                                                        <h4>book your table:</h4>
                                                    </div>

                                                    <p>
                                                        We welcome walk-in guests,online at<br/><br><a class="button nav-link" href="#reservation">Book table</a>							</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        

                <!-- // About us
                =============================--> 




                <!--Menu without image 
               =============================--> 
                <div id="menu1" class="item">
                    <img src="<?php echo $themeUrl; ?>/css/home/assets/img/5.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="white_bg">
                                            <h1>Appetizers <a href="sample.pdf" class="link"> <img src="<?php echo $themeUrl; ?>/css/home/assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">Entree hour table time with your choice of tropical mimosa, bloody mary and house beer.</p> <br />
                                            <div class="title-splider clearfix">
                                                <h4><span class="left border_bottom">Pot Stickers (6)</span><span class="right color">$&nbsp;25</span></h4>
                                            </div>
                                            <p>(fried dumplings filled with ground pork and vegetables)</p>

                                            <div class="title-splider clearfix">
                                                <h4><span class="left border_bottom">Satay Salads</span><span class="right color">$&nbsp;17</span></h4>
                                            </div>
                                            <p>  Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>

                                            <div class="title-splider clearfix">
                                                <h4><span class="left border_bottom">Curry Puff (2)</span><span class="right color">$&nbsp;9</span></h4>
                                            </div>
                                            <p> Puff pastry stuffed with ground chicken, onion, potatoes and curry powder with cucumber salad. </p>

                                            <div class="title-splider clearfix">
                                                <h4><span class="left border_bottom">Steamed Dumpling</span><span class="right color">$&nbsp;16</span></h4>
                                            </div>
                                            <p>  Stuffed with shrimp, crabmeat, chicken, shitake mushroom served with spicy soy sauce. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Menu without image 
                =============================--> 




                <!--Menu with image big 
                =============================--> 	

                <div id="menu2" class="item">
                    <img src="<?php echo $themeUrl; ?>/css/home/assets/img/7.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>Menu with images (big) <a href="sample.pdf" class="link"> <img src="<?php echo $themeUrl; ?>/css/home/assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1>
                                        <div class="home3">

                                            <div class="col-md-12 pad_top20">
                                                <div class="row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp1.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Spring Roll</span><span class="right">$&nbsp;6.0</span></h4>
                                                            </div>
                                                            <p>Crispy fried rolls stuffed with shrimp and glass noodles. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/sp2.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Satay</span> <span class="right">$&nbsp;7.0</span></h4>
                                                            </div>
                                                            <p>Choice of chicken or beef marinated in thai herbs.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/sp4.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom"> Pork Loin</span> <span class="right">$&nbsp;12.0</span></h4>
                                                            </div>
                                                            <p>Roasted pork, Swiss chard, Ramps and Wheat spaetzle. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp3.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Curry Puff</span> <span class="right">$&nbsp;10.0</span></h4>
                                                            </div>
                                                            <p>Puff pastry stuffed with ground chicken cucumber salad.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp4.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom"> Pork Loin</span> <span class="right">$&nbsp;12.0</span></h4>
                                                                <p>Roasted pork, Swiss chard, Ramps and Wheat spaetzle. </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp2.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Satay</span> <span class="right">$&nbsp;7.0</span></h4>
                                                            </div>
                                                            <p>Choice of chicken or beef marinated in thai herbs.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp5.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom"> Devil's Food Cake</span><span class="right">$&nbsp;9.0</span></h4>
                                                            </div>
                                                            <p>Chocolate, Black Cardamom, Banana Ice Cream. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp6.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Vegetable Frittata</span> <span class="right">$&nbsp;4.0</span></h4>
                                                            </div>
                                                            <p>Asparagus, fresh thyme, baked in a cast iron skillet.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-3 menu_big"><div class="row"><img src="assets/img/sp3.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-9 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Curry Puff</span> <span class="right">$&nbsp;10.0</span></h4>
                                                            </div>
                                                            <p>Puff pastry stuffed with ground chicken cucumber salad.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Menu with image Big 
                =============================--> 




                <!--Menu with image small 
                =============================--> 

                <div id="menu3" class="item">
                    <img src="assets/img/10.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>Menu with images (Small) <a href="sample.pdf" class="link"> <img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">Menu's and few food photos can be added on the left column, offering American cuisine and warm hospitality in a rustic historically preserved building.</p> <br />
                                        <div class="pad_top30 home3">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp1.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Spring Roll</span><span class="right">$&nbsp;6.0</span></h4>
                                                            </div>
                                                            <p>Crispy fried rolls stuffed with shrimp and glass noodles. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp2.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Satay</span> <span class="right">$&nbsp;7.0</span></h4>
                                                            </div>
                                                            <p>Choice of chicken or beef marinated in thai herbs.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp4.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom"> Pork Loin</span> <span class="right">$&nbsp;12.0</span></h4>
                                                            </div>
                                                            <p>Roasted pork, Swiss chard, Ramps and Wheat spaetzle. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp3.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Curry Puff</span> <span class="right">$&nbsp;10.0</span></h4>
                                                            </div>
                                                            <p>Puff pastry stuffed with ground chicken cucumber salad.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp4.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom"> Pork Loin</span> <span class="right">$&nbsp;12.0</span></h4>
                                                            </div>
                                                            <p>Roasted pork, Swiss chard, Ramps and Wheat spaetzle. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp2.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Satay</span> <span class="right">$&nbsp;7.0</span></h4>
                                                            </div>
                                                            <p>Choice of chicken or beef marinated in thai herbs.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp5.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom"> Devil's Food Cake</span><span class="right">$&nbsp;9.0</span></h4>
                                                            </div>
                                                            <p>Chocolate, Black Cardamom, Banana Ice Cream. </p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row ">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp6.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Vegetable Frittata</span> <span class="right">$&nbsp;4.0</span></h4>
                                                            </div>
                                                            <p>Asparagus, fresh thyme, baked in a cast iron skillet.</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="clearfix row">
                                                    <div class="menu_content clearfix">
                                                        <div class="col-md-2 menu_small"><div class="row"><img src="assets/img/sp3.jpg"  class="img-responsive img_border" alt="" /></div></div>
                                                        <div class="col-md-10 text-left">
                                                            <div class="title-splider">
                                                                <h4 class="clearfix"><span class="left border_bottom">Curry Puff</span> <span class="right">$&nbsp;10.0</span></h4>
                                                            </div>
                                                            <p>Puff pastry stuffed with ground chicken cucumber salad.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Menu with image small 
                =============================--> 




                <!--Menu PDF 
               =============================--> 	

                <div id="menu4" class="item">
                    <img src="assets/img/4.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div id="menupdf" class="white_bg">

                                            <h1>Menu PDF <a href="sample.pdf" class="link"> <img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">All Menu's available in downlodable PDF format & food photos can be added on the left column, congue porta est. Nulla lobortis quis sem id feugiat.</p> <br />
                                            <div class="pad_top30">
                                                <div class="clearfix">
                                                    <h3 class="text-center">Regular Menu</h3>
                                                    <div class="title-splider">
                                                        <h4 class="border_bottom">Breakfast</h4>	
                                                    </div>		
                                                    <p>(fried dumplings filled with ground pork and vegetables)</p>
                                                    <div class="link pad_bot20">
                                                        <a href="sample.pdf" class="link"> view Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a> </div>
                                                    <div class="title-splider">
                                                        <h4 class="border_bottom">Lunch & Brunch</h4>
                                                    </div>
                                                    <p>  Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                    <div class="link pad_bot20">
                                                        <a href="sample.pdf" class="link"> view Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>					 </div>
                                                    <div class="title-splider">
                                                        <h4 class="border_bottom">  Dinner & Desserts </h4>  
                                                    </div>
                                                    <p>  Stuffed with shrimp, crabmeat, chicken, shitake mushroom served with spicy soy sauce. </p>
                                                    <div class="link pad_bot20">
                                                        <a href="sample.pdf" class="link"> view Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a> 						  </div>
                                                    <div class="title-splider">                            </div>
                                                    <div class="title-splider">
                                                        <h4 class="border_bottom">Soups & Salads</h4>
                                                    </div>
                                                    <p>Aromatic chicken soup rich with coconut milk and flavored with galanga and kaffir lime leaves. </p>
                                                    <div class="link pad_bot20">
                                                        <a href="sample.pdf" class="link"> view Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>                            </div>     
                                                </div>
                                                <div class="pad_top20 clearfix">
                                                    <h3 class="text-center">Event Packages</h3>
                                                    <div class="title-splider">
                                                        <h4 class="border_bottom">Night Dinner Packages</h4>
                                                    </div>
                                                    <p>Hot and sour shrimp soup with lemongrass kaffir lime leaves and mushroom.</p>
                                                    <div class="link pad_bot20">
                                                        <a href="sample.pdf" class="link"> view Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a> 						</div>
                                                    <div class="title-splider">
                                                        <h4 class="border_bottom">Catering Combo</h4>
                                                    </div>
                                                    <p>Aromatic chicken soup rich with coconut milk and flavored with galanga, kaffir lime leaves.</p>
                                                    <div class="link pad_bot20">
                                                        <a href="sample.pdf" class="link"> view Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>                     </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Menu PDF 
                =============================--> 




                <!--Menu Toggle 
                =============================--> 

                <div id="menu5" class="item">
                    <img src="assets/img/2.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>Menu Toggle <a href="sample.pdf" class="link"> <img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">All Menu's available in Toggle format, congue porta est. Nulla lobortis quis sem id feugiat.</p> <br />
                                        <div class="clearfix">
                                            <div class="main">
                                                <div class="clearfix">

                                                    <!-- div one created -->
                                                    <div class="pad_top50">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">appetizers</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;5</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Pot Stickers (6)</h4>
                                                                        <p>(fried dumplings filled with ground pork and vegetables)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;7</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Satay Salads</h4>
                                                                        <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;9</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Curry Puff (2)</h4>
                                                                        <p>Puff pastry stuffed with ground chicken, onion, potatoes and currry powder with cucumber salad.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--// .toggle-container end-->
                                                    </div><!-- div one created ends here -->


                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Soups & Salads</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;10</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>TOM YUM</h4>
                                                                        <p>Two poached eggs, tomato sauce, three strips bacon.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;15</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>TOFU SOUP</h4>
                                                                        <p>Hot and sour shrimp soup with lemongrass kaffir lime leaves and mushroom.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--// .toggle-container end-->
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Lunch & Dinner</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>TOM KHA GAI</h4>
                                                                        <p>Aromatic chicken soup rich with coconut milk and flavored with galanga, lime leaves.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;25</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>STEAMED DUMPLING</h4>
                                                                        <p>Stuffed with shrimp, crabmeat, chicken, shitake mushroom served with spicy soy sauce.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;30</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>SMOKED MAPLE</h4>
                                                                        <p>Two poached eggs, tomato sauce, three strips bacon.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Event Packages</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;175</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Night Dinner Packages</h4>
                                                                        <p>Hot and sour shrimp soup with lemongrass kaffir lime leaves and mushroom.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;155</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>CATERING COMBO</h4>
                                                                        <p>aromatic chicken soup rich with coconut milk and flavored with galanga, kaffir lime leaves.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- last div ends here -->
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Menu Toggle 
                =============================-->




                <!--Menu without image2
                =============================--> 

                <div id="menuwithoutimage2" class="item">
                    <img src="assets/img/4.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="white_bg">
                                            <h1>Menu Without Image <a href="sample.pdf" class="link"> <img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">Entree  hour table time with your choice of tropical mimosa, bloody mary and house beer </p> <br />
                                            <div class="clearfix">
                                                <div class="clearfix">
                                                    <div class="specials-round"><h4>$&nbsp;5</h4></div>
                                                    <div class="specials-content" >
                                                        <h4>Pot Stickers (6)</h4>
                                                        <p>(fried dumplings filled with ground pork and vegetables)</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="specials-round"><h4>$&nbsp;7</h4></div>
                                                    <div class="specials-content" >
                                                        <h4>Satay Salads</h4>
                                                        <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="specials-round"><h4>$&nbsp;9</h4></div>
                                                    <div class="specials-content" >
                                                        <h4>Curry Puff (2)</h4>
                                                        <p>Puff pastry stuffed with ground chicken, onion, potatoes and currry powder with cucumber salad.</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="specials-round"><h4>$&nbsp;10</h4></div>
                                                    <div class="specials-content" >
                                                        <h4>TOM YUM</h4>
                                                        <p>Two poached eggs, tomato sauce, three strips bacon.</p>
                                                    </div>
                                                </div>
                                                <div class="clearfix">
                                                    <div class="specials-round"><h4>$&nbsp;15</h4></div>
                                                    <div class="specials-content" >
                                                        <h4>TOFU SOUP</h4>
                                                        <p>Hot and sour shrimp soup with lemongrass kaffir lime leaves and mushroom.</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Menu without image2 
                =============================--> 




                <!--Today Specials 
                =============================-->    

                <div id="special" class="item">
                    <img src="assets/img/16.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Today Special's <a href="sample.pdf" class="link"> <img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">Entree  hour table time with your choice of tropical mimosa, bloody mary and house beer </p> <br />

                                            <div class="clearfix">

                                                <!-- specials area1 starts -->
                                                <div class="pad_top50">
                                                    <div class="heading border_bottom">Appetizers</div>
                                                    <div class="gap"></div>
                                                    <div class="clearfix">
                                                        <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                        <div class="specials-content" >
                                                            <h4>POT STICKERS (6)</h4>
                                                            <p>(fried dumplings filled with ground pork and vegetables)</p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="specials-round"><h4>$&nbsp;20</h4></div>
                                                        <div class="specials-content" >
                                                            <h4>SATAY</h4>
                                                            <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="specials-round"><h4>$&nbsp;35</h4></div>
                                                        <div class="specials-content" >
                                                            <h4>CURRY PUFF</h4>
                                                            <p>Puff pastry stuffed with ground chicken, onion, potatoes and curry powder with cucumber salad.</p>
                                                        </div>
                                                    </div>
                                                    <div class="gap"></div>
                                                    <div class="gap"></div>
                                                    <div class="gap"></div>
                                                </div>

                                                <div class="top">
                                                    <div class="clearfix">
                                                        <div class="heading border_bottom">Lunch & Dinner</div>
                                                        <div class="gap"></div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>TOM KHA GAI</h4>
                                                                <p>Aromatic chicken soup rich with coconut milk and flavored with galanga, kaffir lime leaves.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;25</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>STEAMED DUMPLING</h4>
                                                                <p>Stuffed with shrimp, crabmeat, chicken, shitake mushroom served with spicy soy sauce.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;30</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>SMOKED MAPLE</h4>
                                                                <p>Two poached eggs, tomato sauce, three strips bacon.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>	
                                            </div>													
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Today Specials
                =============================-->       




                <!-- Weekly Menu 
                =============================--> 

                <div id="weeklymenu" class="item">
                    <img src="assets/img/7.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>Weekly Menu<a href="sample.pdf" class="link"> <img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p class="pad_top13">All Menu's available in Toggle format, congue porta est. Nulla lobortis quis sem id feugiat.</p> <br />
                                        <div id="services">
                                            <div class="main">
                                                <div class="clearfix">

                                                    <!-- div one created -->
                                                    <div class="pad_top50">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Monday</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>POT STICKERS (6)</h4>
                                                                        <p>(fried dumplings filled with ground pork and vegetables)</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;20</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>SATAY</h4>
                                                                        <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;35</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>CURRY PUFF</h4>
                                                                        <p>Puff pastry stuffed with ground chicken, onion, potatoes and curry powder with cucumber salad.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--// .toggle-container end-->
                                                    </div><!-- div one created ends here -->
                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Tuesday</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;22</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Spring Roll</h4>
                                                                        <p>Crispy fried rolls stuffed with shrimp and glass noodles.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Pork Loin</h4>
                                                                        <p>Roasted Pork, Swiss Chard, Ramps and Wheat Spaetzle.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--// .toggle-container end-->
                                                    </div>

                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Wednesday</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;14</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Devil's Food Cake</h4>
                                                                        <p>Chocolate, Black Cardamom, Banana Ice Cream.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;20</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>SATAY</h4>
                                                                        <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;25</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Vegetable Frittata</h4>
                                                                        <p>Asparagus, fresh thyme, baked in a cast iron skillet.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!--// .toggle-container end-->
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Thursday</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;12</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Almond Cake</h4>
                                                                        <p>Rhubarb, Mascarpone Cream and Brown Sugar Ice Cream.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;16</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Potato Salad</h4>
                                                                        <p>Black Bass, Fennel, Olives and Fingerling Potatoes.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Friday</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;30</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Egg Sandwich</h4>
                                                                        <p>scrambled eggs, on our whole wheat, with carrot hash browns.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;26</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Mushroom Broth</h4>
                                                                        <p>Spring Onion & Smoked Egg, Kohlrabi and Emmer Noodles.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix">
                                                        <div class="toggle-container">
                                                            <div class="toggle-header">
                                                                <div class="toggle-link toggle-open">Saturday &amp; Sunday</div>
                                                            </div>
                                                            <div class="toggle-content">
                                                                <div class="pad_top20 clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;35</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Egg with Chees</h4>
                                                                        <p>Kale & Ancient Grains Salad, Dates, Sbrinz Cheese. </p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Pork Loin</h4>
                                                                        <p>Roasted Pork, Swiss Chard, Ramps and Wheat Spaetzle.</p>
                                                                    </div>
                                                                </div>
                                                                <div class="clearfix">
                                                                    <div class="specials-round"><h4>$&nbsp;25</h4></div>
                                                                    <div class="specials-content" >
                                                                        <h4>Vegetable Frittata</h4>
                                                                        <p>Puff pastry stuffed with ground chicken, onion, potatoes and curry powder with cucumber salad.</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div><!-- last div ends here -->
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Weekly Menu 
                =============================--> 




                <!-- Lounge bar
                =============================-->  

                <div id="loungebar" class="item">
                    <img src="assets/img/18.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Lounge Bar</h1><p class="pad_top13">The cool bar lounge is a haven for cocktails with casual seating for up to 40 guests. In the evening guests can call in for a relaxing drink with no need to dine in the restaurant.. </p> <br />

                                            <div class="clearfix pad_top30">
                                                <div class="title">Bar Lounge Features</div>
                                                <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                <div class="pd_list">
                                                    <ul>
                                                        <li><i class="fa fa-check"></i>Company Picnics</li>
                                                        <li><i class="fa fa-check"></i>Happy Hours (08:00 AM to 04:00 PM)</li>
                                                        <li><i class="fa fa-check"></i>Holiday Parties</li>
                                                        <li><i class="fa fa-check"></i>Corporate Catering</li>
                                                    </ul>
                                                </div>
                                                <div class="link pad_top20 pad_bot20">
                                                    <a href="sample.pdf" class="link"> <span class="normal">view our</span> Cocktail Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>	</div>
                                            </div>	
                                            <div class="clearfix pad_top30">
                                                <div class="title">Take away</div>
                                                <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                <div class="pd_list">
                                                    <ul>
                                                        <li><i class="fa fa-check"></i>Free Home Delivery</li>
                                                        <li><i class="fa fa-check"></i>24x7 Service</li>
                                                        <li><i class="fa fa-check"></i>20% Discount</li>
                                                    </ul>
                                                </div>
                                                <div class="link pad_top20 pad_bot20">
                                                    <a href="sample.pdf" class="link"> <span class="normal">view our</span> Take Away Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>	</div>
                                            </div>												
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Lounge bar
                =============================-->  




                <!-- Pages
                
                =============================-->    

                <!-- Samples
                =============================-->


                <!-- Aboutus Fullwidth
                =============================--> 

                <div id="fullwidth" class="item fullwidth">
                    <img src="assets/img/12.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">
                        <div class="content_overlay_fullwidth"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-12 content_text">
                                        <h1>Full-Width</h1>
                                        <div class="clearfix pad_top13">
                                            <div class="col-md-8">
                                                <p class="row">
                                                    <span class="bold">Specializes in Non-veg , 65, Thanthuri, Sandwich, 65 smoked sandwich.</span><br/><br/> Our team of highly qualified professionals headed by an experienced Chef. Lnim ad minim veniam, quis nostrud.<br /><br />

                                                    Exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla  do tempore ercitationem ut labore. et dolore magna aliqua.<br /><br />

                                                    Ut labore et dolore magna aliqua. Ut enim ad consequatur quis nostrud exercitation ullamco. Exercitationem ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor.							</p>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="right_content ">
                                                    <div class="sub_title">
                                                        <h4>Opening hours:</h4>
                                                    </div>

                                                    <div class="hour_table">
                                                        <table>
                                                            <tr>
                                                                <td class="days">mon - Fri</td>
                                                                <td>9:00am - 4:00pm</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sat</td>	
                                                                <td>9:00am - 2:00pm</td>		
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sun</td>	
                                                                <td>8:30am - 1:00pm</td>		
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="sub_title">
                                                        <h4>book your table:</h4>
                                                    </div>

                                                    <p>
                                                        We welcome walk-in guests,online at<br/><br><a class="button nav-link" href="#reservation">Book table</a>								</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <!-- // Aboutus Fullwidth
                =============================--> 




                <!-- Aboutus Three-Fourth
                =============================-->  

                <div id="threefourth" class="item three_fourth">
                    <img src="assets/img/12.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">
                        <div class="content_overlay_three_fourth"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-3 empty">&nbsp;</div>
                                    <div class="col-md-9 content_text">
                                        <h1>Three-Fourth-Width</h1>
                                        <div class="clearfix pad_top13">
                                            <div class="col-md-7">
                                                <p class="row">
                                                    <span class="bold">Specializes in Non-veg , 65, Thanthuri, Sandwich, 65 smoked sandwich.</span><br/><br/> Our team of highly qualified professionals headed by an experienced Chef. Lnim ad minim veniam, quis nostrud.<br /><br />

                                                    Exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla  do tempore ercitationem ut labore. et dolore magna aliqua.								</p>
                                            </div>
                                            <div class="col-md-5">
                                                <div class="right_content ">
                                                    <div class="sub_title">
                                                        <h4>Opening hours:</h4>
                                                    </div>

                                                    <div class="hour_table">
                                                        <table>
                                                            <tr>
                                                                <td class="days">mon - Fri</td>
                                                                <td>9:00am - 4:00pm</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sat</td>	
                                                                <td>9:00am - 2:00pm</td>		
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sun</td>	
                                                                <td>8:30am - 1:00pm</td>		
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="sub_title">
                                                        <h4>book your table:</h4>
                                                    </div>

                                                    <p>
                                                        We welcome walk-in guests,online at<br/><br><a class="button nav-link" href="#reservation">Book table</a>								</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  

                <!-- // Aboutus Three-Fourth
                =============================--> 




                <!--Aboutus Default
                =============================-->     

                <div id="default" class="item">
                    <img src="assets/img/12.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>Default (Half-Width)</h1>
                                        <div class="clearfix pad_top13">
                                            <div class="col-md-6">
                                                <p class="row">
                                                    <span class="bold">Specializes in Non-veg , 65, Thanthuri, Sandwich, 65 smoked sandwich.</span><br/><br/> Our team of highly qualified professionals headed by an experienced Chef. Lnim ad minim veniam, quis nostrud.<br /><br />

                                                    Exercitation ullamco laboris nisi ut aliquip ex ea commodo. Duis aute dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla  do tempore ercitationem ut labore. et dolore magna aliqua.								</p>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="right_content ">
                                                    <div class="sub_title">
                                                        <h4>Opening hours:</h4>
                                                    </div>

                                                    <div class="hour_table">
                                                        <table>
                                                            <tr>
                                                                <td class="days">mon - Fri</td>
                                                                <td>9:00am - 4:00pm</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sat</td>	
                                                                <td>9:00am - 2:00pm</td>		
                                                            </tr>
                                                            <tr>
                                                                <td class="days">Sun</td>	
                                                                <td>8:30am - 1:00pm</td>		
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="sub_title">
                                                        <h4>book your table:</h4>
                                                    </div>

                                                    <p>
                                                        We welcome walk-in guests,online at<br/><br><a class="button nav-link" href="#reservation">Book table</a>								</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>        

                <!-- // Aboutus Default
                =============================--> 


                <!-- //Samples
                =============================-->




                <!-- Chef Bio
                =============================-->    

                <div id="chefbio" class="item">
                    <img src="assets/img/17.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>David jacob</h1>

                                            <div class="clearfix pad_top13">
                                                <div class="col-md-6">
                                                    <p class="row">
                                                        <span class="bold">David jacob is a chef and the host, 20 years Exp in food Industries.</span><br/><br/>
                                                        Ut labore et dolore magna aliqua. Ut enim ad consequatur quis nostrud exercitation ullamco. Exercitationem ut labore et dolore magna aliqua. Lorem ipsum dolor sit amet, consectetur adi pisi cing elit, sed do eiusmod tempor.<br/><br/>

                                                        Ut labore et dolore magna aliqua. Ut enim ad consequatur quis nostrud.            </p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="right_content ">
                                                        <blockquote><p><span class="quotes">&quot;</span>Cooking comes so natural to me. I've been around kitchens my whole life.<span class="quotes">&quot;</span></p></blockquote>

                                                        <div class="clearfix header_icons accura-header-block accura-hidden-2xs ">
                                                            <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                                                <li><a href="http://www.facebook.com" target="_blank" class="accura-social-icon-facebook circle"><i class="fa fa-facebook"></i></a></li>
                                                                <li><a href="http://www.twitter.com" target="_blank" class="accura-social-icon-twitter circle"><i class="fa fa-twitter"></i></a></li>
                                                                <li><a href="http://www.googleplus.com" target="_blank" class="accura-social-icon-gplus circle"><i class="fa fa-google-plus"></i></a></li>
                                                                <li><a href="https://www.pinterest.com/login/" target="_blank" class="accura-social-icon-pinterest circle"><i class="fa fa-pinterest"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>													
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Chef Bio
                =============================-->    




                <!-- Gift Cards
                =============================-->  

                <div id="giftcards" class="item">
                    <img src="assets/img/12a.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Gift Cards</h1><p class="pad_top13">We are registered at, 20 years Experience in food Industries.  We accumulated a good amount of items for you to check out at your leisure. </p> <br />

                                            <div class="clearfix content_space">
                                                <ul class="cbp-ig-grid ">
                                                    <li><a href="http://www.domainname.com"><img src="assets/img/client_img16.png" alt=""  class="img-responsive"/></a></li>
                                                    <li><a href="http://www.domainname.com"><img src="assets/img/client_img17.png" alt=""  class="img-responsive"/></a></li>
                                                    <li><a href="http://www.domainname.com"><img src="assets/img/client_img23.png" alt=""  class="img-responsive"/></a></li>
                                                    <li><a href="http://www.domainname.com"><img src="assets/img/client_img22.png" alt=""  class="img-responsive"/></a></li>										
                                                </ul>
                                            </div>													
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Gift Cards
                =============================--> 




                <!-- Locations
                =============================--> 

                <div id="locations" class="item">
                    <img src="assets/img/map.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Our Locations</h1><p class="pad_top13">Some of our locations, 20 years Exp in food Industries, David jacob is a chef and the host. </p> <br />

                                            <div class="clearfix content_space">
                                                <div class="clearfix location_content">
                                                    <div class="row col-md-7">
                                                        <div class="location-address-wrap">
                                                            <h3 class="border_bottom"><i class="fa fa-map-marker"></i>New York</h3>
                                                            <div class="clearfix location-street">#12 FIFTH MAIN STREET<br />NY 10307, USA</div>
                                                            <div class="clearfix location-phone"><i class="fa fa-phone"></i>+1 123 456 7890 <br /><i class="fa fa-fax"></i>+1 123 456 7890 </div>
                                                            <div class="clearfix location-cateringlink">On-Site catering is no longer available.  We offer carry-out in this location. </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-md-5 location-btns">
                                                        <div class="location map-link"><a class="button  nav-link" href="#contact">Google Maps</a></div>
                                                        <div class="location"><a class="button  nav-link" href="#reservation">Book A Table</a> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix location_content content_space">
                                                    <div class="row col-md-7">
                                                        <div class="location-address-wrap">
                                                            <h3 class="border_bottom"><i class="fa fa-map-marker"></i>New Jersey</h3>
                                                            <div class="clearfix location-street">#112 first MAIN STREET<br />Nj 10307, USA</div>
                                                            <div class="clearfix location-phone"><i class="fa fa-phone"></i>+1 123 456 7890 <br /><i class="fa fa-fax"></i>+1 123 456 7890   </div>
                                                            <div class="clearfix location-cateringlink">On-Site catering is no longer available.  We offer carry-out in this location. </div>
                                                        </div>
                                                    </div>
                                                    <div class="row col-md-5 location-btns">
                                                        <div class="location map-link"><a class="button  nav-link" href="#contact">Google Maps</a></div>
                                                        <div class="location"><a class="button  nav-link" href="#reservation">Book A Table</a> </div>
                                                    </div>
                                                </div>
                                                <div class="clearfix location_content content_space">
                                                    <div class="row col-md-7">
                                                        <div class="location-address-wrap">
                                                            <h3 class="border_bottom"><i class="fa fa-map-marker"></i>Baltimore</h3>
                                                            <div class="clearfix location-street">#78 first MAIN STREET<br />MD 38018, USA</div>
                                                            <div class="clearfix location-phone"><i class="fa fa-phone"></i>+1 123 456 7890<br /> <i class="fa fa-fax"></i>+1 123 456 7890  </div>
                                                            <div class="clearfix location-cateringlink">On-Site catering is no longer available. We offer carry-out in this location. </div>
                                                        </div>
                                                    </div>

                                                    <div class="row col-md-5 location-btns">
                                                        <div class="location map-link"><a class="button  nav-link" href="#contact">Google Maps</a></div>
                                                        <div class="location"><a class="button  nav-link" href="#reservation">Book A Table</a> </div>
                                                    </div>
                                                </div>
                                            </div>													
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Locations
                =============================--> 




                <!-- Private Dining
                =============================--> 

                <div id="privatedining" class="item">
                    <img src="assets/img/8.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>PRIVATE DINING </h1>
                                            <p class="pad_top13">Each Phil Stefani Signature Restaurants offers private Chicago dining experience. Our staff has a wealth of involvement in customizing all types of events.</p>

                                            <div class="clearfix content_space">
                                                <div class="title">CORPORATE EVENTS</div>
                                                <p>Ut labore et dolore magna aliqua. ut enim ad consequatur quis nostrud exercitation ullamco. consectetur adi pisi cing elit.</p>
                                                <div class="pd_list">
                                                    <ul>
                                                        <li><i class="fa fa-check"></i>Company Picnics</li>
                                                        <li><i class="fa fa-check"></i>Company Lunches/Dinners</li>
                                                        <li><i class="fa fa-check"></i>Holiday Parties</li>
                                                        <li><i class="fa fa-check"></i>Corporate Catering</li>
                                                    </ul>
                                                </div>
                                            </div>	
                                            <div class="clearfix content_space">
                                                <div class="title">WEDDINGS &amp; PRIVATE PARTIES</div>
                                                <p>Exercitationem ut labore et dolore magna aliqua. lorem ipsum dolor sit amet, consectetur adi pisi cing elit.</p>
                                                <div class="pd_list">
                                                    <ul>
                                                        <li><i class="fa fa-check"></i>Birthdays</li>
                                                        <li><i class="fa fa-check"></i>Anniversaries</li>
                                                        <li><i class="fa fa-check"></i>Wedding Receptions</li>
                                                        <li><i class="fa fa-check"></i>Wedding Day</li>
                                                    </ul>
                                                </div>
                                            </div>	
                                            <div class="pd_btn">
                                                <a class="button nav-link" href="#reservation">REQUEST A FREE CONSULTATION</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Private Dining
                =============================--> 




                <!-- Catering
                =============================--> 

                <div id="catering" class="item">
                    <img src="assets/img/8a.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Catering</h1>
                                            <p class="pad_top13">Each Phil Stefani Signature Restaurants offers private Chicago dining experience. Our staff has a wealth of involvement in customizing all types of events.</p>

                                            <div class="clearfix content_space">
                                                <div class="title">Self-Serve Buffet</div>
                                                <p>Catering item for groups of 4 or more and includes a full meal starting at just <span class="content_bold">$9.99</span> per person. </p>
                                                <div class="pd_list">
                                                    <ul>
                                                        <li><i class="fa fa-check"></i>Company Picnics</li>
                                                        <li><i class="fa fa-check"></i>Company Lunches/Dinners</li>
                                                        <li><i class="fa fa-check"></i>Holiday Parties</li>
                                                        <li><i class="fa fa-check"></i>Corporate Catering</li>
                                                    </ul>
                                                </div>
                                                <div class="link pad_top20 pad_bot20">
                                                    <a href="sample.pdf" class="link"> <span class="normal">view our</span> Catering Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>	</div>
                                            </div>	
                                            <div class="clearfix content_space">
                                                <div class="title">Party platters</div>
                                                <p> Unique platters are the perfect choice for hors d'oeuvres, appetizers, or simple platters for group events of any size.</p>
                                                <div class="link pad_top20 pad_bot20">
                                                    <a href="sample.pdf" class="link"> <span class="normal">view our </span>Catering Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>	</div>
                                            </div>	
                                            <div class="clearfix content_space">
                                                <div class="title">Boxed Breakfast</div>
                                                <p> Brown bag sandwich lunches is sure to impress with various unique options in individual, pre-packaged containers. </p>
                                                <div class="pd_list">
                                                    <ul>
                                                        <li><i class="fa fa-check"></i>Company Picnics</li>
                                                        <li><i class="fa fa-check"></i>Company Lunches/Dinners</li>
                                                        <li><i class="fa fa-check"></i>Holiday Parties</li>
                                                        <li><i class="fa fa-check"></i>Corporate Catering</li>
                                                    </ul>
                                                </div>
                                                <div class="link pad_top20 pad_bot20">
                                                    <a href="sample.pdf" class="link"> <span class="normal">view our</span> Catering Menu&nbsp;<img src="assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a>	</div>
                                            </div>		
                                            <div class="pd_btn">
                                                <a class="button nav-link" href="#reservation">Get A Quote Here</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- //  Catering
                =============================--> 




                <!-- Testimonials
                =============================-->    

                <div id="testimonials" class="item">
                    <img src="assets/img/17.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Testimonials</h1><p class="pad_top13">Nutritionists, naturopaths, doctors, and journalists weigh in on topics organic food.</p><br />

                                            <div class="clearfix pad_top30">
                                                <div class="row col-md-12">

                                                    <div class="testimonial_tweets">
                                                        <p class="border_bottom">
                                                            <span class="bold">Eating there again soon!</span>        </p>
                                                        <p>	<span class="quotes">&quot;</span>Will definitely be eating there again soon, Good Taste and Great Price and very prompt service.<span class="quotes">&quot;</span></p>
                                                        <p class="author">Michel. <span>Pennington, NJ</span></p>
                                                    </div>

                                                    <div class="testimonial_tweets">
                                                        <p class="border_bottom pad_top50">
                                                            <span class="bold">Great Food and good taste</span>        </p>
                                                        <p>	<span class="quotes">&quot;</span>The Spice Lounge is a Great Food and good taste on many occasions I have gone for lunch there is always a reasonable crowd.<span class="quotes">&quot;</span></p>
                                                        <p class="author">David jacob <span>Lawrenceville, NJ</span></p>
                                                    </div>

                                                    <div class="testimonial_tweets">
                                                        <p class="border_bottom pad_top50">
                                                            <span class="bold">The service is great!</span>        </p>
                                                        <p> 	<span class="quotes">&quot;</span>This is an awesome place to go for food and entertainment, Happy Hour is a must! The service is great! David does a great job, thank you! 	<span class="quotes">&quot;</span></p>
                                                        <p class="author">Davis. <span>Trenton, NJ</span></p>
                                                    </div>

                                                    <div class="testimonial_tweets">
                                                        <p class="border_bottom pad_top50">
                                                            <span class="bold">Staff friendly good atmosphere.</span>        </p>
                                                        <p> 	<span class="quotes">&quot;</span>Thank you for a wonderful evening. My Family had a memorable evening,  Food is always great. Staff friendly good atmosphere,  professional as ever and the food was fantastic.	<span class="quotes">&quot;</span></p>
                                                        <p class="author">Steve Jones. <span>Princeton, NJ</span></p>
                                                    </div>
                                                </div>
                                            </div>													
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Testimonials
                =============================--> 



                <!-- // Pages
                =============================-->  




                <!--Gallery 
                =============================--> 

                <div id="gallery" class="item">
                    <div id="slides" class="clearfix">
                        <div class="cycle-slideshow" 
                             data-cycle-fx=fade
                             data-cycle-speed=1000
                             data-cycle-timeout=3000
                             data-cycle-caption-plugin=caption2
                             data-cycle-overlay-fx-out="fadeOut"
                             data-cycle-overlay-fx-in="fadeIn"
                             data-cycle-prev=".prev" 
                             data-cycle-next=".next"     
                             >
                            <div class="cycle-overlay"></div>

                            <img src="assets/img/2.jpg" data-cycle-desc="Come hungry. Leave happy."  class="fullBg" alt="">
                            <img src="assets/img/4.jpg" data-cycle-desc="We love to see you . smile" class="fullBg" alt="">
                            <img src="assets/img/5.jpg" data-cycle-desc="Delicious Food " class="fullBg" alt="">
                            <img src="assets/img/7.jpg" data-cycle-desc="Best Taste Great Price" class="fullBg" alt=""></div>
                        <div class="galheading clearfix"><h1>Gallery Cycle-Slider</h1></div>
                        <div id="button" class="clearfix">
                            <div class="prev"><i class="fa fa-angle-left"></i></div>
                            <div class="next"><i class="fa fa-angle-right"></i></div>
                        </div>
                    </div>
                </div>

                <!-- // Gallery 
                =============================--> 




                <!-- Gallery  SS
                =============================--> 

                <div id="galleryss" class="item">

                    <!--Thumbnail Navigation-->
                    <div id="prevthumb"></div>
                    <div id="nextthumb"></div>

                    <!--Arrow Navigation-->
                    <a id="prevslide" class="load-item"></a>
                    <a id="nextslide" class="load-item"></a>

                    <div id="thumb-tray" class="load-item">
                        <div id="thumb-back"></div>
                        <div id="thumb-forward"></div>
                    </div>

                    <!--Time Bar-->
                    <div id="progress-back" class="load-item">
                        <div id="progress-bar"></div>
                    </div>

                    <!--Control Bar-->
                    <div id="controls-wrapper" class="load-item">
                        <div id="controls">

                            <a id="play-button"><img id="pauseplay" src="img/pause.png" alt=""/></a>

                            <!--Slide counter-->
                            <div id="slidecounter">
                                <span class="slidenumber"></span> / <span class="totalslides"></span>			</div>

                            <!--Slide captions displayed here-->
                            <div id="slidecaption"></div>

                            <!--Thumb Tray button-->
                            <a id="tray-button"><img id="tray-arrow" src="img/button-tray-up.png" alt=""/></a>

                            <!--Navigation-->
                            <ul id="slide-list"></ul>
                        </div>
                    </div>
                    <div class="galheading clearfix"><h1>Gallery Super-Sized</h1></div>
                </div>

                <!-- // Gallery  SS Ends
                =============================--> 




                <!-- Filter Gallery 
                =============================--> 

                <div id="filtergallery" class="item">
                    <img src="assets/img/5.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content contentscroll">
                        <div class="content_overlay_fullwidth"></div>
                        <section class="portfolio">
                            <!-- Portfolio Section -->    
                            <section class="section">
                                <div class="container">
                                    <div class="prettygalheading clearfix text-center"><h1>Gallery Filter</h1>
                                        <p class="text-center pad_top13">Nutritionists, naturopaths, doctors, and journalists weigh in on topics organic food.</p>
                                    </div>
                                    <!-- Portfolio Filters -->
                                    <ul id="filters">
                                        <li class="filter" data-filter="all">All</li>
                                        <li class="filter" data-filter="food">Food</li>
                                        <li class="filter" data-filter="events">Events</li>
                                        <li class="filter" data-filter="vimeo">Vimeo</li>
                                        <li class="filter" data-filter="you_tube">You tube</li>
                                    </ul>
                                    <!-- End Portfolio Filters -->
                                </div>
                                <div class="portfolio-top"></div> 
                                <!-- Portfolio Grid -->
                                <ul id="portfolio-grid" class="portfolio-grid">
                                    <!-- Portfolio Item 1 -->    
                                    <li class="mix all food vimeo mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/16.jpg" alt="">
                                            <div class="mask"><a href="assets/img/16.jpg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Spring Roll</h3>
                                                        <span class="project-name">Food</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 1 -->

                                    <!-- Portfolio Item 2 -->
                                    <li class="mix all events you_tube mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/18.jpg" alt="">
                                            <div class="mask"><a href="assets/img/18.jpg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Dinner Series</h3>
                                                        <span class="project-name">Events</span>            </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 2 -->

                                    <!-- Portfolio Item 3 -->
                                    <li class="mix all you_tube events mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/8.jpg" alt="">
                                            <div class="mask"><a href="https://www.youtube.com/watch?v=gcISzEAQJxg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Vegitable trittatta</h3>
                                                        <span class="project-name">Youtube</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 3 -->

                                    <!-- Portfolio Item 4 -->
                                    <li class="mix all food vimeo events  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/2.jpg" alt="">
                                            <div class="mask"><a href="assets/img/2.jpg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Curry Puff</h3>
                                                        <span class="project-name">Food</span>        </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 4 -->

                                    <!-- Portfolio Item 5 -->
                                    <li class="mix all events  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/19.jpg" alt="">
                                            <div class="mask"><a href="assets/img/19.jpg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Food &amp; Wine</h3>
                                                        <span class="project-name">Events</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 5 -->

                                    <!-- Portfolio Item 6 -->
                                    <li class="mix all food you_tube  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/4.jpg" alt="">
                                            <div class="mask"><a href="assets/img/4.jpg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Satay</h3>
                                                        <span class="project-name">Food</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 6 -->

                                    <!-- Portfolio Item 7 -->
                                    <li class="mix all food vimeo  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/7.jpg" alt="">
                                            <div class="mask"><a href="assets/img/7.jpg" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Pork Loin</h3>
                                                        <span class="project-name">Food</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 7 -->

                                    <!-- Portfolio Item 8 -->
                                    <li class="mix all vimeo you_tube  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/12.jpg" alt="">
                                            <div class="mask"><a href="http://vimeo.com/21019223" title="Project description" data-rel="prettyPhoto[gallery1]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Delicious Food</h3>
                                                        <span class="project-name">Vimeo</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 8 -->
                                </ul>
                                <!-- End Portfolio Grid -->
                            </section>
                            <!-- End Portfolio Section -->
                        </section>
                    </div>
                </div>

                <!-- // Filter Gallery 
                =============================--> 




                <!-- Gallery Without Filter
                =============================--> 

                <div id="gallerywithoutfilter" class="item">
                    <img src="assets/img/5.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content contentscroll">
                        <div class="content_overlay_fullwidth"></div>
                        <section class="portfolio">
                            <!-- Portfolio Section -->    
                            <section class="section">
                                <div class="container">
                                    <div class="prettygalheading clearfix text-center"><h1>Gallery Without Filter</h1></div>
                                </div>
                                <div class="portfolio-top"></div> 
                                <p class="text-center pad_top13">Nutritionists, naturopaths, doctors, and journalists weigh in on topics organic food.</p>

                                <!-- Portfolio Grid -->
                                <ul class="portfolio-grid">
                                    <!-- Portfolio Item 1 -->    
                                    <li class="mix all food vimeo mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/16.jpg" alt="">
                                            <div class="mask"><a href="assets/img/16.jpg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Spring Roll</h3>
                                                        <span class="project-name">Food</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 1 -->

                                    <!-- Portfolio Item 2 -->
                                    <li class="mix all events you_tube mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/18.jpg" alt="">
                                            <div class="mask"><a href="assets/img/18.jpg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Dinner Series</h3>
                                                        <span class="project-name">Events</span>            </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 2 -->

                                    <!-- Portfolio Item 3 -->
                                    <li class="mix all you_tube events mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/8.jpg" alt="">
                                            <div class="mask"><a href="https://www.youtube.com/watch?v=gcISzEAQJxg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Vegitable trittatta</h3>
                                                        <span class="project-name">Youtube</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 3 -->

                                    <!-- Portfolio Item 4 -->
                                    <li class="mix all food vimeo events  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/2.jpg" alt="">
                                            <div class="mask"><a href="assets/img/2.jpg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Curry Puff</h3>
                                                        <span class="project-name">Food</span>        </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 4 -->

                                    <!-- Portfolio Item 5 -->
                                    <li class="mix all events  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/19.jpg" alt="">
                                            <div class="mask"><a href="assets/img/19.jpg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Food &amp; Wine</h3>
                                                        <span class="project-name">Events</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 5 -->

                                    <!-- Portfolio Item 6 -->
                                    <li class="mix all food you_tube  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/4.jpg" alt="">
                                            <div class="mask"><a href="assets/img/4.jpg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Satay</h3>
                                                        <span class="project-name">Food</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 6 -->

                                    <!-- Portfolio Item 7 -->
                                    <li class="mix all food vimeo  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/7.jpg" alt="">
                                            <div class="mask"><a href="assets/img/7.jpg" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Pork Loin</h3>
                                                        <span class="project-name">Food</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 7 -->

                                    <!-- Portfolio Item 8 -->
                                    <li class="mix all vimeo you_tube  mix_all">
                                        <div class="view3 third-effect3"><img src="assets/img/12.jpg" alt="">
                                            <div class="mask"><a href="http://vimeo.com/21019223" title="Project description" data-rel="prettyPhoto[gallery2]" class="viewDetail lightbox info">
                                                    <div class="project-overlay">
                                                        <h3>Delicious Food</h3>
                                                        <span class="project-name">Vimeo</span>          </div>
                                                </a>            </div>
                                        </div>
                                    </li>
                                    <!-- // Portfolio Item 8 -->
                                </ul>
                                <!-- End Portfolio Grid -->
                            </section>
                            <!-- End Portfolio Section -->
                        </section>
                    </div>
                </div>

                <!-- // Gallery Without Filter
                =============================--> 




                <!-- Gallery Half-Width
                =============================--> 

                <div id="galleryhalfwidth" class="item">
                    <img src="assets/img/17.jpg" alt="The Spice Lounge" class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <div class="clearfix" >
                                            <h1>Gallery Half-Width</h1>
                                            <p class="pad_top13">Nutritionists, naturopaths, doctors, and journalists weigh in on topics organic food.</p>

                                            <div class="clearfix pad_top20">
                                                <div class="two_half">
                                                    <ul class="portfolio-grid">
                                                        <!-- Portfolio Item 1 -->    
                                                        <li class="mix all food vimeo mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/16.jpg" alt="">
                                                                <div class="mask"><a href="assets/img/16.jpg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Spring Roll</h3>
                                                                            <span class="project-name">Food</span>          </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 1 -->

                                                        <!-- Portfolio Item 2 -->
                                                        <li class="mix all events you_tube mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/18.jpg" alt="">
                                                                <div class="mask"><a href="assets/img/18.jpg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Dinner Series</h3>
                                                                            <span class="project-name">Events</span>            </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 2 -->

                                                        <!-- Portfolio Item 3 -->
                                                        <li class="mix all you_tube events mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/8.jpg" alt="">
                                                                <div class="mask"><a href="https://www.youtube.com/watch?v=gcISzEAQJxg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Vegitable trittatta</h3>
                                                                            <span class="project-name">Youtube</span>          </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 3 -->

                                                        <!-- Portfolio Item 4 -->
                                                        <li class="mix all food vimeo events  mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/2.jpg" alt="">
                                                                <div class="mask"><a href="assets/img/2.jpg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Curry Puff</h3>
                                                                            <span class="project-name">Food</span>        </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 4 -->

                                                        <!-- Portfolio Item 5 -->
                                                        <li class="mix all events  mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/19.jpg" alt="">
                                                                <div class="mask"><a href="assets/img/19.jpg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Food &amp; Wine</h3>
                                                                            <span class="project-name">Events</span>          </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 5 -->

                                                        <!-- Portfolio Item 6 -->
                                                        <li class="mix all food you_tube  mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/4.jpg" alt="">
                                                                <div class="mask"><a href="assets/img/4.jpg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Satay</h3>
                                                                            <span class="project-name">Food</span>          </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 6 -->

                                                        <!-- Portfolio Item 7 -->
                                                        <li class="mix all food vimeo  mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/7.jpg" alt="">
                                                                <div class="mask"><a href="assets/img/7.jpg" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Pork Loin</h3>
                                                                            <span class="project-name">Food</span>          </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 7 -->

                                                        <!-- Portfolio Item 8 -->
                                                        <li class="mix all vimeo you_tube  mix_all">
                                                            <div class="view3 third-effect3"><img src="assets/img/12.jpg" alt="">
                                                                <div class="mask"><a href="http://vimeo.com/21019223" title="Project description" data-rel="prettyPhoto[gallery3]" class="viewDetail lightbox info">
                                                                        <div class="project-overlay">
                                                                            <h3>Delicious Food</h3>
                                                                            <span class="project-name">Vimeo</span>          </div>
                                                                    </a>            </div>
                                                            </div>
                                                        </li>
                                                        <!-- // Portfolio Item 8 -->
                                                    </ul>	
                                                </div>
                                            </div>													
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Gallery Half-Width
                =============================--> 




                <!--Event 
                =============================-->

                <div id="event" class="item">
                    <img src="assets/img/19.jpg"  alt="the Paxton Gipsy Hill"  class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>News &amp; Events</h1>
                                        <div class="clearfix pad_top13">
                                            <div class="col-md-3">
                                                <div class="left_content">
                                                    <div class="title">feb 1 2014</div> 
                                                    <p> 8.00 pm - 11.00 pm</p>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="right_content">
                                                    <div class="title">food and wine "best new chef" dinner series lorem Ipsum.</div>
                                                    <p>Donec venenatis felis ut est auctor tempor. Donec quis bibendum lorem, quis varius orci. Sed id urna ac metus porta hendrerit. </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix content_space">
                                            <div class="col-md-3">
                                                <div class="left_content">
                                                    <div class="title">feb 1 2014</div> 
                                                    <p> 9.00 pm - 11.00 pm</p>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="right_content">
                                                    <div class="title">DJ Robert Roy spinning the best dance music lorem Ipsum.</div>
                                                    <p>Donec venenatis felis ut est auctor tempor. Donec quis bibendum lorem, quis varius orci. Sed id urna ac metus porta hendrerit.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix content_space">
                                            <div class="col-md-3">
                                                <div class="left_content">
                                                    <div class="title">feb 1 2014</div> 
                                                    <p> 7.00 pm - 10.00 pm</p>
                                                </div>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="right_content">
                                                    <div class="title">food and wine "best new chef" dinner series lorem Ipsum.</div>
                                                    <p>Phasellus eget enim dapibus, aliquet leo nec, convallis tellus. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.<br><br>
                                                        Phasellus eget vulputate ipsum. Aliquam tincidunt et lacus non ultrices. Mauris lobortismetus, quis vestibulum libero tincidunt sed. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Event 
                =============================-->




                <!--Reservation 
                =============================-->

                <div id="reservation" class="item">
                    <img src="assets/img/8.jpg"  alt="the Paxton Gipsy Hill"  class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner" >
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>

                                    <div class="col-md-6 content_text">
                                        <div id="reservations">
                                            <h1>Reservation</h1>
                                            <form id="reservation_form" class="reserve_form pad_top13" action="#" method="post">
                                                <p>You can make a reservation by filling out the form below, Please note that reservations are only confirmed once we check availability.</p>
                                                <h4>Pick your Date & Time</h4>

                                                <div class="clearfix date_mar">
                                                    <div class="input-group date form_datetime" data-date="" data-date-format="dd MM yyyy - HH:ii p" data-link-field="dtp_input1">
                                                        <input name="dt" type="text" value="" readonly>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                                                        <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>                </div>
                                                    <input type="hidden" id="dtp_input1" value="" />
                                                </div>

                                                <h4>Reservation Details</h4>
                                                <div class="clearfix reserve_form"> 
                                                    <input type="text" name="name" class="validate['required'] textbox1" placeholder="* Name : "
                                                           onfocus="this.placeholder = ''" onBlur="this.placeholder = '* Name :'" />
                                                    <input type="text" name="email"  class="validate['required','email']  textbox1"
                                                           placeholder="* Email : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Email :'" />
                                                    <input type="text" name="phone" class="validate['required','phone']  textbox1"
                                                           placeholder="* Phone : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Phone :'" />
                                                    <textarea name="message" class="validate['required'] messagebox1"
                                                              placeholder="* Message : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Message :'"></textarea>
                                                    <input id="reservesubmitBtn" value="book a table" name="Confirm" type="submit" class="submitBtn">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>   

                <!-- // Reservation 
                =============================-->




                <!--Contact 
                =============================-->

                <div id="contact" class="item">
                    <div class="content">
                        <div id="map_canvas" class="fullBg"></div>
                        <div class="content_overlay"></div>
                        <div class="content_inner">
                            <div class="row contentscroll">
                                <div class="container">
                                    <div class="col-md-6 empty">&nbsp;</div>
                                    <div class="col-md-6 content_text">
                                        <h1>Contact Us</h1>
                                        <p>We can contact you by filling out the form below, Please note that contacts are only confirmed once we check availability.</p>
                                        <div class="clearfix pad_top20">
                                            <h2 class="clearfix address">
                                                <span class="left"><i class="fa fa-map-marker"></i>&nbsp;&nbsp;</span>
                                                <span class="left"> #12 Fifth main street, NY 10307, USA</span>					</h2>
                                            <div class="phone"><i class="fa fa-phone"></i>&nbsp;&nbsp;+ 1 123 456 7890</div>
                                            <a href="mailto:info@thespicelounge.com" class="mail-text">
                                                <i class="fa fa-envelope"></i>info@thespicelounge.com				</a>
                                            <div class="clearfix">
                                                <div class="header_icons accura-header-block accura-hidden-2xs social_top">
                                                    <ul class="accura-social-icons accura-stacked accura-jump accura-full-height accura-bordered accura-small accura-colored-bg clearFix">
                                                        <li><a href="http://www.facebook.com" target="_blank" class="accura-social-icon-facebook circle"><i class="fa fa-facebook"></i></a></li>
                                                        <li><a href="http://www.twitter.com" target="_blank" class="accura-social-icon-twitter circle"><i class="fa fa-twitter"></i></a></li>
                                                        <li><a href="http://www.googleplus.com" target="_blank" class="accura-social-icon-gplus circle"><i class="fa fa-google-plus"></i></a></li>
                                                        <li><a href="https://www.pinterest.com/login/" target="_blank" class="accura-social-icon-pinterest circle"><i class="fa fa-pinterest"></i></a></li>
                                                        <li><a href="https://www.linkedin.com/uas/login" target="_blank" class="accura-social-icon-linkedin circle"><i class="fa fa-linkedin"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="pad_top30"><a class="button nav-link" href="#contactform">Enquiry Form</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Contact 
                =============================-->




                <!-- Contact Form
                =============================-->

                <div id="contactform" class="item">
                    <img src="assets/img/map.jpg"  alt="the Paxton Gipsy Hill"  class="fullBg">
                    <div class="content">

                        <div class="content_overlay"></div>
                        <div class="content_inner" >
                            <div class="row contentscroll">
                                <div class="container col-md-12">
                                    <div class="col-md-6 empty">&nbsp;</div>

                                    <div class="col-md-6 content_text">
                                        <div id="contactforms">
                                            <h1>Contact Form</h1>
                                            <form id="contact_form" class="cont_form pad_top13" action="#" method="post">
                                                <p>You can make a reservation by filling out the form below, Please note that reservations are only confirmed once we check availability.</p>


                                                <div class="clearfix cont_form pad_top20"> 
                                                    <input type="text" name="name" class="validate['required'] textbox1" placeholder="* Name : "
                                                           onfocus="this.placeholder = ''" onBlur="this.placeholder = '* Name :'" />
                                                    <input type="text" name="email"  class="validate['required','email']  textbox1"
                                                           placeholder="* Email : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Email :'" />
                                                    <input type="text" name="phone" class="validate['required','phone']  textbox1"
                                                           placeholder="* Phone : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Phone :'" />
                                                    <textarea name="message" class="validate['required'] messagebox1"
                                                              placeholder="* Message : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Message :'"></textarea>
                                                    <input id="contactsubmitBtn1" value="send message" name="Confirm" type="submit" class="submitBtn">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- // Contact Form
                =============================-->




                <!-- Footer
                =============================-->
                <div id="footer" class="footer">
                    <div class="copyright">Copyrights &copy; Express 2 Help 2015. &nbsp;|&nbsp;    <a href="#" class="foot">Privacy</a>  |  <a href="#" class="foot">Careers</a>  |  <a href="#" class="foot">Media</a>  |  <a href="#" class="foot">Awards</a></div>
                </div>
                <!-- // Footer Ends
                =============================-->




                <!--Special Menu 
                =============================-->
                <div id="specialmenu" class="toHideTheBubbles hidden-phone">
                    <div class="spcontainer">
                        <div id="spmenu1"> 	<button class="spmenu spmenu2" onClick="modalshow('#upcomingevent')"  data-toggle="modal" data-target="#lightbox" >
                                <span><i class="fa fa-calendar"></i></span>
                                <span class="sptext">Register / login</span>
                            </button></div>
                        <div id="spmenu2">   <button class="spmenu spmenu1"  onclick="modalshow('#video1')"  data-toggle="modal" data-target="#lightbox2">
                                <span><i class="fa fa-desktop"></i></span>
                                <span class="sptext"><span>All Your  </span>Needs</span>
                            </button> </div>
                    </div>
                </div>
                <!-- // Special Menu 
                =============================-->




                <!--Lightbox  for home page special promo pack
                =============================-->
                <div id="upcomingevent">
                    <div id="lightbox" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="upcomingevent" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button class="close" data-dismiss="modal"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/close.png" alt=" "></button>
                                <div class="modal-body">
                                    <div class="spimg">
                                        <img src="<?php echo $themeUrl; ?>/css/home/assets/img/event1.jpg" alt="..." class="img-responsive">				</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="todayspecial" >
                    <div id="lightbox3" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="todayspecial" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" ><img src="<?php echo $themeUrl; ?>/css/home/assets/img/close.png" alt=" "></button>
                                <div class="modal-body">
                                    <div class="content_overlay">
                                        <div class="content_text contentscroll">
                                            <h1 class="text-center">Today Special's <a href="sample.pdf" class="link"> <img src="<?php echo $themeUrl; ?>/css/home/assets/img/pdf-icon.png" title="PDF Menu to Print" alt="PDF Menu to Print"></a></h1><p>Your days specials labore et dolore magna aliquaenim amd  quis nostrud exercitation ullamco.</p> <br />
                                            <!-- div one created -->
                                            <div class="pad_top30">
                                                <div class="toggle-container">
                                                    <div class="toggle-header">
                                                        <div class="toggle-link toggle-open">Monday</div>
                                                    </div>
                                                    <div class="toggle-content">
                                                        <div class="pad_top20 clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>POT STICKERS (6)</h4>
                                                                <p>(fried dumplings filled with ground pork and vegetables)</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;20</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>SATAY</h4>
                                                                <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;35</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>CURRY PUFF</h4>
                                                                <p>Puff pastry stuffed with ground chicken, onion, potatoes and curry powder with cucumber salad.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--// .toggle-container end-->
                                            </div><!-- div one created ends here -->
                                            <div class="clearfix">
                                                <div class="toggle-container">
                                                    <div class="toggle-header">
                                                        <div class="toggle-link toggle-open">Tuesday</div>
                                                    </div>
                                                    <div class="toggle-content">
                                                        <div class="pad_top20 clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;22</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Spring Roll</h4>
                                                                <p>Crispy fried rolls stuffed with shrimp and glass noodles.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Pork Loin</h4>
                                                                <p>Roasted Pork, Swiss Chard, Ramps and Wheat Spaetzle.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--// .toggle-container end-->
                                            </div>

                                            <div class="clearfix">
                                                <div class="toggle-container">
                                                    <div class="toggle-header">
                                                        <div class="toggle-link toggle-open">Wednesday</div>
                                                    </div>
                                                    <div class="toggle-content">
                                                        <div class="pad_top20 clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;14</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Devil's Food Cake</h4>
                                                                <p>Chocolate, Black Cardamom, Banana Ice Cream.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;20</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>SATAY</h4>
                                                                <p>Choice of chicken or beef marinated in thai herbs served with peanut sauce and cucumber salad.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;25</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Vegetable Frittata</h4>
                                                                <p>Asparagus, fresh thyme, baked in a cast iron skillet.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!--// .toggle-container end-->
                                            </div>
                                            <div class="clearfix">
                                                <div class="toggle-container">
                                                    <div class="toggle-header">
                                                        <div class="toggle-link toggle-open">Thursday</div>
                                                    </div>
                                                    <div class="toggle-content">
                                                        <div class="pad_top20 clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;12</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Almond Cake</h4>
                                                                <p>Rhubarb, Mascarpone Cream and Brown Sugar Ice Cream.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;16</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Potato Salad</h4>
                                                                <p>Black Bass, Fennel, Olives and Fingerling Potatoes.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix">

                                                <div class="toggle-container">
                                                    <div class="toggle-header">
                                                        <div class="toggle-link toggle-open">Friday</div>
                                                    </div>
                                                    <div class="toggle-content">
                                                        <div class="pad_top20 clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;30</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Egg Sandwich</h4>
                                                                <p>Scrambled eggs, on our whole wheat, with carrot hash browns.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;26</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Mushroom Broth</h4>
                                                                <p>Spring Onion & Smoked Egg, Kohlrabi and Emmer Noodles.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix">
                                                <div class="toggle-container">
                                                    <div class="toggle-header">
                                                        <div class="toggle-link toggle-open">Saturday &amp; Sunday</div>
                                                    </div>
                                                    <div class="toggle-content">
                                                        <div class="pad_top20 clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;35</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Egg with Chees</h4>
                                                                <p>Kale & Ancient Grains Salad, Dates, Sbrinz Cheese. </p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;18</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Pork Loin</h4>
                                                                <p>Roasted Pork, Swiss Chard, Ramps and Wheat Spaetzle.</p>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix">
                                                            <div class="specials-round"><h4>$&nbsp;25</h4></div>
                                                            <div class="specials-content" >
                                                                <h4>Vegetable Frittata</h4>
                                                                <p>Puff pastry stuffed with ground chicken, onion, potatoes and curry powder with cucumber salad.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div><!-- last div ends here -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>	
                </div>


                <div id="video1" >
                    <div id="lightbox2" class="modal fade in" tabindex="-1" role="dialog" aria-labelledby="video1" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <button type="button" class="close" data-dismiss="modal" ><img src="<?php echo $themeUrl; ?>/css/home/assets/img/close.png" alt=" "></button>
                                <div class="modal-body">
                                    <div class="video_containers">
                                        <iframe src="http://player.vimeo.com/video/19544059?title=0&amp;byline=0&amp;portrait=0&amp;color=ffffff" width="500" height="281" ></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- // Lightbox  for home page special promo pack-->
            </div>
        