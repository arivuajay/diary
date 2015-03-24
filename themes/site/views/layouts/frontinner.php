<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html>
    <?php $this->beginContent('//layouts/head'); ?>
    <?php
    $baseUrl = Yii::app()->baseUrl;
    $themeUrl = Yii::app()->theme->baseUrl;
    ?>
    <body class="forms-page">
        <!-- Start: Header -->
        <header class="navbar navbar-fixed-top">
            <div class="navbar-branding">
                <span id="toggle_sidemenu_l" class="glyphicons glyphicons-show_lines"></span>
                <a class="navbar-brand" href="<?php echo SITEURL; ?>">
                    <img src="<?php echo $themeUrl; ?>/css/frontend/img/logos/header-logo.png">
                </a>
                <span id="logo_below_text">Your Own Personal Diary / Journal</span>
            </div>
            <div class="navbar-left frontinner-left">
                <div class="navbar-divider"></div>
                <?php
                echo $this->renderPartial(
                        '//layouts/_bannerblock', array(
                    'layout' => 'user_inner',
                    'position' => 'top',
                    'dimension' => '468*60'
                        )
                );
                ?>
            </div>
            <div class="navbar-right">
                <?php if (!(Yii::app()->user->isGuest)): ?>
                    <div class="navbar-search" style="border: none;">
                        <?php
                        $form = $this->beginWidget('CActiveForm', array(
                            'action' => $baseUrl . '/site/journal/search',
                            'method' => 'get',
                        ));
                        ?>

                                    <!--<form method="get" id="searchform" action="<?php echo $baseUrl; ?>/site/journal/search">-->
                        <input type="text" name="search" id="HeaderSearch" value="<?php echo isset($_GET['search']) ? $_GET['search'] : '' ?>"  placeholder="Search..." >
                        <!--</form>-->
                   
                    </div>
                 <div class="navbar-search" style="border: none;">
                      <select name="using" onchange="this.form.submit()">
                            <option value="">Search using</option>
                            <option value="title" <?php  if($_GET['using'] == 'title') {echo 'selected';} ?>>Title</option>
                            <option value="category" <?php  if($_GET['using'] == 'category') {echo 'selected';} ?>>Category</option>
                            <option value="date" <?php  if($_GET['using'] == 'date') {echo 'selected';} ?>>Date</option>
                        </select> 
                 </div>
                <?php $this->endWidget(); ?>
                <?php endif; ?>
                <?php
                $Criteria = new CDbCriteria();
                $Criteria->order = 'notification_id DESC';
                $notifications = Notification::model()->findAll($Criteria);
                $notification_count = count($notifications);

                $log_count = 0;
                if (!Yii::app()->user->isGuest) {
                    $log_count = NotificationLog::model()->countByAttributes(
                            array(
                                'log_user_id' => Yii::app()->user->id
                    ));
                }
                $not_count = $notification_count - $log_count;
                ?>
                <div class="navbar-menus">
                    <div class="btn-group" id="alert_menu">
                        <button type="button" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="glyphicons glyphicons-bell"></span>
                            <?php if ($not_count > 0) { ?>
                                <b><?php echo $notification_count - $log_count ?></b> 
                            <?php } ?>
                        </button>
                        <ul class="dropdown-menu media-list" role="menu">
                            <li class="dropdown-header">Recent Messages</li>
                            <li class="p15 pb10">
                                <ul class="list-unstyled">
                                    <?php
                                    foreach ($notifications as $notification):
                                        $count = 0;
                                        if (!Yii::app()->user->isGuest) {
                                            $count = NotificationLog::model()->countByAttributes(
                                                    array(
                                                        'log_user_id' => Yii::app()->user->id,
                                                        'log_notification_id' => $notification->notification_id
                                            ));
                                        }

                                        echo $count == 0 ? '<b>' : '';

                                        $bell_color = $count == 0 ? 'text-purple2' : 'text-orange2';
                                        echo CHtml::link('<li><span class="glyphicons glyphicons-bell '.$bell_color.' fs16 mr15"></span> '.$notification->notification_title.'</li>', 
                                                array('/site/notification/view/', 'id' => $notification->notification_id), 
                                                array('id' => 'tooltip1', 'style' => 'text-decoration:none'));

                                        echo $count == 0 ? '</b>' : '';
                                    endforeach;
                                    ?>                                   
 <!--<li class="pt10"><span class="glyphicons glyphicons-facebook text-blue2 fs16 mr15"></span></b></li>-->
<!--                                    <li class="pt10"><span class="glyphicons glyphicons-paperclip text-teal2 fs16 mr15"></span></li>
                                    <li class="pt10"><span class="glyphicons glyphicons-gift text-purple2 fs16 mr15"></span></li>
                                    <li class="pt10"><span class="glyphicons glyphicons-cup text-red2 fs16 mr15"></span></b></li>-->
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
                            <?php
                            $user_details = Users::model()->findByPk(Yii::app()->user->id);
                            if (!empty($user_details->user_prof_image)) {
                                $prof_image = CHtml::image($this->createUrl("/themes/site/image/prof_img/" . $user_details->user_prof_image), 'alt', array('class' => 'br64'));
                            } else {
                                $prof_image = CHtml::image($this->createUrl("/themes/site/css/frontend/img/avatars/5.jpg"), 'alt', array('class' => 'br64'));
                            }
                            ?>

                            <div class="media-object border border-purple br64 bw2 p2">
                                <!--<img class="br64" src="<?php echo $themeUrl; ?>/css/frontend/img/avatars/5.jpg" alt="...">-->
                                <?php echo $prof_image; ?>
                            </div>
                        </a>
                        <div class="mobile-link"> <span class="glyphicons glyphicons-show_big_thumbnails"></span> </div>
                        <div class="media-body">
                            <h5 class="media-heading mt5 mbn fw700 cursor"><?php
                                if (Yii::app()->user->isGuest) {
                                    echo 'Welcome Guest';
                                } else {
                                    echo Yii::app()->user->user_name;
                                }
                                ?></h5>
                            <div class="media-links fs11">
                                <?php echo CHtml::link('Profile', array('/site/users/myprofile')); ?>
                                <i class="fa fa-circle text-muted fs3 p8 va-m"></i>
                                <?php if (Yii::app()->user->isGuest): ?>
                                    <a href="<?php echo $baseUrl; ?>/site/users/login">Sign In</a>
                                <?php else: ?>
                                    <a href="<?php echo $baseUrl; ?>/site/users/logout">Sign Out</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-divider"></div>
                <div class="user-menu  usermenu-open" style="display: block;">
                    <div class="row text-center mb15">
                        <div class="col-xs-4">
                            <?php
                            echo CHtml::link('<span class="glyphicons glyphicons-home fs22 text-blue2"></span><h5 class="fs11">Manage Journal</h5>', array('/site/journal/dashboard'));
                            ?>
                        </div>
                        <div class="col-xs-4">
                            <?php echo CHtml::link('<span class="glyphicons glyphicons-inbox fs22 text-orange2"></span><h5 class="fs11">Write a journal</h5>', array('/site/journal/create')); ?>
                        </div>
                        <div class="col-xs-4"> 
                            <?php echo CHtml::link('<span class="glyphicons glyphicons-bell fs22 text-purple2"></span><h5 class="fs11">Mood report</h5>', array('/site/default/underdevelopment')); ?>
                        </div>
                    </div>
                </div>
                <?php echo $this->renderPartial('//layouts/_sidebarNav'); ?>
            </aside>
            <!-- End: Sidebar -->
            <section id="content_wrapper">
                <?php if (isset($this->flashMessages) && !empty($this->flashMessages)): ?>
                    <div style="padding: 10px;">
                        <?php foreach ($this->flashMessages as $key => $message) { ?>
                            <div class="alert alert-<?php echo $key; ?> fade in" style="margin-bottom: 0px;">
                                <button type="button" class="close close-sm" data-dismiss="alert">
                                    <i class="fa fa-times"></i>
                                </button>
                                <?php echo $message; ?>
                            </div>
                        <?php } ?>
                    </div>
                <?php endif ?>
                <!-- Start: Content -->
                <?php echo $content; ?>
                <!-- End: Content -->
            </section>

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
                        <div class="col-xs-4 pln"> <a href="#"> <span class="glyphicons glyphicons-imac fs22 text-grey2"></span>
                                <h5 class="fs11 text-white">Calendar</h5>
                            </a> </div>
                        <div class="col-xs-4"> <a href="#"> <span class="glyphicons glyphicons-settings fs22 text-green"></span>
                                <h5 class="fs11 text-white">Settings</h5>
                            </a> </div>
                        <div class="col-xs-4 prn"> <a href="#"> <span class="glyphicons glyphicons-inbox fs22 text-orange"></span>
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
        <?php
        $this->widget('ext.scrolltop.ScrollTop', array(
            //Default values
            'fadeTransitionStart' => 10,
            'fadeTransitionEnd' => 200,
            'speed' => 'slow'
        ));
        ?>
        <!-- End: Main -->
    </body>
</html>
<?php $this->endContent(); ?>