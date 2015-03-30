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
                    <div class="brand"><a href="#home"  class="nav-link"><?php echo Yii::app()->name; ?></a></div>
                    <!--  // Logo section -->

                    <nav class="main-nav">
                        <a href="#" class="nav-toggle"></a>
                        <!-- Main Page Menu section -->
                        <?php $this->renderPartial('_menu'); ?>
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
            <div style="color:#A4C3DC;font-size: 20px;margin-top:-26px">BETA</div>
            <div class="container">
                <div class="header_icons accura-header-block accura-hidden-2xs">
                    <a href="<?php echo SITEURL; ?>"><img src="<?php echo $themeUrl; ?>/css/home/assets/img/logo-png.png" border="0"></a>
                    <div class="your-own">YOUR OWN PERSONAL DIARY / JOURNAL</div>
                </div>
                <div class="call">
                    <?php echo CHtml::link(CHtml::image("$themeUrl/css/home/assets/img/google_play_button.png", 'PlayStore', array("border" => "0")), 'https://play.google.com/store/apps/details?id=com.express.splash&hl=en', array('target' => '_blank')) ?>
                </div>
            </div>

            <div class="container">

                <?php
                foreach ($this->flashMessages as $key => $message) {
                    echo '<div class="flash-' . $key . '">' . $message . "</div>\n";
                }

                $form = $this->beginWidget('CActiveForm', array(
                    'id' => 'signup',
                    'enableAjaxValidation' => true,
                    'clientOptions' => array(
                    'validateOnSubmit' => true,
                    ),
                    'method' => 'POST',
                    'htmlOptions' => array('role' => 'form','novalidate'=>true)
                ));
                $moodTypes = CHtml::listData(MoodType::model()->findAll(), 'mood_id', 'mood_image');
                ?>
<!--<input type="email" placeholder="Type Your Mailid" required="">-->
                <?php
                echo $form->emailField($model, 'email', array('placeholder' => 'Type Your Mailid','required'=>true));
                echo $form->error($model, 'email');
                ?>
                <br>
                <?php echo $model->getAttributeLabel('moodtype') ?>
                <br>
                <?php
                $i = 0;
                foreach ($moodTypes as $key => $mood):
                    ?>
                <label for="<?php echo "smiley_lbl_$i"?>" style="position: relative; cursor: pointer;">
                    <?php echo CHtml::image("$themeUrl/image/mood_type/$mood", $mood, array("width"=>"35", "height"=>"34","for"=>"smiley_lbl_$i",'class'=> ($i == 0) ? "selected" : '')); ?>
                <input class="mood_radio signup" id="<?php echo "smiley_lbl_$i"?>" type="radio" name="QuickCreate[moodtype]" <?php if ($i == 0) echo "checked='checked'"; ?>  value="<?php echo $key; ?>">
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <?php
                    $i++;
                endforeach;
                ?>
<!--                <img src="assets/img/smiley-img.png" width="35" height="34"> <input type="radio" name="group2" value="Water">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="assets/img/smiley-img1.png" width="35" height="34"> <input type="radio" class="signup" name="group2" value="Water">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<img src="assets/img/smiley-img2.png" width="35" height="34"> <input type="radio" class="signup" name="group2" value="Water">-->
                <br>
                <?php echo CHtml::htmlButton('WRITE AN ENTRY', array('class' => 'submitBtn','type'=>'submit', 'name' => 'submit', 'id' => 'hcontactsubmitBtn1')); ?>&nbsp;&nbsp;
                <?php echo CHtml::htmlButton('Submit', array('class' => 'submitBtn','type'=>'submit', 'name' => 'submit','value'=>'Submit', 'id' => 'hcontactsubmitBtn1')); ?>
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
                                        <?php $this->renderPartial('_menu'); ?>
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
            <?php
            $banners = Myclass::getBannerImages('home', 'top', '1170*660');
            if (!empty($banners)) {
                foreach ($banners as $key => $banner) {
                    ?>
                    <div class="panel">
                        <?php
                        echo CHtml::image(
                                $this->createUrl("/themes/site/image/banners/" . $banner->banner_path . $banner->banner_image), $banner->banner_title
                        );
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
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
                    <li id="1"><a href="#" target="_blank" class="accura-social-icon-facebook circle"><i class="fa fa-facebook"></i></a></li>
                    <li id="2"><a href="#" target="_blank" class="accura-social-icon-twitter circle"><i class="fa fa-twitter"></i></a></li>
                    <li id="3"><a href="#" target="_blank" class="accura-social-icon-gplus circle"><i class="fa fa-google-plus"></i></a></li>
                    <li id="4"><a href="#" target="_blank" class="accura-social-icon-pinterest circle"><i class="fa fa-pinterest"></i></a></li>
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
    $(function () {
        $('.mood_radio').on('click', function () {
            $('#signup img').removeClass('selected');
            $('.mood_radio').removeAttr('checked', 'checked');
            $(this).prev('img').addClass('selected');
            $(this).attr('checked', 'checked');
        });
        
        $('.mood_type_smiley').on('click', function () {
            $('.hmoodlist label').removeClass('selected');
            $('.mood_type_id').removeAttr('checked', 'checked');
            $(this).closest('label').addClass('selected');
            $(this).prev('input[type="radio"]').attr('checked', 'checked');
        });
    })

    function underDevelopment() {
        alert("Under Development");
    }
</script>