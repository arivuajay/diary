<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <!-- BEGIN PAGE TITLE & BREADCRUMB-->     
            <h3 class="page-title">Menus</h3>
            <ul class="breadcrumb">
                <li>
                    <a href="<?php echo Yii::app()->createAbsoluteUrl('/admin/default/index'); ?>"><i class="icon-home"></i></a><span class="divider">&nbsp;</span>
                </li>
                <li><a href="#">Menus</a><span class="divider-last">&nbsp;</span></li>
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
                        <i class="icon-reorder"></i>Menus
                        <span class="pull-right"><?php echo CHtml::link('+ Add Menu', array('/admin/cms/createmenu'),array('class'=>'label label-info')); ?></span>
                    </h4>
                </div>
                <div class="widget-body">
                    <table class="table table-striped table-bordered datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Menu Name</th>
                                <th class="hidden-phone">Links</th>
                                <th class="hidden-phone">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0;
                            foreach ($menus as $menu): ?>
                                <tr class="odd gradeX">
                                    <td><?php echo ++$i; ?></td>
                                    <td><?php echo $menu->name; ?></td>
                                    <td><?php echo CHtml::link('List of Links', array('/admin/cms/links', 'id' => $menu->id), array('rel' => 'tooltip')); ?></td>
                                    <td>
                                        <?php
                                        echo CHtml::link('<i class="icon-pencil" title = "Update"></i>', array('/admin/cms/updatepage', 'id' => $menu->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="icon-remove" title="Delete"></i>', array('/admin/cms/deletepage', 'id' => $menu->id), array('rel' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
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