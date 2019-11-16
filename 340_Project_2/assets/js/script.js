function getXHR(method, path){
		return $.ajax({
			type: method, //default 'get'
			cache: false, //force the requested page not to be cached by the browser
			async: true, //default true
			dataType: 'json', //returns a js object for JSON
			url: 'proxy.php', // where the request is sent
			data: path, //data to be sent to the server, converted to a query string
			beforeSend:function(){ //function to modify the XHR before it's sent
				// do this before sending the request
				//$('<img src="gears.gif" id="spinner"/>')
					//.appendTo("body");
			}
		}).always(function(){
			// happens at the end, no matter what
			//$('#spinner').remove();
		}).fail(function(){
			// if our request doesn't work
			console.log('Failure with '+path.path);
		});
}


function facMore( who ){
	var id = $(who).attr('data-id');
		getXHR('get',{'path': '/people/faculty/username=' + id}).done(function(json){
		console.log('facMore = ' + json.interestArea);
	});
} // end facMore