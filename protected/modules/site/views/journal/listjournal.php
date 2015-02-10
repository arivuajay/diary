
<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Journal list</li>
        </ol>
    </div>
    <div class="topbar-right pt30">
        <?php echo CHtml::link('<button class="btn btn-default btn-sm" type="button">Write An Entry</button>', array('/site/journal/create')); ?>
    </div>
</div>
<div id="content">
    <div class="row">
    <div class="col-md-12">
        <table style="width:100%" class="fc-header">
            <tbody>
                <tr>
                    <td class="fc-header-left"></td>
                    <td class="fc-header-center"><span class="fc-header-title"><h2><?php echo isset($journalList[0]->diary_current_date)? date('d F y', strtotime($journalList[0]->diary_current_date)):'' ?></h2></span></td>
                    <td class="fc-header-right"></td>
                </tr>
            </tbody>
        </table>

    </div>
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Mood</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($journalList as $k => $journal):
                                ?>
                                <tr>
                                    <td><?php echo $k + 1; ?></td>
                                    <td><?php echo date('Y-m-d', strtotime($journal->diary_current_date)); ?></td>
                                    <td><?php echo $journal->diary_title; ?></td>
                                    <td><?php echo $journal->diaryCategory->category_name; ?></td>
                                    <td><?php echo CHtml::image($this->createUrl("/themes/site/image/mood_type/{$journal->diaryUserMood->mood_image}"), $journal->diary_title); ?>
                                    </td>
                                    <td>
                                        <?php echo CHtml::link('Edit', array('/site/journal/update', 'id' => $journal->diary_id)) . ' /' ?>
                                        <?php echo CHtml::link('View', array('/site/journal/view', 'id' => $journal->diary_id)) ?>
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
