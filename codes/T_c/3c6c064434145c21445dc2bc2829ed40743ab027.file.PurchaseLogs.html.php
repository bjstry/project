<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-12 14:19:06
         compiled from "codes/T/default/PurchaseLogs.html" */ ?>
<?php /*%%SmartyHeaderCode:213483237057e0e9b64c9209-40508190%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c6c064434145c21445dc2bc2829ed40743ab027' => 
    array (
      0 => 'codes/T/default/PurchaseLogs.html',
      1 => 1476253144,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213483237057e0e9b64c9209-40508190',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57e0e9b64f9822_65249446',
  'variables' => 
  array (
    'prj' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57e0e9b64f9822_65249446')) {function content_57e0e9b64f9822_65249446($_smarty_tpl) {?>				<div class='col col-12'>
				<table class='flat'>
					<tbody>
				<tr><th>操作人</th><th>时间</th><th>类型</th><th>数量</th><th>详细</th></tr>
				<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['logsshow']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
				<tr><td><?php echo $_smarty_tpl->tpl_vars['value']->value['uid'];?>
 </td><td><?php echo $_smarty_tpl->tpl_vars['value']->value['date'];?>
 </td><td><?php echo $_smarty_tpl->tpl_vars['value']->value['type'];?>
 </td><td><?php echo $_smarty_tpl->tpl_vars['value']->value['count'];?>
 </td><td><?php echo $_smarty_tpl->tpl_vars['value']->value['content'];?>
</td></tr>
				<?php } ?>
				</tbody>
				</table>
				<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/'>返回</a>
				</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
