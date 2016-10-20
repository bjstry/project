<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 16:18:12
         compiled from "codes/T/default/theme/Sale.html" */ ?>
<?php /*%%SmartyHeaderCode:11859046145805bd58d2c800-26544710%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2a05653df93988c59874017b731ba12caa4baa0d' => 
    array (
      0 => 'codes/T/default/theme/Sale.html',
      1 => 1476778663,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '11859046145805bd58d2c800-26544710',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5805bd58d51017_11835909',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5805bd58d51017_11835909')) {function content_5805bd58d51017_11835909($_smarty_tpl) {?><div class='row centered'>
		<div class='col col-8'>
			<div class='text-center'>
				<h3 class='depart-title'>硕星内部系统-业务部</h3>
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
				<div class='col col-9'>
					<div class='row'>
<?php }} ?>
