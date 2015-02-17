<?php
$this->widget('zii.widgets.CMenu', array(
    'activeCssClass' => 'selected',
    'activateParents' => true,
    'encodeLabel' => false,
    'items' => array(
        array('label' => 'Home', 'url' => array('/site/default/index'), 'linkOptions' => array('class' => 'nav-link')),
        array('label' => 'About Us', 'url' => Myclass::getPageUrl(1), 'linkOptions' => array('class' => 'nav-link')),
        array('label' => 'Your Personal Diary', 'url' => array('/site/users/login'), 'linkOptions' => array('class' => 'nav-link')),
        array('label' => 'Connect with<span class="sub-toggle"></span>', 'url' => array('/site/default/underdevelopment'), 'linkOptions' => array(/*'onclick' => 'underDevelopment()'*/),
             'submenuOptions' => array('class' => 'nav-link'),
                    'items' => array(
                        array('label' => 'LIFE STYLE COUNSELOR / PSYCHOLOGIST', 'url' => array('/site/default/underdevelopment'),'linkOptions' => array(/*'onclick' => 'underDevelopment()'*/)),
                        array('label' => 'IMAGE CONSULTANT', 'url' => array('/site/default/underdevelopment'),'linkOptions' => array(/*'onclick' => 'underDevelopment()'*/)),
                    ),
            ),
        array('label' => 'All your needs', 'url' => array('/site/default/underdevelopment'), 'linkOptions' => array(/*'onclick' => 'underDevelopment()'*/)),
        array('label' => 'Testimonial', 'url' => array('/site/default/underdevelopment'), 'linkOptions' => array(/*'onclick' => 'underDevelopment()'*/)),
       // array('label' => 'FAQ', 'url' => array('/site/faq'), 'linkOptions' => array('class' => 'nav-link')),
        array('label' => 'Feedback', 'url' =>array('/site/feedback/create'), 'linkOptions' => array('class' => 'nav-link')),
        array('label' => 'Contact', 'url' => array('/site/contact/create'), 'linkOptions' => array('class' => 'nav-link')),
        //array('label' => 'Connect with IMAGE  Consultant', 'url' => array('/site/default/underdevelopment'), 'linkOptions' => array('class' => 'nav-link')),
        array('label' => 'Login / Register', 'url' => array('/site/users/login'), 'linkOptions' => array('class' => 'nav-link', 'visible' => Yii::app()->user->isGuest)),
//                                                array('label' => 'Register', 'url' => array('/site/users/register'), 'linkOptions' => array('class' => 'nav-link','visible'=>Yii::app()->user->isGuest)),
    ),
    'htmlOptions' => array('class' => 'nav', "id" => "sub-nav"),
    'encodeLabel' => false,
));
?>