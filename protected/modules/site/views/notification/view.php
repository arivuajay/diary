<?php
/* @var $this NotificationController */
/* @var $model Notification */
?>

<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">View Notifications</li>
  <!--          <li class="crumb-link"><a href="<?php // echo $baseUrl;    ?>">Home</a></li>
            <li class="crumb-trail"><?php //  echo $model->heading;    ?></li>-->
        </ol>
    </div>
</div>

<div id="content">
    <div class="row">
        <div class="col-md-10 center-column">
            <div class="panel faq-panel mt50">
                <div class="panel-heading"> <span class="panel-title"> <span class="glyphicon glyphicon-lock"></span> View Notifications<?php //echo $model->diary_id;    ?><?php //  echo $model->heading;    ?> </span> </div>
                <div class="panel-body pn">
                    <div class="row table-layout">
                        <div class="col-abt col-xs-12 va-m p60">
                            <div class="panel-group accordion mta25" id="accordion1">
                                <div class="panel">
                                    <div id="accord1_1" class="panel-collapse collapse in">
                                        <div class="panel-body">
                                            <?php
                                            $this->widget('zii.widgets.CDetailView', array(
                                                'data' => $model,
                                                'attributes' => array(
                                                    'notification_title',
                                                    array(
                                                        'name' => $model->getAttributeLabel('notification_message'),
                                                        'type' => 'raw',
                                                        'value' => $model->notification_message
                                                    ),
//                                                    'notification_message',
                                                //'created',
                                                //'modified',
                                                ),
                                            ));
                                            ?>

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
