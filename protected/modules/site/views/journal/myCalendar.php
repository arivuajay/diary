<section id="content_wrapper">
    <div id="content">
        <div class="row">
            <div class="col-md-12">
                <?php
                $this->widget('ext.EFullCalendar.EFullCalendar', array(
                    // polish version available, uncomment to use it
                    // 'lang'=>'pl',
                    // you can create your own translation by copying locale/pl.php
                    // and customizing it
                    // remove to use without theme
                    // this is relative path to:
                    // themes/<path>
                    'themeCssFile' => 'cupertino/theme.css',
                    // raw html tags
                    'htmlOptions' => array(
                        // you can scale it down as well, try 80%
                        'style' => 'width:100%'
                    ),
                    // FullCalendar's options.
                    // Documentation available at
                    // http://arshaw.com/fullcalendar/docs/
                    'options' => array(
                        'header' => array(
                            'left' => 'title',
                            'center' => '',
                            'right' => 'today,month,agendaWeek,agendaDay'
                        ),
                        'lazyFetching' => true,
                        'events' => $this->createUrl('/site/journal/calendarevents'), // action URL for dynamic events, or
                        'events' => array() // pass array of events directly
                    // event handling
                    // mouseover for example
//        'eventMouseover'=>new CJavaScriptExpression("js_function_callback"),
                    )
                ));
                ?>
            </div>
        </div>
    </div>
</section>