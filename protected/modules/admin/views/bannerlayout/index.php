<?php
/* @var $this BannerLayoutController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Banner Layouts',
);

?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Manage Banner Layouts</header>
            <div class="panel-body">
                <div class="adv-table">
                    
                    <table  class="display table table-bordered table-striped" id="dynamic-table2">
                        <thead>
                            <tr>
                                <th><?php echo BannerLayout::model()->getAttributeLabel('banner_layout_page')?></th>
                                <th><?php echo BannerLayout::model()->getAttributeLabel('banner_layout_position')?></th>
                                <th><?php echo BannerLayout::model()->getAttributeLabel('banner_layout_dimensions')?></th>
                                <!--<th>Action</th>-->
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($layouts as $key => $layout): ?>
                                <tr>
                                    <td><?php echo Myclass::getPageLayouts($layout->banner_layout_page) ?></td>
                                    <td><?php echo Myclass::getPageLayoutPositions($layout->banner_layout_position) ?></td>
                                    <td><?php echo $layout->banner_layout_dimensions?></td>
<!--                                    <td>
                                        <?php
//                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/bannerlayout/view', 'id' => $layout->banner_layout_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/bannerlayout/update', 'id' => $layout->banner_layout_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/bannerlayout/delete', 'id' => $layout->banner_layout_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                        ?>
                                    </td>-->
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>

<?php
$baseUrl = Yii::app()->baseUrl;
Yii::app()->clientScript->registerScript('settings-script', <<<EOD
    var table = $('#dynamic-table2').DataTable( {
        "aaSorting": [[ 4, "desc" ]]
    });
EOD
);
?>