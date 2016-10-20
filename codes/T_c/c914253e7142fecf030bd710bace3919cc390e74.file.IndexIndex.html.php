<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 21:18:10
         compiled from "codes/T/default/IndexIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:12398200645808c412b9d430-17687989%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c914253e7142fecf030bd710bace3919cc390e74' => 
    array (
      0 => 'codes/T/default/IndexIndex.html',
      1 => 1476097187,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12398200645808c412b9d430-17687989',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prj' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808c412bc9393_28842199',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808c412bc9393_28842199')) {function content_5808c412bc9393_28842199($_smarty_tpl) {?><div class='row centered'>
	<div class='col col-5'>
		<p><?php echo $_smarty_tpl->tpl_vars['prj']->value['info'];?>
</p>
		<p>你好，<?php echo $_smarty_tpl->tpl_vars['prj']->value['user']['urename'];?>
 ! &nbsp;&nbsp;请选择功能区：</p>
		<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['departs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
		<a class='button' href="<?php echo @constant('URL');?>
/<?php echo $_smarty_tpl->tpl_vars['value']->value['url'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a>
		<?php } ?>
<br><br>
		<a class='button small red' href='<?php echo @constant('URL');?>
/Index/LoginOut'>注销</a>
			<?php echo $_smarty_tpl->tpl_vars['prj']->value['manager'];?>

	</div>
</div><?php }} ?>
