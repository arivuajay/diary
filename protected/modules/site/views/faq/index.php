<?php
/* @var $this FaqController */
/* @var $dataProvider CActiveDataProvider */



        $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl;
        ?>


<section id="content_wrapper">
    <div id="topbar">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active"><a href="<?php echo $baseUrl;?>/site/faq">FAQ</a></li>
                <li class="crumb-link"><a href="<?php echo $baseUrl;?>">Home</a></li>
                <li class="crumb-trail">FAQ</li>
            </ol>
        </div>
    </div>
    <div id="content">
        <div class="row">
            <div class="col-md-10 center-column">
                <div class="panel faq-panel mt50">
                    <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon"><img src="<?php echo $themeUrl; ?>/css/frontend/img/faq-img.png" width="17" height="17"></span> Faq </span> </div>
                    <div class="panel-body pn">
                        <div class="row table-layout">                
                            <div class="col-abt col-xs-12 va-m p60">                  
                                <div class="panel-group accordion mta25" id="accordion1">
                                    
                                    
<?php 
 $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>