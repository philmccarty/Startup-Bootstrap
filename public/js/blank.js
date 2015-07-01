$(document).ready(function(){
	console.log(' [] Loaded');
	var new_height = $(document).height();
	$('#page-wrapper').css('height',new_height);
});

$( '#search_input' ).bind('keypress', function(e){
  if ( e.keyCode == 13 ) {
   		// do something
  }
});


function get_ajax(variable)
{
	
	console.log('Retrieving [something]: ' + variable);

	$.ajax({
		url : "api/v1/tools/zip/get_[something]",
		type : "GET",
		dataType : 'json',
		success: function(results)
		{
			console.log(results);

		},
		failure: function(results)
		{
			console.log(results);
		}
	});
	
	var new_height = $(window).height();
	$('#page-wrapper').css('height',new_height);
	
}