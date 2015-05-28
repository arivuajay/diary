<style>
    #dynamic-table2 tr{
        background-color: #FFFFFF;
       
    } 
     #dynamic-table2 td{
        background-color: #FFFFFF;
       
    } 
    .dataTables_filter, .dataTables_info { display: none; }
</style>
<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Search list</li>
        </ol>
    </div>
    <!--    <div class="topbar-right pt30">
    <?php echo CHtml::link('<button class="btn btn-default btn-sm" type="button">Write An Entry</button>', array('/site/journal/create')); ?>
        </div>-->
</div>
<div id="content">
    <div class="row">
        <div class="col-md-12">
    <!--        <table style="width:100%" class="fc-header">
                <tbody>
                    <tr>
                        <td class="fc-header-left"></td>
                        <td class="fc-header-center"><span class="fc-header-title"><h2><?php echo isset($journalList[0]->diary_current_date) ? date('d F y', strtotime($journalList[0]->diary_current_date)) : '' ?></h2></span></td>
                        <td class="fc-header-right"></td>
                    </tr>
                </tbody>
            </table>-->

        </div>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-bordered" id="dynamic-table2" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tag</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Mood</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($model as $k => $data):
                                ?>
                                <tr>
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $data->diary_tags; ?></td>
                                    <td><?php echo $data->diary_title; ?></td>
                                    <td><?php echo $data->diaryCategory->category_name; ?></td>
                                    <td><?php echo CHtml::image($this->createUrl("/themes/site/image/mood_type/{$data->diaryUserMood->mood_image}"), $data->diary_title); ?>
                                    </td>
                                    <td>
                                        <?php echo CHtml::link('Edit', array('/site/journal/update', 'id' => $data->diary_id)) . ' /' ?>
    <?php echo CHtml::link('View', array('/site/journal/view', 'id' => $data->diary_id)) ?>
                                    </td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>



<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
    var table = $('#dynamic-table2').DataTable( {
//        "aaSorting": [[ 1, "desc" ]]
//        "iDisplayLength": 2,
    });
EOD
);
?>
