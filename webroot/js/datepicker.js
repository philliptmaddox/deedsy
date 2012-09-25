$(function(){
	window.prettyPrint && prettyPrint();
	$('.dp1').datepicker({
		format: 'mm-dd-yyyy'
	});
	$('.dp2').datepicker();
	$('.dp3').datepicker();
	
	
	var startDate = new Date(2012,1,20);
	var endDate = new Date(2012,1,25);
	$('.dp4').datepicker()
		.on('changeDate', function(ev){
			if (ev.date.valueOf() > endDate.valueOf()){
				$('#alert').show().find('strong').text('The start date can not be greater then the end date');
			} else {
				$('#alert').hide();
				startDate = new Date(ev.date);
				$('#startDate').text($(this).data('date'));
			}
			$(this).datepicker('hide');
		});
	$('.dp5').datepicker()
		.on('changeDate', function(ev){
			if (ev.date.valueOf() < startDate.valueOf()){
				$('#alert').show().find('strong').text('The end date can not be less then the start date');
			} else {
				$('#alert').hide();
				endDate = new Date(ev.date);
				$('#endDate').text($(this).data('date'));
			}
			$(this).datepicker('hide');
		});
});
