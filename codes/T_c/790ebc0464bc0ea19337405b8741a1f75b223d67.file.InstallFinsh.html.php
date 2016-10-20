<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-15 11:19:01
         compiled from "codes/T/default/InstallFinsh.html" */ ?>
<?php /*%%SmartyHeaderCode:84341682457a6e2070ccf89-76402764%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '790ebc0464bc0ea19337405b8741a1f75b223d67' => 
    array (
      0 => 'codes/T/default/InstallFinsh.html',
      1 => 1471231115,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '84341682457a6e2070ccf89-76402764',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a6e2070ef0d3_13773210',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a6e2070ef0d3_13773210')) {function content_57a6e2070ef0d3_13773210($_smarty_tpl) {?><div class='row centered'>
	<div class='col col-3'>
		<br>
		<h3>设置管理员账号</h3>
		<hr>
		<form class='form' action='<?php echo @constant('URL');?>
/Install/Check/type/steep3' method='post'>
			<div class='form-item'>
				<label for='uname'>
					账户:
				</label>
				<input type='text' id='uname' name='uname'>
			</div>
			<div class='form-item'>
				<label for='upass'>
					密码:
				</label>
				<input type='password' id='upass' name='upass'>
			</div>
			<div class='form-item'>
				<label for='reupass'>
					重复密码:
				</label>
				<input type='password' id='reupass' name='reupass'>
			</div>
			<div class='form-item'>
				<label for='umail'>
					邮箱:
				</label>
				<input type='email' id='umail' name='umail'>
			</div>
			<div class='form-item'>
				<button>清除</button>
				<input type='submit' class='button primary' name='submit' value='完成'>
			</div>
		</form>
	</div>
</div><?php }} ?>
