<?php /* Smarty version Smarty-3.1.14, created on 2014-03-30 15:42:23
         compiled from "web/tpl/general/accueil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189201334853380f9d0a8673-33678434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '984dff56d36a59f1a9e8e10bb45fb14a428b7d70' => 
    array (
      0 => 'web/tpl/general/accueil.tpl',
      1 => 1396186942,
      2 => 'file',
    ),
    'eebd06dcc9bb8e8d82105446cfcb517b7def5544' => 
    array (
      0 => 'web/tpl/general/layout.tpl',
      1 => 1396186941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189201334853380f9d0a8673-33678434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53380f9d23b6f5_29455042',
  'variables' => 
  array (
    'rootPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53380f9d23b6f5_29455042')) {function content_53380f9d23b6f5_29455042($_smarty_tpl) {?><!DOCTYPE html>
	<html lang="fr">    
	<head>    
		<title>Social - Bienvenue</title>    
		
		
    <meta name="description" content="" />
    
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />    
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['rootPath']->value;?>
web/js/jquery-1.10.2.min.js"></script>
		
		
	<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['rootPath']->value;?>
web/css/home.css">
	
	<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['rootPath']->value;?>
web/js/home.js"> </script>
    
	</head>
	
	<body>
		
	<div id="messages">
		<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['message']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['messages']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
$_smarty_tpl->tpl_vars['message']->_loop = true;
?>
			<p class="message" data-value="<?php echo $_smarty_tpl->tpl_vars['message']->value->getId();?>
"><?php echo $_smarty_tpl->tpl_vars['message']->value->getAuthor();?>
 : <?php echo $_smarty_tpl->tpl_vars['message']->value->getMessage();?>
</p>
		<?php } ?>
	</div>
	
	<form action="/hkt/messages" method="post" id="addMessage">
		<table>
			<tr><td>Author*</td><td><input required type="text" name="author" id="authorInput"/></td></tr>
			<tr><td>Message*</td><td><input required type="text" name="message" id="messageInput" size="140" maxlength="140"/></td></tr>
		</table>
		<input type="button" value="Envoyer" onClick="addMessage()"/>
	</form>

	</body>
</html>
<?php }} ?>