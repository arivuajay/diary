<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
            <h3 class="link-title">Links</h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('/admin/default/index'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li><a href="#">Links</a><span class="divider-last">&nbsp;</span></li>
            </ul>
            <!-- END PAGE TITLE & BREADCRUMB-->
        </div>
    </div>
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN EXAMPLE TABLE widget-->
            <div class="widget">
                <div class="widget-title">
                    <h4>
                        <i class="icon-reorder"></i>Links
                        <span class="pull-right"><?php echo CHtml::link('+ Add Link', array('/admin/cms/createlink','id'=>$id),array('class'=>'label label-info')); ?></span>
                    </h4>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Heading</th>
                                <th class="hidden-phone">Slug</th>
                                <th class="hidden-phone">Hits</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($links as $link): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $link->heading; ?></td>
                                    <td><?php echo $link->slug; ?></td>
                                    <td><?php echo $link->link_hits; ?></td>
                                    <td>
                                        <?php
                                        echo CHtml::link('<i class="icon-eye-open" title="View"></i>', array('/admin/cms/viewlink', 'id' => $link->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="icon-pencil" title = "Update"></i>', array('/admin/cms/updatelink', 'id' => $link->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="icon-remove" title="Delete"></i>', array('/admin/cms/deletelink', 'id' => $link->id), array('rel' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                        ?>
                                    </td>
                                </tr>
<?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END EXAMPLE TABLE widget-->
        </div>
    </div> 
</div>