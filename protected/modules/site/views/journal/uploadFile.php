<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
            <h4 id="editName" class="modal-title">Submit New List</h4>
        </div>

        <div class="modal-body">
            <?php
            $this->widget('xupload.XUpload', array(
                'url' => Yii::app()->createUrl("/site/journal/adddiaryimage"),
                'model' => $model,
                'attribute' => 'file',
                'multiple' => true,
            ));
            ?>
        </div>
    </div>
</div>