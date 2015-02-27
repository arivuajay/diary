<?php
/* @var $this BannerController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
    'Banners',
);
?>

<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Manage Banners
                <span class="pull-right">
                    <?php echo CHtml::link('+ Add Banner', array('/admin/banner/create'), array('class' => 'label label-success')); ?>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">

                    <table  class="display table table-bordered table-striped" id="dynamic-table2">
                        <thead>
                            <tr>
                                <th><?php echo Banner::model()->getAttributeLabel('banner_title') ?></th>
                                <th><?php echo Banner::model()->getAttributeLabel('banner_layout_id') ?></th>
                                <th><?php echo Banner::model()->getAttributeLabel('banner_image') ?></th>
                                <th><?php echo Banner::model()->getAttributeLabel('banner_url') ?></th>
                                <th><?php echo Banner::model()->getAttributeLabel('banner_status') ?></th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($banners as $key => $banner): ?>
                                <tr>
                                    <td><?php echo $banner->banner_title ?></td>
                                    <td><?php echo $banner->bannerLayout->banner_layout_name ?></td>
                                    <td><a href="#myModal<?php echo $banner->banner_id ?>" data-toggle="modal"><?php
                                echo CHtml::image(
                                        $this->createUrl("/themes/site/image/banners/" . $banner->banner_path . $banner->banner_image), $banner->banner_title, array(
                                    'width' => '230',
                                    'height' => '30'
                                ));
                                ?></a></td>
                                    <td><?php echo $banner->banner_url ?></td>
                                    <td>
                                        <input type="checkbox" <?php echo $banner->banner_status == '1' ? 'checked' : '' ?>
                                               data-on="success"
                                               data-off="danger"
                                               data-bannerid="<?php echo $banner->banner_id ?>"
                                               class="switch-mini" />
                                    </td>
                                    <td>
                                        <?php
//                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', arrasy('/admin/banner/view', 'id' => $banner->banner_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/banner/update', 'id' => $banner->banner_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
//                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/banner/delete', 'id' => $banner->banner_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                        ?>
                                    </td>
                                </tr>

                            <div class="modal fade" id="myModal<?php echo $banner->banner_id ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title"><?php echo ucfirst($banner->banner_title) ?></h4>
                                        </div>

                                        <div class="modal-body row">

                                            <div class="col-md-12 img-modal">
                                                <?php
                                                echo CHtml::image(
                                                        $this->createUrl("/themes/site/image/banners/" . $banner->banner_path . $banner->banner_image), $banner->banner_title
                                                );
                                                ?>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

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
        
    $(document).ready(function(){
        $('.switch-mini').on('switch-change', function (e, data) {
            bannerid = $(this).data('bannerid');
            $.ajax({
                type: 'post',
                url:"$baseUrl/admin/banner/changestatus?id="+bannerid,
                success:function(result){
                    $.gritter.add({
                        text: result,
                        sticky: false,
                        time: ''
                    });
                }
            });
        });
    });
EOD
);
?>