<div class="sidebar-menu">
    <?php
    $test = array('/site/cms/view','slug'=>'about-us');
    $this->widget('zii.widgets.CMenu', array(
        'activateParents' => true,
        'items' => array(
            array('label' => '<span class="glyphicons glyphicons-book"></span><span class="sidebar-title">About</span><span class="caret"></span>', 'url' => Myclass::getPageUrl(1),
                'linkOptions' => array('class' => 'accordion-toggle'),
                'items' => array(
                    array('label' => '<span class="glyphicons glyphicons glyphicons-user"></span> Profile', 'url' => '#'),
                    array('label' => '<span class="glyphicons glyphicons-picture"></span> Testimonials', 'url' => '#'),
                    array('label' => '<span class="glyphicons glyphicons-film"></span> Media', 'url' => '#'),
                    array('label' => '<span class="glyphicons glyphicons-print"></span> Awards', 'url' => '#'),
                ),
            ),
            array('label' => '<span class="glyphicons glyphicons-pencil"></span><span class="sidebar-title">Writing Tips</span>', 'url' => Myclass::getPageUrl(3)),
            array('label' => '<span class="glyphicons glyphicons-edit"></span><span class="sidebar-title">FAQ</span>', 'url' => array('/site/faq/')),
/*          array('label' => '<span class="glyphicons glyphicons-calendar"></span><span class="sidebar-title">Careers</span>', 'url' => array('/site/carriers/')),
          	array('label' => '<span class="glyphicons glyphicons-globe"></span><span class="sidebar-title">Contact us</span>', 'url' => '#'),
            array('label' => '<span class="glyphicons glyphicons-settings"></span><span class="sidebar-title">All your needs</span>', 'url' => '#'),
            array('label' => '<span class="glyphicons glyphicons-pencil"></span><span class="sidebar-title">Tell a Friend</span>', 'url' => '#'),
            array('label' => '<span class="glyphicons glyphicons-edit"></span><span class="sidebar-title">Feedback</span>', 'url' => '#'),
            array('label' => '<span class="glyphicons glyphicons-inbox"></span><span class="sidebar-title">About us</span>', 'url' => Myclass::getPageUrl(1)),
*/            array('label' => '<span class="glyphicons glyphicons-inbox"></span><span class="sidebar-title">Privacy</span>', 'url' => Myclass::getPageUrl(2)),
        ),
        'htmlOptions' => array('class' => 'nav sidebar-nav'),
        'submenuHtmlOptions' => array('class' => 'nav sub-nav'),
        'encodeLabel' => false,
    ));
    ?>

</div>