<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 09:35:54
         compiled from "codes/T/default/theme/head.html" */ ?>
<?php /*%%SmartyHeaderCode:185594278057a69ca59a9379-83560709%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b0dd1271250330c151c2222a99271304cd288e4f' => 
    array (
      0 => 'codes/T/default/theme/head.html',
      1 => 1476754456,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '185594278057a69ca59a9379-83560709',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a69ca5a48ad1_09534343',
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a69ca5a48ad1_09534343')) {function content_57a69ca5a48ad1_09534343($_smarty_tpl) {?><!DOCTYPE html>
<html>
	<head>
		<title class='hide-on-print'><?php echo $_smarty_tpl->tpl_vars['prj']->value['title'];?>
</title>
		<meta charset='utf-8'>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel='stylesheet' type='text/css' href='<?php echo @constant('_P_');?>
/kube.min.css' />
		<?php echo $_smarty_tpl->tpl_vars['prj']->value['mycss'];?>

	</head>
	<body>
		<?php }} ?>
