<?php
/* @var $this FaqController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Faqs',
);

 ?>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Faq's
                <span class="pull-right">
                    <?php echo CHtml::link('+ Add Faq', array('/admin/faq/createfaq'), array('class' => 'label label-success')); ?>
                </span>
            </header>
            <div class="panel-body">
                <table class="table table-hover general-table datatable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Question</th>
                            <th class="hidden-phone">Answer</th>
                            <th class="hidden-phone">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($faqs as $faq):
                            ?>
                            <tr>
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $faq->question; ?></td>
                                <td><?php echo $faq->answer; ?></td>
                                <td>
                                    <?php
//                                        echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/cms/viewpage', 'id' => $page->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/faq/updatefaq', 'id' => $faq->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/faq/deletefaq', 'id' => $faq->id), array('rel' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
                                    ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
        </section>
    </div>
</div> 
