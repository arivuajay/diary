<!--Home Page=============================-->
<?php
$baseUrl = Yii::app()->baseUrl;
$themeUrl = Yii::app()->theme->baseUrl;
?>
<div id="header" class="header">
<div class="menu-inner">
<div class="container"><div class="row">
				<div class="header-table col-md-12 header-menu">
        			<!--  Logo section -->
                                <div class="brand"><a href="#home"  class="nav-link"><?php echo Yii::app()->name;?></a></div>
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


<div id="home" class="item">
    <img src="<?php echo $themeUrl; ?>/css/home/assets/img/2.jpg" alt="The Spice Lounge" class="fullBg">
    <div class="clearfix">
        <div class="header_details">
            <div style="color:#A4C3DC;font-size: 20px;">BETA</div>
                        <div class="container">
                            <div class="header_icons accura-header-block accura-hidden-2xs">
                                <a href="<?php echo SITEURL; ?>"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/logo-png.png" border="0"></a>
                                <div class="your-own">YOUR OWN PERSONAL DIARY/JOURNAL</div>
                            </div>
                            <div class="call">
            <?php echo CHtml::link(CHtml::image("$themeUrl/css/home/assets/img/google_play_button.png", 'PlayStore', array("border" => "0")), 'https://play.google.com/store/apps/details?id=com.express.splash&hl=en', array('target' => '_blank')) ?>
                            </div>
                        </div>
            <div class="container">
                <?php
                foreach ($this->flashMessages as $key => $message) {
                    echo '<div class="alert flash-' . $key . '">' . $message . "</div>\n";
                }

                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'hcontact_form',
                    'enableAjaxValidation' => true,
                    'clientOptions' => array(
                        'validateOnSubmit' => true,
                    ),
                    'method' => 'POST',
                    'htmlOptions' => array('role' => 'form')
                ));
                $moodTypes = CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_type');
                ?>
                <div class="clearfix hcont_form pad_top40">
                    <div class="row">
                        <?php
                        echo $form->emailField($model, 'email', array('class' => 'textbox1', 'placeholder' => $model->getAttributeLabel('email')));
                        echo $form->error($model, 'email');
                        ?>
                    </div>

                    <div class="row hmoodlist">
                        <p class="mood_label"><?php echo $model->getAttributeLabel('moodtype') ?></p>
                        <?php
                        $i = 0;
                        foreach ($moodTypes as $key => $mood):
                            ?>
                            <label class="radio-inline mr10 <?php if ($i == 0) echo "selected"; ?> ">
                                <input type="radio" name="QuickCreate[moodtype]" class="mood_type_id" <?php if ($i == 0) echo "checked='checked'"; ?>  value="<?php echo $key; ?>">
                                <?php echo CHtml::image("$themeUrl/css/frontend/img/mood_$key.png", $mood, array('class' => 'mood_type_smiley')); ?>
                            </label>
                            <?php
                            $i++;
                        endforeach;
                        ?>
                    </div>
                    <div class="row">
                        <?php echo CHtml::submitButton('Write an Entry', array('class' => 'submitBtn', 'id' => 'hcontactsubmitBtn1')); ?>
                    </div>
                </div>
                <?php $this->endWidget(); ?>
            </div>
            <!-- Mainheader Menu Section -->
            <div class="mainheaderslide" id="slide">
                <div id="mainheader" class="header">
                    <div class="menu-inner">
                        <div class="container">
                            <div class="row">
                                <div class="header-table col-md-12 header-menu">
                                    <nav class="main-nav">
                                        <ul id="label-nav" class="nav">
<!--                                            <li class="selected"><a href="#" class="nav-link side-text">Your own personal diary / journal</a></li>-->
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
                                                array('label' => 'About Us', 'url' => Myclass::getPageUrl(1), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'FAQ', 'url' => array('/site/faq'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Your Personal Diary', 'url' => array('/site/users/login'), 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Testimonial', 'url' => '#', 'linkOptions'=>array('onclick'=>'underDevelopment()')),
                                                array('label' => 'Contact', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Feedback', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Connect with life style counselor / Psychologist', 'url' => '#','linkOptions'=>array('onclick'=>'underDevelopment()')),
                                                //array('label' => 'Connect with IMAGE  Consultant', 'url' => '#', 'linkOptions' => array('class' => 'nav-link')),
                                                array('label' => 'Login / Register', 'url' => array('/site/users/login'), 'linkOptions' => array('class' => 'nav-link', 'visible' => Yii::app()->user->isGuest)),
//                                                array('label' => 'Register', 'url' => array('/site/users/register'), 'linkOptions' => array('class' => 'nav-link','visible'=>Yii::app()->user->isGuest)),
                                                array('label' => 'All your needs', 'url' => '#', 'linkOptions'=>array('onclick'=>'underDevelopment()')),
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
    <div class="copyright">Copyrights &copy; Express 2 Help <?php echo date('Y'); ?>. &nbsp;|&nbsp;
        <?php echo CHtml::link('Privacy', Myclass::getPageUrl(2), array('class' => 'foot')); ?> |
        <!--<?php echo CHtml::link('Careers', array('/site/carriers'), array('class' => 'foot')); ?> |-->
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
<script type="text/javascript">
    $(function() {
        $('.mood_type_smiley').on('click', function() {
            $('.hmoodlist label').removeClass('selected');
            $('.mood_type_id').removeAttr('checked', 'checked');
            $(this).closest('label').addClass('selected');
            $(this).prev('input[type="radio"]').attr('checked', 'checked');
        });
    })
</script>
<script>
function underDevelopment() {
    alert("Under Development");
}
</script>