<?php /* Smarty version Smarty-3.1.14, created on 2014-03-29 12:29:12
         compiled from "web\tpl\general\errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:141625332b3bd485134-56281305%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ffd7e94f45550b165a8f739104d6ac2b42568c06' => 
    array (
      0 => 'web\\tpl\\general\\errors.tpl',
      1 => 1396096066,
      2 => 'file',
    ),
    'be1c21a7c90a71d03992fe17948bced22c19dc3c' => 
    array (
      0 => 'web\\tpl\\general\\layout.tpl',
      1 => 1396096032,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '141625332b3bd485134-56281305',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5332b3bd545a34_72085277',
  'variables' => 
  array (
    'rootPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5332b3bd545a34_72085277')) {function content_5332b3bd545a34_72085277($_smarty_tpl) {?><!DOCTYPE html>
	<html lang="fr">    
	<head>    
		<title>HKT 4Ever - Erreur <?php echo $_smarty_tpl->tpl_vars['error']->value->getStatusCode();?>
</title>    
		
		    
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />    
		<script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['rootPath']->value;?>
web/js/jquery-1.10.2.min.js"></script>
		
		
    <link href="<?php echo $_smarty_tpl->tpl_vars['rootPath']->value;?>
web/css/page/errors.css" rel="stylesheet" media="screen">
    <script type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['rootPath']->value;?>
web/js/page/errors.js"></script>
    
	</head>
	
	<body>
		
    <div class="codeErreur"><?php echo $_smarty_tpl->tpl_vars['error']->value->getStatusCode();?>
</div>
    <div class="messageErreur"><?php echo $_smarty_tpl->tpl_vars['error']->value->getMessage();?>
</div>

	</body>
</html>
<?php }} ?>