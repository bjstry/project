<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 21:18:02
         compiled from "codes/T/default/IndexLogin.html" */ ?>
<?php /*%%SmartyHeaderCode:944875705808c40a5a7689-40211952%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '53c450867092a505d31d8bc23fcba9a3fc64b6ab' => 
    array (
      0 => 'codes/T/default/IndexLogin.html',
      1 => 1474361206,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '944875705808c40a5a7689-40211952',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808c40a5adb66_76748242',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808c40a5adb66_76748242')) {function content_5808c40a5adb66_76748242($_smarty_tpl) {?>		<div class='row centered'>
			<div class='col col-3'>
				<h3>硕星管理系统-<small>登陆</small></h3>
				<hr>
				<form action='<?php echo @constant('URL');?>
/Index/LoginCheck' method='post' class='form'>
					<div class='form-item'>
						<label for='uname'>用户:</label>
						<input type='text' id='uname' name='uname' placeholder='Username'>
					</div>
					<div class='form-item'>
						<label for='upass'>密码:</label>
						<input type='password' id='upass' name='upass' placeholder='Password'>
					</div>
					<div class='form-item text-right'>
						<input class='button primary' type='submit' name='logincheck' value='登陆'>
					</div>
				</form>
			</div>
		</div><?php }} ?>
