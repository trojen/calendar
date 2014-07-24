$(document).ready(function() {
		var date = 0;
		$('.day').click(function() {
			date = $(this).attr('rel');
			$.ajax({
	            url: 'core/validate.php',
	            type: 'POST',
	            dataType: "JSON",
	            data: {
	                'date': date
	            },
	            success: function(data) {
	            	if(data.success) {
	            		var result = new Array();
	            		result = JSON.stringify(data.data);
	            	
	            		$('#title').val(data.data['title']);
	            		$('#start_time').val(data.data['start_time']);
	            		$('#end_time').val(data.data['end_time']);
	            		$('#location').val(data.data['location']);
	            		$('#body').val(data.data['body']);

	            		$('#myModal2').modal('show');
	            	} else {
	            		$('#calendar_event').trigger("reset");
	            		$('#myModal').modal('show');
	            	}
	            }
	        });			
		});

		$('.daily').click(function() {
			date = $(this).attr('rel');
			var dayOfWeek = $(this).attr('day-of-week');
			$.ajax({
	            url: 'core/validate.php',
	            type: 'POST',
	            dataType: "JSON",
	            data: {
	                'daily': date,
	                'dayOfWeek' : dayOfWeek
	            },
	            success: function(data) {
	            	if(data.success) {
	            		var result = new Array();
	            		result = JSON.stringify(data.data);
	            		alert(result.length);
	            		if (result.length > 0) {
		            		$('#title').val(data.data['title']);
		            		$('#start_time').val(data.data['start_time']);
		            		$('#end_time').val(data.data['end_time']);
		            		$('#location').val(data.data['location']);
		            		$('#body').val(data.data['body']);
		            		$('#myModal2').modal('show');
		            	} else {
		            		
		            	}
	            	} else {
	            		$('#calendar_event').trigger("reset");
	            		$('#myModal').modal('show');
	            	}
	            }
	        });			
		});

		$('#update_event').click(function(){
			var formInputs = new Array();
			var count = 1;
			//Add the object to the array
	        formInputs = {
	            'title': $('#title_update').val(),
	            'start_time': $('#start_time_update').val(),         
	            'end_time': $('#end_time_update').val(),
	            'location': $('#location_update').val(),
	            'date' : date,
	            'body': $('#body_update').val()
	        };

			$.ajax({
	            url: 'core/validate.php',
	            type: 'POST',
	            dataType: "JSON",
	            data: {
	                'update': formInputs
	            },
	            success: function(data) {
	            	$('#form_result2').append("Updated Successfully!");
	            	$('#myModal').modal('hide');
	            }
	        });
		});

		$('#submit_event').click(function(){
			var formInputs = new Array();
			var count = 1;
			//Add the object to the array
	        formInputs = {
	            'title': $('#title').val(),
	            'start_time': $('#start_time').val(),         
	            'end_time': $('#end_time').val(),
	            'location': $('#location').val(),
	            'date' : date,
	            'body': $('#body').val()
	        };

			$.ajax({
	            url: 'core/validate.php',
	            type: 'POST',
	            dataType: "JSON",
	            data: {
	                'inputs': formInputs
	            },
	            success: function(data) {
	            	$('#myModal').modal('hide');
	            }
	        });
		});

		$('.previous').click(function(){

		});
		$('.next').click(function(){

		});

}); // End document ready