<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 15:04:25
         compiled from "codes/T/default/AdminPclass.html" */ ?>
<?php /*%%SmartyHeaderCode:188694124657faf6eba3bc56-83580907%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e337b1f6e5630471c47b733cde719e17d0162b4e' => 
    array (
      0 => 'codes/T/default/AdminPclass.html',
      1 => 1476774173,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '188694124657faf6eba3bc56-83580907',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57faf6eba64d39_81342679',
  'variables' => 
  array (
    'prj' => 0,
    'value' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57faf6eba64d39_81342679')) {function content_57faf6eba64d39_81342679($_smarty_tpl) {?>		<div class='row'>
			<div class='col col-12'>
				<div id='tabs' class='tabs' data-component="tabs">
					<ul>
						<li><a href='#manager'>管理</a></li>
						<li><a href='#add'>添加</a></li>
					</ul>
				<div>
				<table id='manager'>
					<tr><td class='col col-8'>分类名称</td><td colspan=2 class='col col-2'><center>操作</center></td></tr>
					<?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myclass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
?>
					<form action='' method='post' class='form'>
					<tr><td><?php echo $_smarty_tpl->tpl_vars['value']->value['cname'];?>
<input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['cid'];?>
"></td><td><!--<input name='edit' value='编辑' type='submit' class='button small outline'/></td><td>--><input name='delete' value='删除' type='submit' class='button small primary'/></td></tr>
					</form>
					<?php } ?>
				</table>
				<form id='add' class='form' method='post' action='<?php echo @constant('URL');?>
/Admin/CreateCheck'>
					<div class='form-item'>
						<label for='fclass'>父类</label>
						<select name='fid'>
							<option value=0>无父类</option>
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
					<div class='form-item'>
						<label for='cname'>分类名称</label>
						<input type='text' id='cname' name='cname'>
					</div>
					<div class='form-item'>
						<label for='department'>部门</label>
						<select name='gid'>
							<option value=1>采购部门</option>
							<option value=2>行政部门</option>
						</select>
					</div>
					<div class='form-item end'>
						<input class='button small primary' type='submit' name='submit' value='添加分类'>
					</div>
				</form>
				<form action='' method='post'>
					<input class='button outline' type='submit' name='index' value='返回'>
				</form>
			</div>
		</div>
	</div>
</div>
		<?php }} ?>
