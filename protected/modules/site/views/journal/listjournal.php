
    <div id="topbar">
        <div class="topbar-left">
            <ol class="breadcrumb">
                <li class="crumb-active"><a href="#">Journal list</a></li>
            </ol>
        </div>
        <div class="topbar-right pt30">
            <?php echo CHtml::link('<button class="btn btn-default btn-sm" type="button">Write An Entry</button>', array('/site/journal/create')); ?>
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
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Mood</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($journalList as $k => $journal): ?>
                                    <tr>
                                        <td><?php echo $k + 1; ?></td>
                                        <td><?php echo $journal->diary_title; ?></td>
                                        <td><?php echo $journal->diaryCategory->category_name; ?></td>
                                        <td><?php echo CHtml::image($this->createUrl("/themes/site/css/frontend/img/mood_{$journal->diary_user_mood_id}.png"), $journal->diary_title); ?>
                                        </td>
                                        <td>
                                            <?php echo CHtml::link('Edit', array('/site/journal/update', 'id' => $journal->diary_id)) ?>
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
