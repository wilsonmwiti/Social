var emoticonsImg = {
	smile: '<img height="15px" src="web/images/emoticons/smile.png" alt=":)" />', //smile
	sad: '<img height="15px" src="web/images/emoticons/sad.png" alt=":(" />', //sad
	wink: '<img height="15px" src="web/images/emoticons/wink.png" alt=";)" />', //wink
	tongue: '<img height="15px" src="web/images/emoticons/tongue.png" alt=":p" />', //tongue
	surprised: '<img height="15px" src="web/images/emoticons/surprised.png" alt=":o" />', //surprised
	shy: '<img height="15px" src="web/images/emoticons/shy.png" alt=":$" />', //shy
	love: '<img height="15px" src="web/images/emoticons/love.png" alt="<3" />', //love
	confused: '<img height="15px" src="web/images/emoticons/confused.png" alt=":s" />', //confused
	crying: '<img height="15px" src="web/images/emoticons/crying.png" alt=":\'(" />', //crying
}

var emoticonsString = new Array(':)', ':(', ';)', ':p', ':o', ':$', '<3', ':s', ":'(");

$(function(){	
	$('#help').click(function(){
		alert('Available emoticons => ' + emoticonsString.join(" "));
	});
});