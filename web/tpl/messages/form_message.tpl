<form action="/hkt/messages" method="post" id="addMessage">
	<table>
		<tr><td>Author*</td><td><input required type="text" name="author" id="authorInput"/></td></tr>
		<tr><td>Message*</td><td><input required type="text" name="message" id="messageInput" size="140" maxlength="140"/></td></tr>
	</table>
	<input type="button" value="Envoyer" onClick="addMessage()"/>
</form>