<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-02 15:25:33
         compiled from "codes/T/default/IndexOutgo.html" */ ?>
<?php /*%%SmartyHeaderCode:37259997457bc952289ec41-65250742%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0fb1a0e798af547950d8ae0eedb1c691e766c89a' => 
    array (
      0 => 'codes/T/default/IndexOutgo.html',
      1 => 1472801129,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '37259997457bc952289ec41-65250742',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57bc95228cfd60_66063854',
  'variables' => 
  array (
    'myclass' => 0,
    'val' => 0,
    'myparts' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57bc95228cfd60_66063854')) {function content_57bc95228cfd60_66063854($_smarty_tpl) {?><div class='row centered'>
	<div class='col col-8'>
		<form action='' method='post' class='form'>
			<div class='form-item'>
				<select name='class'>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myclass']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<option value='<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['cname'];?>
</option>
					<?php } ?>
				</select>	
			</div>
			<div class='form-item'>
				<label for='sn'>序列号/SN:</label>
				<input type='text' id='sn' name='sn'>
			</div>
			<div class='form-item end'>
				<input class='button primary' type='submit' name='submit' value='搜索'>
				<a class='button' href='<?php echo @constant('URL');?>
'>返回</a>
			</div>
		</form>
		
			<table class='table'>
				<tr><td>物品编号</td><td>厂商</td><td>型号</td><td>序列号/SN</td><td>供货商</td><td>库存数</td><td>出库数</td><td>操作</td></tr>
				<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myparts']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
				<form action='' method='post' class='form'>
				<tr><td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
"></td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['model'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['sn'];?>
</td><td>供货商</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</td><td><input type='number' name='outcount'/></td><td><input class='button small' type='submit' name='outgo' value='出库'></td></tr>
				</form>
				<?php } ?>
			</table>
		
	</div>
</div><?php }} ?>
