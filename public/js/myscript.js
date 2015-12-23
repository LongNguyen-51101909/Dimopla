/**
 * 
 */

$(document).ready(function(){
   $.datepicker.formatDate( "yy-mm-dd", new Date( 2007, 1 - 1, 26 ) );
   $( "input[data-type=date]" ).datepicker({
   	changeMonth: true,
   	changeYear: true,
   	dateFormat: "dd/mm/yy"
	});

   var data = {
	  series: [5, 3, 4]
	};

	var sum = function(a, b) { return a + b };

	$('body').find('.chart').each(function() {
		new Chartist.Pie('#' + $(this).attr('id'), data, {
		  labelInterpolationFnc: function(value) {
		    return Math.round(value / data.series.reduce(sum) * 100) + '%';
		  },
		  width:200,
		  height:200,	  
		});
	});
});