<!--Home Page=============================-->
<?php
$baseUrl = Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;
?>
<div id="home" class="item">
    <img src="<?php echo $themeUrl; ?>/css/home/assets/img/2.jpg" alt="The Spice Lounge" class="fullBg">
    <div class="clearfix">
        <div class="header_details">
            <div class="container">
                <div class="header_icons accura-header-block accura-hidden-2xs">
                    <a href="<?php echo SITEURL; ?>"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/logo-png.png" border="0"></a></div>
                <!--                <div class="call">
                                    <div class="home_address">
                                        NO.OF. USERS & <br>
                                    </div>
                                    VISITORS</div>-->
            </div>
            <div class="container">
                <?php
                foreach ($this->flashMessages as $key => $message) {
                    echo '<div class="alert flash-' . $key . '">' . $message . "</div>\n";
                }
                ?>
                <!--<form id="hcontact_form" class="hcont_form pad_top13" action="" method="post">-->
                <?php
                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'hcontact_form',
                    'enableAjaxValidation' => false,
                    'method' => 'GET',
                    'action' => array('/site/entry/create'), // change depending on your project
                ));
                ?>
                <div class="clearfix hcont_form pad_top20">
                    <input type="email" name="email"  class="validate['required','email']  textbox1"
                           placeholder="* Email : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Email :'" required/><br>
                           <?php foreach (Myclass::getMood() as $key => $mood): ?>
                        <label class="radio-inline mr10>
                            <?php echo $form->radioButton($moodModel,'mood_type',array('value'=>$key,'uncheckValue'=>null)); ?>
                                <?php echo CHtml::image("themes/site/css/frontend/img/$mood.png"); ?>
                        </label>
                    <?php endforeach; ?>
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
                                            <li><a href="<?php echo SITEURL; ?>/site/cms/view/slug/about-us" onClick="javascript:location.href = '<?php echo $baseUrl; ?>/site/cms/view/slug/about-us'" class="">About Us</a></li>
                                            <li><a href="<?php echo SITEURL; ?>/site/faq" onClick="javascript:location.href = '<?php echo SITEURL; ?>/site/faq'" >Faq</a></li>
                                            <!--         <li>
                                            <?php
                                            echo CHtml::link('Faq', array('/site/faq/'));
                                            ?>
                                                    </li>-->
                                            <li><a href="#" class="nav-link">Your Personal Diary<span class="sub-toggle"></span></a>
                                                <ul>
                                                    <li><a href="#" class="nav-link">Why you need Diary</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#" onClick="javascript:location.href = '<?php echo $baseUrl; ?>/site/cms/view/slug/privacy'" class="">Privacy</a></li>
                                            <li><a href="#" class="nav-link">Contact Us</a></li>
                                            <li><a href="#" class="nav-link">Feedback</a></li>
                                            <li><a href="<?php echo SITEURL; ?>/site/carriers" onClick="javascript:location.href = '<?php echo $baseUrl; ?>/site/carriers'" class="nav-link">Careers</a></li>
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
        <div id="spmenu1">
            <?php
            echo CHtml::link(' <span><i class="fa fa-calendar"></i></span><span class="sptext">Register / login</span>', array('/site/users/login'), array('class' => 'spmenu spmenu2'));
            ?>
        </div>
        <div id="spmenu2">
            <button class="spmenu spmenu1"  onclick="modalshow('#video1')"  data-toggle="modal" data-target="#lightbox2">
                <span><i class="fa fa-desktop"></i></span>
                <span class="sptext"><span>All Your  </span>Needs</span>
            </button>
        </div>
    </div>
</div>
<!-- // Special Menu
=============================-->
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
