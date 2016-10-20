<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 16:12:33
         compiled from "codes/T/default/theme/Technology.html" */ ?>
<?php /*%%SmartyHeaderCode:115152330057fd8854b82222-98642913%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bdb36e01ed89671f6c7c3a933b66177909023d16' => 
    array (
      0 => 'codes/T/default/theme/Technology.html',
      1 => 1476778298,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '115152330057fd8854b82222-98642913',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fd8854b8bee9_58159755',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fd8854b8bee9_58159755')) {function content_57fd8854b8bee9_58159755($_smarty_tpl) {?><div class='row centered'>
		<div class='col col-8'>
			<div class='text-center'>
				<h3 class='depart-title'>硕星内部系统-技术部</h3>
				<hr>
			</div>
			<div class='row'>
				<div class='col col-3 hide-on-print'>
					<div id="my-collapse" class='collapse'>
						<ul>
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['left']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								<li><a href='<?php echo $_smarty_tpl->tpl_vars['val']->value['url'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</a></li>
							<?php } ?>
						</ul>
					</div>
				</div>
				<div class='col col-9'><?php }} ?>
