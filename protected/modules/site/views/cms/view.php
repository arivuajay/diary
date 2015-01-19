<?php
/* @var $this CmsController */
/* @var $model Cms */

//$this->breadcrumbs=array(
//	'Cms'=>array('index'),
//	$model->id,
//);
//
//$this->menu=array(
//	array('label'=>'List Cms', 'url'=>array('index')),
//	array('label'=>'Create Cms', 'url'=>array('create')),
//	array('label'=>'Update Cms', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete Cms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage Cms', 'url'=>array('admin')),
//);
//?>
<!--
<h1>View Cms #<?php echo $model->id; ?></h1>-->

<?php
//$this->widget('zii.widgets.CDetailView', array(
//	'data'=>$model,
//	'attributes'=>array(
//		'id',
//		'heading',
//		'body',
//		'slug',
//		'metaTitle',
//		'metaDescription',
//		'metaKeywords',
//		'page_hits',
//	),
//));
?>
<?php   $baseUrl = Yii::app()->baseUrl;
        $themeUrl = Yii::app()->theme->baseUrl; 
       
        
        ?>

<section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
          <li class="crumb-active"><a href="#"><?php  echo $model->heading;?></a></li>
          <li class="crumb-link"><a href="<?php echo $baseUrl;?>">Home</a></li>
          <li class="crumb-trail"><?php  echo $model->heading;?></li>
        </ol>
      </div>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-10 center-column">
          <div class="panel faq-panel mt50">
            <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon">
                        <img src="<?php echo $themeUrl;?>/css/frontend/img/<?php echo $model->slug;?>.png">
                    </span> <?php  echo $model->heading;?> </span> </div>
            <div class="panel-body pn">
              <div class="row table-layout">                
                <div class="col-abt col-xs-12 va-m p60">                  
                  <div class="panel-group accordion mta25" id="accordion1">
                    <div class="panel">                      
                      <div id="accord1_1" class="panel-collapse collapse in">
                        <div class="panel-body"> 
                            <?php  echo $model->body;?>
                        </div>
                      </div>
                    </div>                                        
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>