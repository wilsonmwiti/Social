{extends file="general/layout.tpl"}

{block name=title}Social - Bienvenue{/block}

{block name=meta}
    <meta name="description" content="" />
{/block}

{block name=head}
	<link rel="stylesheet" type="text/css" href="{$rootPath}web/css/home.css">
	
	<script type="text/javascript" src="{$rootPath}web/js/emoticons.js"> </script>
	<script type="text/javascript" src="{$rootPath}web/js/home.js"> </script>
{/block}

{block name=body}
	<div id="messages">
		{foreach $messages as $message}
			<p class="message" data-value="{$message->getId()}">{$message->getAuthor()} : {$message->getMessage()}</p>
		{/foreach}
	</div>
	
	<form action="/hkt/messages" method="post" id="addMessage">
		<table>
			<tr><td>Author*</td><td><input required type="text" name="author" id="authorInput"/></td></tr>
			<tr>
				<td>Message*</td>
				<td><input required type="text" name="message" id="messageInput" size="140" maxlength="140"/><img id="help" src="web/images/help.png" alt="help" /></td>
				<td>print : <span id="print">140</span></td>
			</tr>
		</table>
		<input type="button" value="Send" id="submitMessage" onClick="addMessage()"/>
	</form>
	
	<div id="emoticons" style="display: none;"></div>
{/block}