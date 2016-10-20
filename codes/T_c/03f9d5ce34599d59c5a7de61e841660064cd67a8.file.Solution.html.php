<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 15:28:56
         compiled from "codes/T/default/theme/Solution.html" */ ?>
<?php /*%%SmartyHeaderCode:204518332357ff220b1d0d45-07288001%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '03f9d5ce34599d59c5a7de61e841660064cd67a8' => 
    array (
      0 => 'codes/T/default/theme/Solution.html',
      1 => 1476775735,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '204518332357ff220b1d0d45-07288001',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ff220b203f60_10260199',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ff220b203f60_10260199')) {function content_57ff220b203f60_10260199($_smarty_tpl) {?><div class='row centered'>
		<div class='col col-8'>
			<div class='text-center'>
				<h3 class='depart-title'>硕星内部系统-方案部</h3>
				<hr>
			</div>
			<div class='row'>
				<div class='col col-3'>
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
