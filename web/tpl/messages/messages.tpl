{foreach $messages as $message}
	<p class="message" data-value="{$message->getId()}">{$message->getAuthor()} : {$message->getMessage()}</p>
{/foreach}