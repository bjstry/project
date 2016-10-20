<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 10:45:21
         compiled from "codes/T/default/TechnologyIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:104889250057fc386b6166c7-76110471%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '418b683cab794d32d192915213bd17f123595795' => 
    array (
      0 => 'codes/T/default/TechnologyIndex.html',
      1 => 1476326707,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '104889250057fc386b6166c7-76110471',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fc386b61e8c2_97981523',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fc386b61e8c2_97981523')) {function content_57fc386b61e8c2_97981523($_smarty_tpl) {?>				<div class='row'>
					<div class='col col-12'>
						<h4>未分配配件</h4>
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myclass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-3'>
						<p><?php echo $_smarty_tpl->tpl_vars['val']->value['cname'];?>
 :<a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/View/type/0/val/<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</a></p>
					</div>
					<?php } ?>
					<div class='col col-12 down-hr'>
						<hr>
					</div>
					<div class='col col-12'>
						<h4>已分配配件</h4>
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myunclass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-3'>
						<p><?php echo $_smarty_tpl->tpl_vars['val']->value['cname'];?>
 :<a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/View/type/1/val/<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</a></p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
