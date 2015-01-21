<?php
/* @var $this FaqController */
/* @var $data Faq */
?>
<div class="panel">
    <div class="panel-heading"> <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion1" href="#accord1_<?php echo $data->id;?>">
            <div class="accordion-toggle-icon pull-left"> <i class="fa fa-minus-square-o text-light4"></i> <i class="fa fa-plus-square-o text-purple2"></i> </div>
            <?php echo CHtml::encode($data->question); ?></a> </div>
    <div id="accord1_<?php echo $data->id;?>" class="panel-collapse collapse in">
        <div class="panel-body"> <?php echo CHtml::encode($data->answer); ?> </div>
    </div>
</div>

