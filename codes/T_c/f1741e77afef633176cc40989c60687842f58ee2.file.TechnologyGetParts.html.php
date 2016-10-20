<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 11:37:40
         compiled from "codes/T/default/TechnologyGetParts.html" */ ?>
<?php /*%%SmartyHeaderCode:62380641357feda2e0bbe92-22175016%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f1741e77afef633176cc40989c60687842f58ee2' => 
    array (
      0 => 'codes/T/default/TechnologyGetParts.html',
      1 => 1476329855,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62380641357feda2e0bbe92-22175016',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57feda2e0c43f6_75802189',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57feda2e0c43f6_75802189')) {function content_57feda2e0c43f6_75802189($_smarty_tpl) {?>
					<form action='' method='post'>
						
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myprojects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<div>
							<label><input type='radio' name='pjid' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
' /> <?php echo $_smarty_tpl->tpl_vars['val']->value['prjname1'];
echo $_smarty_tpl->tpl_vars['val']->value['prjcustomer'];?>
 负责人:<?php echo $_smarty_tpl->tpl_vars['val']->value['uid'];?>
 开始时间:<?php echo $_smarty_tpl->tpl_vars['val']->value['prjstart'];?>
</label> 
						</div>
						<?php } ?>
						<div>
						<input class='button primary small' type='submit' name='submit' value='提交'>
						<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
						</div>
					</form>
					</div>
				</div>
			</div>
		</div>
<?php }} ?>
