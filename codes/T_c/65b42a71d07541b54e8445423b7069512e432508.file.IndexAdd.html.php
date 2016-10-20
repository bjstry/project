<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-02 16:14:27
         compiled from "codes/T/default/IndexAdd.html" */ ?>
<?php /*%%SmartyHeaderCode:102800241257a465a386dd64-75193479%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65b42a71d07541b54e8445423b7069512e432508' => 
    array (
      0 => 'codes/T/default/IndexAdd.html',
      1 => 1472803712,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '102800241257a465a386dd64-75193479',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a465a38c8268_46272631',
  'variables' => 
  array (
    'myclass' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a465a38c8268_46272631')) {function content_57a465a38c8268_46272631($_smarty_tpl) {?>
		<br>
		<div class='row centered'>
			<div class='col col-4'>
			<h3>硕星配件入库</h3>
				<form action='<?php echo @constant('URL');?>
/Index/AddCheck' method='post'>
					<div class='row'>
						<div class='form-item col col-6'>
							<label>类型:</label>
							<select name='type'>
								<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['myclass']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
									<option value=<?php echo $_smarty_tpl->tpl_vars['value']->value['cid'];?>
><?php echo $_smarty_tpl->tpl_vars['value']->value['cname'];?>
</option>
								<?php } ?>
							</select>		
						</div>
						<div class='form-item col col-6'>
							<label>厂商:</label>
								<input name='name' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>型号:</label>
								<input name='model' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>SN:</label>
							<input name='sn' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>容量/主频/尺寸:</label>
								<input name='cap' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>单位:</label>
							<input name='cap_type' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>供货商:</label>
							<input name='sup' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>价格:</label>
							<input name='price' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>数量:</label>
							<input name='count' type='number'>
						</div>
						<div class='form-item col col-6'>
							<label>入库时间:</label>
							<input name='indate' type='text'>
						</div>
						<div class='form-item col col-6'>
							<label>备注:</label>
							<input name='remark' type='text'>
						</div>
						<div class='form-item col col-12 text-right'>
							<br>
							<a class='button' href='<?php echo @constant('URL');?>
'>返回</a>
							<input class='button primary' type='submit' name='add' value='提交'>
						</div>
					</div>
				</form>
			</div>
		</div><?php }} ?>
