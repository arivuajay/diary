<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories',
);

?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">Manage Category
            <span class="pull-right">
                    <?php echo CHtml::link('+ Add Category', array('/admin/category/create'), array('class' => 'label label-success')); ?>
                </span>
            </header>
            <div class="panel-body">
                <div class="adv-table">
                    
                    <table  class="display table table-bordered table-striped" id="dynamic-table2">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category Name</th>
                                  <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php  $i=0; foreach ($categories as $key => $data): ?>
                                <tr id="tr_<?php echo $data->category_id ?>">
                                    <td><?php echo ++$i ?></td>
                                    <td><?php echo $data->category_name; ?></td>
                                    <td>
                                        <?php
//                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/category/view', 'id' => $data->category_id), array('id' => 'tooltip1')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/category/update', 'id' => $data->category_id), array('id' => 'tooltip')) . "&nbsp;&nbsp;";
                                        echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/category/delete', 'id' => $data->category_id), array('id' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                        ?>
                                    </td>
                                
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>
</div>



