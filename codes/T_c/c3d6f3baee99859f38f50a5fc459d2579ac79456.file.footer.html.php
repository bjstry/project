<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 21:18:02
         compiled from "codes/T/default/theme/footer.html" */ ?>
<?php /*%%SmartyHeaderCode:14404348075808c40a5b09d3-24930526%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c3d6f3baee99859f38f50a5fc459d2579ac79456' => 
    array (
      0 => 'codes/T/default/theme/footer.html',
      1 => 1476674054,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14404348075808c40a5b09d3-24930526',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808c40a5bd238_59414957',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808c40a5bd238_59414957')) {function content_5808c40a5bd238_59414957($_smarty_tpl) {?>		<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo @constant('_P_');?>
/jquery-2.0.3.min.js'><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type='text/javascript' src='<?php echo @constant('_P_');?>
/kube.min.js'><?php echo '</script'; ?>
>
		<?php echo $_smarty_tpl->tpl_vars['prj']->value['myjs'];?>

	</body>
</html><?php }} ?>
