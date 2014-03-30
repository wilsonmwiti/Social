{extends file="general/layout.tpl"}

{block name=title}Social - Erreur {$error->getStatusCode()}{/block}

{block name=head}
    <link href="{$rootPath}web/css/page/errors.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="{$rootPath}web/js/page/errors.js"></script>
{/block}

{block name=body}
    <div class="codeErreur">{$error->getStatusCode()}</div>
    <div class="messageErreur">{$error->getMessage()}</div>
{/block}