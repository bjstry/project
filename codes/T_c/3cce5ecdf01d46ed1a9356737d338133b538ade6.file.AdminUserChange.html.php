<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-10 21:01:51
         compiled from "codes/T/default/AdminUserChange.html" */ ?>
<?php /*%%SmartyHeaderCode:23898538457fb782cb3bcc9-55577207%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3cce5ecdf01d46ed1a9356737d338133b538ade6' => 
    array (
      0 => 'codes/T/default/AdminUserChange.html',
      1 => 1476104510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '23898538457fb782cb3bcc9-55577207',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fb782cb43b48_39658098',
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fb782cb43b48_39658098')) {function content_57fb782cb43b48_39658098($_smarty_tpl) {?>
				<h3>硕星管理系统-<small>修改资料</small></h3>
				<hr>
				<form action='' method='post' class='form'>
					<div class='form-item'>
						<label for='uname'>用户:</label>
						<input type='text' id='uname' name='uname' value="<?php echo $_smarty_tpl->tpl_vars['prj']->value['user']['uname'];?>
" disabled>
					</div>
					<div class='form-item'>
						<label for='oldupass'>旧密码:</label>
						<input type='text' id='oldupass' name='oldupass' placeholder='Password'>
					</div>
					<div class='form-item'>
						<label for='newupass'>新密码:</label>
						<input type='password' id='newupass' name='newupass' placeholder='Password'>
					</div>
					<div class='form-item'>
						<label for='newreupass'>重复密码:</label>
						<input type='password' id='newreupass' name='newreupass' placeholder='Password'>
					</div>
					<div class='form-item'>
						<label for='uemail'>邮箱:</label>
						<input type='text' id='uemail' name='uemail' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['user']['umail'];?>
'>
					</div>
					<div class='form-item'>
						<label for='uphone'>联系方式:</label>
						<input type='text' id='uphone' name='uphone' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['user']['uphone'];?>
'>
					</div>
					<div class='form-item'>
						<label for='urename'>真实姓名:</label>
						<input type='text' id='urename' name='urename' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['user']['urename'];?>
'>
					</div>
					<div class='form-item text-right'>
						<input class='button primary' type='submit' name='submit' value='修改'>
					</div>
				</form>
		</div>
	</div><?php }} ?>
