<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-12 15:40:17
         compiled from "codes/T/default/PurchaseView.html" */ ?>
<?php /*%%SmartyHeaderCode:86833173057fdd81ab92700-24418396%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'fd1869307016345f18c1749aa45fc79bb29857ee' => 
    array (
      0 => 'codes/T/default/PurchaseView.html',
      1 => 1476258013,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86833173057fdd81ab92700-24418396',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fdd81ab9a7f0_60231292',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fdd81ab9a7f0_60231292')) {function content_57fdd81ab9a7f0_60231292($_smarty_tpl) {?>
				<table class='table'>
									<tr><td>物品编号</td><td>厂商</td><td>型号</td><td>序列号/SN</td><td>供货商</td><td>库存数</td><td>出库数</td><td>操作</td></tr>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myparts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
									<form action='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/Outgo' method='post' class='form'>
									<tr><td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
"></td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['model'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['sn'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['supplier'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</td><td><input type='number' name='outcount'/></td><td><input class='button small' type='submit' name='outgo' value='出库'></td></tr>
									</form>
									<?php } ?>
								</table>
								<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
