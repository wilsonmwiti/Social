var lastId = 0;

$(function(){

	lastId = $('#messages > .message:last').attr('data-value');
	
	$('#messages').animate({scrollTop: $('#messages').css('height')});
	
	$('#authorInput').keyup(function (e){
		if(e.keyCode == 13){
			$('#messageInput').focus();
		}
	});
	
	$('#messageInput').keyup(function (e){
		if(e.keyCode == 13){
			$('#submitMessage').click();
		}
		else{
			$('#print').html(140 - ($(this).val().length));
		}
	});

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
						$("#messages").append('<p class="message">' + entry.author + ' : ' + entry.message + '</p>');
					});
					lastId = result[result.length-1].id;
					$('#messages').animate({scrollTop: $('#messages').css('height')});
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
	
	for(var key in emoticonsString) {
	  message = message.replace(emoticonsString[key], emoticonsImg[key]);
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
			$('#messageInput').val("");
			$('#print').val(140);
        },
        error: function() {
            alert("Une erreur est survenue, veuillez contacter l'administrateur du site !");
        }
    });

}