<div id="sidebar" class="nav-collapse">
    <div class="leftside-navigation">
        <?php
        $this->widget('zii.widgets.CMenu', array(
            'activateParents' => true,
            'encodeLabel' => false,
            'items' => array(
                array('label' => '<i class="fa fa-dashboard"></i><span>Dashboard</span>', 'url' => array('/admin/default/index')),
                array('label' => '<i class="fa fa-laptop"></i><span>User management</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Users', 'url' => array('/admin/users/index')),
//                        array('label' => 'Add User', 'url' => '#')
                    ),
                ),
                array('label' => '<i class="fa fa-book"></i><span>CMS</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Pages', 'url' => array('/admin/cms/index')),
//                        array('label' => 'Add Page', 'url' => array('/admin/cms/createpage')),
                    ),
                ),
                array('label' => '<i class="fa fa-book"></i><span>Faqs</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Manage Faqs', 'url' => array('/admin/faq/index')),
                        array('label' => 'Add Faq', 'url' => array('/admin/faq/createfaq')),
                    ),
                ),
                array('label' => '<i class="fa fa-tasks"></i><span>Category management</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Manage Category', 'url' => array('/admin/category/index')),
                        array('label' => 'Add Category', 'url' => array('/admin/category/create')),
                    ),
                ),
                array('label' => '<i class="fa fa-glass"></i><span>Mood type management</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Manage Mood type', 'url' => array('/admin/moodtype/index')),
//                        array('label' => 'Add Mood type', 'url' => array('/admin/moodtype/create')),
                    ),
                ),
                array('label' => '<i class="fa fa-th"></i><span>Banner Layouts</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Manage Banner Layout', 'url' => array('/admin/bannerlayout/index')),
//                        array('label' => 'Add Banner Layout', 'url' => array('/admin/bannerlayout/create')),
                    ),
                ),
                array('label' => '<i class="fa fa-picture-o"></i><span>Banner Management</span>', 'url' => '#', 'itemOptions' => array('class' => 'sub-menu'),                   
                    'submenuOptions' => array('class' => 'sub'),
                    'items' => array(
                        array('label' => 'Manage Banner', 'url' => array('/admin/banner/index')),
                        array('label' => 'Add Banner', 'url' => array('/admin/banner/create')),
                    ),
                ),
            ),
            'htmlOptions' => array('class' => 'sidebar-menu', "id" => "nav-accordion")
        ));
        ?>
        <!--        <ul class="sidebar-menu" id="nav-accordion">
                    <li>
                        <a class="active" href="index.html">
                            <i class="fa fa-dashboard"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-laptop"></i>
                            <span>Layouts</span>
                        </a>
                        <ul class="sub">
                            <li><a href="boxed_page.html">Boxed Page</a></li>
                            <li><a href="horizontal_menu.html">Horizontal Menu</a></li>
                            <li><a href="language_switch.html">Language Switch Bar</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-book"></i>
                            <span>UI Elements</span>
                        </a>
                        <ul class="sub">
                            <li><a href="general.html">General</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="widget.html">Widget</a></li>
                            <li><a href="slider.html">Slider</a></li>
                            <li><a href="tree_view.html">Tree View</a></li>
                            <li><a href="nestable.html">Nestable</a></li>
                            <li><a href="grids.html">Grids</a></li>
                            <li><a href="calendar.html">Calender</a></li>
                            <li><a href="draggable_portlet.html">Draggable Portlet</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="fontawesome.html">
                            <i class="fa fa-bullhorn"></i>
                            <span>Fontawesome </span>
                        </a>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-th"></i>
                            <span>Data Tables</span>
                        </a>
                        <ul class="sub">
                            <li><a href="basic_table.html">Basic Table</a></li>
                            <li><a href="responsive_table.html">Responsive Table</a></li>
                            <li><a href="dynamic_table.html">Dynamic Table</a></li>
                            <li><a href="editable_table.html">Editable Table</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-tasks"></i>
                            <span>Form Components</span>
                        </a>
                        <ul class="sub">
                            <li><a href="form_component.html">Form Elements</a></li>
                            <li><a href="advanced_form.html">Advanced Components</a></li>
                            <li><a href="form_wizard.html">Form Wizard</a></li>
                            <li><a href="form_validation.html">Form Validation</a></li>
                            <li><a href="file_upload.html">Muliple File Upload</a></li>
        
                            <li><a href="dropzone.html">Dropzone</a></li>
                            <li><a href="inline_editor.html">Inline Editor</a></li>
        
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-envelope"></i>
                            <span>Mail </span>
                        </a>
                        <ul class="sub">
                            <li><a href="mail.html">Inbox</a></li>
                            <li><a href="mail_compose.html">Compose Mail</a></li>
                            <li><a href="mail_view.html">View Mail</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>Charts</span>
                        </a>
                        <ul class="sub">
                            <li><a href="morris.html">Morris</a></li>
                            <li><a href="chartjs.html">Chartjs</a></li>
                            <li><a href="flot_chart.html">Flot Charts</a></li>
                            <li><a href="c3_chart.html">C3 Chart</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class=" fa fa-bar-chart-o"></i>
                            <span>Maps</span>
                        </a>
                        <ul class="sub">
                            <li><a href="google_map.html">Google Map</a></li>
                            <li><a href="vector_map.html">Vector Map</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                            <i class="fa fa-glass"></i>
                            <span>Extra</span>
                        </a>
                        <ul class="sub">
                            <li><a href="blank.html">Blank Page</a></li>
                            <li><a href="lock_screen.html">Lock Screen</a></li>
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="invoice.html">Invoice</a></li>
                            <li><a href="pricing_table.html">Pricing Table</a></li>
                            <li><a href="timeline.html">Timeline</a></li>                    
                            <li><a href="gallery.html">Media Gallery</a></li><li><a href="404.html">404 Error</a></li>
                            <li><a href="500.html">500 Error</a></li>
                            <li><a href="registration.html">Registration</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="login.html">
                            <i class="fa fa-user"></i>
                            <span>Login Page</span>
                        </a>
                    </li>
                </ul>-->
    </div>
</div>