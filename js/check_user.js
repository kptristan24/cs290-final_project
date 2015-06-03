// Javascript Document

console.log('dicknballs');

//$('#username').keydown(function(){
	
function doShit() {
console.log('cockass');
	
	var username = $('#username').val();
	
	console.log('This is username: ' + username);
	
	if(username != ''){
		$.post('../src/checkuser.php', {username:username},
		
		function(data){
			$('#status').html(data);
		});
	}
	else{
		$('#status').html('');
	}
}

$(document).ready(function(){
	
	$("#username").keyup(doShit);
	
/*	console.log('cockass');
	
	var username = $('#username').val();
	
	console.log('This is username: ' + username);
	
	if(username != ''){
		$.post('../src/checkuser.php', {username:username},
		
		function(data){
			$('#status').html(data);
		});
	}
	else{
		$('#status').html('');
	}*/ 
//});

});
