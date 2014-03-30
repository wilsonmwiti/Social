var lastId = 0;

$(function(){

	lastId = $('#messages > .message:last').attr('data-value');

	window.setInterval(function(){
		var collected = {
			lastId : lastId
		};
	
		$.ajax({
			url: "/social/messages",
			type: "GET",
			dataType: "json",
			data: collected,
			success: function(result){
				if(result != ''){
					result.forEach(function(entry){
						$("#messages").append('<p>' + entry.author + ' : ' + entry.message + '</p>');
					});
					lastId = result[result.length-1].id;
				}
			},
			error: function() {
			}
		});
	}, 1000);

});

function addMessage(){

	var author = $('#authorInput').val();
	var message = $('#messageInput').val();
	
	if(author == '' || message == ''){
		alert('All fields are required !');
		return false;
	}

	var collected = {
        author : author,
        message : message
    };

	$.ajax({
        url: "/social/messages",
        type: "POST",
        data: collected,
        dataType: "json",
        success: function(result){
			$('#authorInput').val("");
			$('#messageInput').val("");
        },
        error: function() {
            alert("Une erreure est survenue, veuillez contacter l'administrateur du site !");
        }
    });

}