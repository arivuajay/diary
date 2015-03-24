<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories',
);

//$this->menu=array(
//	array('label'=>'Create Category', 'url'=>array('create')),
//	array('label'=>'Manage Category', 'url'=>array('admin')),
//);
//
//$this->widget('zii.widgets.CListView', array(
//	'dataProvider'=>$dataProvider,
//	'itemView'=>'_view',
//)); 
?>


<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Categories</li>
        </ol>
    </div>
</div>
<div id="content">
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(empty($categories)){?>
                            <tr>
                                <td colspan="4" class="text-center">No record found</td>
                            </tr>
                            <?php }else{?>
                                <?php foreach ($categories as $k => $category):
                                    ?>
                                    <tr>
                                        <td><?php echo $k + 1; ?></td>
                                        <td><?php echo $category->category_name; ?></td>
                                        <td><?php echo $category->created; ?></td>
                                        <td>
                                            <?php echo CHtml::link('Edit', array('/site/category/update', 'id' => $category->category_id))  ?>
                                            <?php //echo CHtml::link('Delete', array('/site/category/delete', 'id' => $category->category_id), array('onClick' => 'return confirm("Are you sure to delete ?")')) ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php }?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>
