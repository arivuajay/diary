<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Pages
                <span class="pull-right">
                    <?php echo CHtml::link('+ Add Page', array('/admin/cms/createpage'), array('class' => 'label label-success')); ?>
                </span>
            </header>
            <div class="panel-body">
                <table class="table table-hover general-table datatable">
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
                        foreach ($pages as $page):
                            ?>
                            <tr class="odd gradeX">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $page->heading; ?></td>
                                <td><?php echo $page->slug; ?></td>
                                <td><?php echo $page->page_hits; ?></td>
                                <td>
                                    <?php
                                    echo CHtml::link('<i class="fa fa-eye" title="View"></i>', array('/admin/cms/viewpage', 'id' => $page->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-edit" title = "Update"></i>', array('/admin/cms/updatepage', 'id' => $page->id), array('rel' => 'tooltip')) . "&nbsp;&nbsp;";
                                    echo CHtml::link('<i class="fa fa-trash-o" title="Delete"></i>', array('/admin/cms/deletepage', 'id' => $page->id), array('rel' => 'tooltip', 'onclick' => "return confirm('Are you sure you want to delete?');"));
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