<header class="header fixed-top clearfix">
    <!--logo start-->
    <div class="brand">

        <a href="<?php echo Yii::app()->createAbsoluteUrl('/admin/default/index')?>" class="logo">
            <?php echo Yii::app()->name; ?>
        </a>
        <div class="sidebar-toggle-box">
            <div class="fa fa-bars"></div>
        </div>
    </div>
    <!--logo end-->

    <div class="top-nav clearfix">
        <ul class="nav pull-right top-menu">
            <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                    <span class="username">Administrator</span>
                    <b class="caret"></b>
                </a>
                <ul class="dropdown-menu extended logout">
                    <li><a href="<?php echo $this->createUrl('/admin/default/profile'); ?>"><i class=" fa fa-suitcase"></i>Profile</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/default/changepassword'); ?>"><i class="fa fa-cog"></i> Change Password</a></li>
                    <li><a href="<?php echo $this->createUrl('/admin/default/logout'); ?>"><i class="fa fa-key"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
        <!--search & user info end-->
    </div>
</header>