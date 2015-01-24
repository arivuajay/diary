<?php
/* @var $this DashboardController */

//$this->breadcrumbs=array(
//	'Dashboard',
//);
?>
<!--<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>-->
<section id="content_wrapper">
    <div id="topbar">
      <div class="topbar-left">
        <ol class="breadcrumb">
          <li class="crumb-active"><a>Dashboard</a></li>
        </ol>
      </div>
      <div class="topbar-right pt30">
      	<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#calendarModal">Add New Event</button>
      </div>
    </div>
    <div id="content">
      <div class="row">
        <div class="col-md-12">
          <div id='calendar'></div>
        </div>
      </div>
    </div>
  </section>


<script type="text/javascript">
jQuery(document).ready(function () {
	  
	 "use strict";

    // Init Theme Core 	  
    Core.init();     
     
	
	// Init Calendar Plugin
	var date = new Date();
	var d = date.getDate();
	var m = date.getMonth();
	var y = date.getFullYear();
		
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function(date, allDay, jsEvent, ui ) { // this function is called when something is dropped
		
			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');
			
			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);
			
			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
		
			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);
			
			// is the "remove after drop" checkbox checked?
			// if so, remove the element from the "Draggable Events" list
			$(this).remove();
			
		},
		
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 9),
				color: '#a287d4'
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d-5),
				end: new Date(y, m, d-3),
				color: '#4b87ae'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+3, 16, 0),
				allDay: false,
				color: '#a287d4'
			},
			{
				id: 999,
				title: 'Repeating Event',
				start: new Date(y, m, d+10, 16, 0),
				allDay: false,
				color: '#95e5e7'
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false,
				color: '#efac75'
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false,
				color: '#95e5e7'
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d+1, 19, 0),
				end: new Date(y, m, d+1, 22, 30),
				allDay: false,
				color: '#a287d4'
			},
			{
				title: 'Mandatory!',
				start: new Date(y, m, 22),
				color: '#a0d65a'
			}
		]
	});
	
	// Init external calendar events
	function FCexternals() {
		if ($('#external-events').length) {
			
		  $('#external-events .external-event').each(function(index) {
						  
			  // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			  // it doesn't need to have a start or end
			  var eventObject = {
				  title: $.trim($(this).text()), // use the element's text as the event title
				  color: ($(this).attr('color')),
			  };

			  // store the Event Object in the DOM element so we can get to it later
			  $(this).data('eventObject', eventObject);
	
			  // make the event draggable using jQuery UI
			  $(this).draggable({
				  zIndex: 999,
				  revert: true,      // will cause the event to go back to its
				  revertDuration: 0  //  original position after the drag
			  });
			
		  });
		}
		}

	var count = 0;
	
	// Populate custom external event with form data then
	// run externals() to repopulate event object
	$(".create-event-form").on('click', function( event ) {
		event.preventDefault();
		count += 1;

		if (!$('#external-events').length) {
			$('#content').prepend('<div id="external-events"></div>');
		}
		
		var color = $("#create-event-form .colorpicker").val(),
			title1 = $("#create-event-form input").val();
			
		if (title1 === "" ) {var title1 = "Example Title";}

		$("#external-events").append("<div class='external-event' color='" + color + "' style='background:" + color + "'>" + title1 + "</div>");
		title1 = $("#create-event-form input").val("");
		FCexternals();				
	});

	FCexternals();
	 
	// Init Colorpicker Plugin
	$('.colorpicker').colorpicker();

 });

</script>