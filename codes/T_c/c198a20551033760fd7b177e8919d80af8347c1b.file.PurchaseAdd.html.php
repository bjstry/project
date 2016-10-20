<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-12 11:52:38
         compiled from "codes/T/default/PurchaseAdd.html" */ ?>
<?php /*%%SmartyHeaderCode:6436996857dfae0ae1a011-41251298%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c198a20551033760fd7b177e8919d80af8347c1b' => 
    array (
      0 => 'codes/T/default/PurchaseAdd.html',
      1 => 1476244356,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '6436996857dfae0ae1a011-41251298',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57dfae0ae50530_80610606',
  'variables' => 
  array (
    'prj' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57dfae0ae50530_80610606')) {function content_57dfae0ae50530_80610606($_smarty_tpl) {?>			<div class='col col-12'>
			<h3>硕星配件入库</h3>
				<form action='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/AddCheck' method='post'>
					<div class='row'>
						<div class='form-item col col-6'>
							<label>类型:</label>
							<select name='type'>
								<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myclass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
									<option value=<?php echo $_smarty_tpl->tpl_vars['value']->value['cid'];?>
><?php echo $_smarty_tpl->tpl_vars['value']->value['cname'];?>
</option>
								<?php } ?>
							</select>		
						</div>
						<div class='form-item col col-12'>
							<label>厂商:</label>
								<input wdith=100% name='name' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>型号:</label>
								<input name='model' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>SN:</label>
							<input name='sn' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>容量/主频/尺寸:</label>
								<input name='cap' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>单位:</label>
							<input name='cap_type' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>供货商:</label>
							<input name='sup' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>价格:</label>
							<input name='price' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>数量:</label>
							<input name='count' type='number'>
						</div>
						<div class='form-item col col-12'>
							<label>入库时间:</label>
							<input name='indate' type='text'>
						</div>
						<div class='form-item col col-12'>
							<label>备注:</label>
							<input name='remark' type='text'>
						</div>
						<div class='form-item col col-12 text-right'>
							<br>
							<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
							<input class='button small primary' type='submit' name='add' value='提交'>
						</div>
					</div>
					
				</form>
			</div>
			</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
