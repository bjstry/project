<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 21:18:02
         compiled from "codes/T/default/theme/head.html" */ ?>
<?php /*%%SmartyHeaderCode:12899544575808c40a57e6c6-18452845%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '12899544575808c40a57e6c6-18452845',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808c40a595933_76076836',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808c40a595933_76076836')) {function content_5808c40a595933_76076836($_smarty_tpl) {?><!DOCTYPE html>
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
