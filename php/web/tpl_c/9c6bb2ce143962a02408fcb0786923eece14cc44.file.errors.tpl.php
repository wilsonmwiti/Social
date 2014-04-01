<?php /* Smarty version Smarty-3.1.14, created on 2014-03-30 18:03:25
         compiled from "web/tpl/general/errors.tpl" */ ?>
<?php /*%%SmartyHeaderCode:39541538953380f384f9375-46064110%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9c6bb2ce143962a02408fcb0786923eece14cc44' => 
    array (
      0 => 'web/tpl/general/errors.tpl',
      1 => 1396186941,
      2 => 'file',
    ),
    'eebd06dcc9bb8e8d82105446cfcb517b7def5544' => 
    array (
      0 => 'web/tpl/general/layout.tpl',
      1 => 1396186941,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '39541538953380f384f9375-46064110',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_53380f386fd669_29283771',
  'variables' => 
  array (
    'rootPath' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53380f386fd669_29283771')) {function content_53380f386fd669_29283771($_smarty_tpl) {?><!DOCTYPE html>
	<html lang="fr">    
	<head>    
		<title>Social - Erreur <?php echo $_smarty_tpl->tpl_vars['error']->value->getStatusCode();?>
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