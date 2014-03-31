<?php /* Smarty version Smarty-3.1.14, created on 2014-03-31 08:18:41
         compiled from "web\tpl\general\accueil.tpl" */ ?>
<?php /*%%SmartyHeaderCode:303665332b3ebe30351-20270201%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '831152fc2fc255321dd473c7e765b851f085150c' => 
    array (
      0 => 'web\\tpl\\general\\accueil.tpl',
      1 => 1396252982,
      2 => 'file',
    ),
    'be1c21a7c90a71d03992fe17948bced22c19dc3c' => 
    array (
      0 => 'web\\tpl\\general\\layout.tpl',
      1 => 1396247865,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '303665332b3ebe30351-20270201',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5332b3ebeac212_78560629',
  'variables' => 
  array (
    'rootPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332b3ebeac212_78560629')) {function content_5332b3ebeac212_78560629($_smarty_tpl) {?><!DOCTYPE html>
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
web/js/emoticons.js"> </script>
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
			<tr><td>Message*</td><td><input required type="text" name="message" id="messageInput" size="140" maxlength="140"/></td><td>print : <span id="print">140</span></td></tr>
		</table>
		<input type="button" value="Envoyer" id="submitMessage" onClick="addMessage()"/>
	</form>
	<div id="emoticons"></div>

	</body>
</html>
<?php }} ?>