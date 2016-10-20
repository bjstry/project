<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-12 15:32:27
         compiled from "codes/T/default/PurchaseIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:132850951257df9bf7499108-91963624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c6adeca3200da068b1a11983a8d432666b8e7907' => 
    array (
      0 => 'codes/T/default/PurchaseIndex.html',
      1 => 1476257520,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '132850951257df9bf7499108-91963624',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57df9bf74ec6a9_15141560',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57df9bf74ec6a9_15141560')) {function content_57df9bf74ec6a9_15141560($_smarty_tpl) {?>
					<div class='col col-12'>
						<form action='' method='post'>
							<h4 style='display:inline-block;'>配件库存情况</h4> <input class='button small' name='refresh' type='submit' value='刷新'>
						</form>
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
/View/type/<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</a></p>
					</div>
					<?php } ?>
					<div class='col col-12 down-hr'>
						<hr>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
