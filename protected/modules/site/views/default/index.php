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
                    <div class="row">
                        <input type="email" name="email"  class="validate['required','email']  textbox1" placeholder="* Email : " onFocus="this.placeholder = ''" onBlur="this.placeholder = '* Email :'" required/>
                    </div>
                    <div class="row">
                        <?php foreach (Myclass::getMood() as $id => $mood): ?>
                            <label class="radio-inline mr10">
                                <input type="radio" checked="checked" style="visibility: hidden;" name="Entry[temp_user_mood_id]" value="<?php echo $id; ?>">
                                <?php echo CHtml::image("themes/site/css/frontend/img/$mood.png"); ?>
                            </label>
                        <?php endforeach; ?>
                    </div>
                    <div class="row">
                        <input id="hcontactsubmitBtn1" value="Write an Entry" type="submit" class="submitBtn">
                    </div>
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
                                    <nav class="main-nav">
                                        <ul class="nav">
                                            <li class="selected"><a href="#" class="nav-link">Your own personal diary / journal</a></li>
                                        </ul>
                                    </nav>

                                    <!-- Home Page Menu section -->
                                    <nav class="main-nav">
                                        <a href="#" class="nav-toggle"></a>
                                        <?php
                                        $this->widget('zii.widgets.CMenu', array(
                                            'activeCssClass' => 'selected',
                                            'activateParents' => true,
                                            'items' => array(
                                                array('label' => 'Home', 'url' => array('/site/default/index'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'About', 'url' => array('/site/cms/view', 'slug' => 'about-us'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'FAQ', 'url' => array('/site/faq'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Your Personal Diary', 'url' => array('/site/default/login'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Testimonial', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Contact', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Feedback', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Login', 'url' => array('/site/default/login'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'All your needs', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                            ),
                                            'htmlOptions' => array('class' => 'nav', "id" => "sub-nav"),
                                            'encodeLabel' => false,
                                        ));
                                        ?>
                                    </nav>
                                    <!--  // Home Page Menu section -->
                                </div>
                                <div class="header-table col-md-12 pull-right">

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
    <div class="copyright">Copyrights &copy; Express 2 Help 2015. &nbsp;|&nbsp;
        <?php echo CHtml::link('Privacy', array('/site/cms/view', 'slug' => 'privacy'), array('class' => 'foot')); ?> |
        <?php echo CHtml::link('Careers', array('/site/carriers'), array('class' => 'foot')); ?> |
        <?php echo CHtml::link('Media', array(''), array('class' => 'foot')); ?> |
        <?php echo CHtml::link('Awards', array(''), array('class' => 'foot')); ?> |
    </div>
</div>
<!-- // Footer Ends
=============================-->
<!--Special Menu
=============================-->
<div id="specialmenu" class="toHideTheBubbles hidden-phone">
    <div class="spcontainer">
        <!--  Logo section -->
        <div class="brand pull-right">
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
    </div>
</div>
<!-- // Special Menu
=============================-->
<!-- // Lightbox  for home page special promo pack-->
</div>
