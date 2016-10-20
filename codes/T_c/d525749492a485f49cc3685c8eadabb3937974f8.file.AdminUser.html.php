<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 15:08:35
         compiled from "codes/T/default/AdminUser.html" */ ?>
<?php /*%%SmartyHeaderCode:208677714957fb4abfaa7112-29229999%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd525749492a485f49cc3685c8eadabb3937974f8' => 
    array (
      0 => 'codes/T/default/AdminUser.html',
      1 => 1476774505,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '208677714957fb4abfaa7112-29229999',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fb4abfaaf345_44223318',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fb4abfaaf345_44223318')) {function content_57fb4abfaaf345_44223318($_smarty_tpl) {?>		<div class='row'>
			<div class='col col-12'>
				<nav class="tabs" data-component="tabs" data-equals="true">
				    <ul>
				        <li class="active"><a href="#userAdd">添加账号</a></li>
				        <li><a href="#userEdit">账号列表</a></li>
				    </ul>
				</nav>
				
				<div id="userAdd">
					<form action='' method='post'>
						<input type='text' name='uname' placeholder='请输入用户名'>
						<input type='text' name='upass' placeholder='请输入密码'>
						<input type='email' name='uemail' placeholder='请输入邮箱'>
						<input type='number' name='uphone' placeholder='请输入电话'>
						<input type='text' name='urename' placeholder='请输入真实姓名'>
						<select name='udepart'>
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['departs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<option value='<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</option>
							<?php } ?>
						</select>
						<label><input type='radio' name='ulevel' value='0' />主管</label>
						<label><input type='radio' name='ulevel' checked="checked" value='1' />员工</label>
						<input class='button' type='submit' name='submit' value='添加'>
					</form>
				</div>
				<div id="userEdit">
					<table class='flat'>
						<tbody>
							<tr><th>ID</th><th>姓名</th><th>账号</th><th>邮箱</th><th>联系方式</th><th>操作</th></tr>
							<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['users']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
							<tr><td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['urename'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['uname'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['umail'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['uphone'];?>
</td><td><a href='<?php echo @constant('URL');?>
/Admin/UserChange'>编辑</a></td></tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
