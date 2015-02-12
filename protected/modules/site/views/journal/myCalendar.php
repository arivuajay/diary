<?php
$myDiary = array_values(CHtml::listData(Diary::model()->mine()->uniqueDays()->findAll(), 'dist_date', 'dist_date'));
?>
<script type="text/javascript">
    var avail_dates = <?php echo CJSON::encode($myDiary); ?>;
</script>


<div id="topbar">
    <div class="topbar-left">
        <ol class="breadcrumb">
            <li class="crumb-active">Dashboard</li>
        </ol>
    </div>
    <div class="topbar-right pt30">
        <?php echo CHtml::link('<button class="btn btn-default btn-sm" type="button">Write An Entry</button>', array('/site/journal/create')); ?>
    </div>
</div>
<div id="content">
    <div class="row">
        <div class="col-md-12" id="fullcalendar">
            <?php
            $this->widget('ext.EFullCalendar.EFullCalendar', array(
                'htmlOptions' => array(
                    'style' => 'width:100%'
                ),
                'options' => array(
                    'header' => array(
                        'left' => 'prev,next today',
                        'center' => 'title',
                        'right' => 'month,agendaWeek,agendaDay'
                    ),
                    //uncomment if you want to show events
                        'events'=>$this->createUrl('journal/calendarevents'),
                    'lazyFetching' => false,
                    'dayClick' => new CJavaScriptExpression("js:function(date, allDay, jsEvent, view) {
                            newdate = $.format.date(date, 'yyyy-MM-dd');
                            if(!$(this).hasClass('fc-other-month')){
                                if($(this).hasClass('events_highlight_new')){
                                    window.location = '" . $this->createUrl('/site/journal/listjournal') . "?date='+newdate;
                                }else{
                                    window.location = '" . $this->createUrl('/site/journal/create') . "?date='+newdate;
                                }
                            }
                        }"),
                    'dayRender' => new CJavaScriptExpression('js:function (date, cell) {
                            newdate = $.format.date(date, ""+"yyyy-MM-dd");
//                            console.log(avail_dates);
//                            console.log(newdate);
//                            console.log(cell);
                            html_cont = cell.html();
                            if(jQuery.inArray( newdate, avail_dates ) > -1){
                                cell.addClass("events_highlight_new");
                            }
                        }'),
                )
            ));
            ?>
        </div>
    </div>
</div>
