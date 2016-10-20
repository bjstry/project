<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-09-20 21:23:23
         compiled from "codes/T/default/IndexLogin.html" */ ?>
<?php /*%%SmartyHeaderCode:207955545857a43f50eb84a9-86724582%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
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
  'nocache_hash' => '207955545857a43f50eb84a9-86724582',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a43f50edc093_23817729',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a43f50edc093_23817729')) {function content_57a43f50edc093_23817729($_smarty_tpl) {?>		<div class='row centered'>
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
