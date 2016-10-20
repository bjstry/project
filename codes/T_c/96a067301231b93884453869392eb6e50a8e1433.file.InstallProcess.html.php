<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-15 11:18:49
         compiled from "codes/T/default/InstallProcess.html" */ ?>
<?php /*%%SmartyHeaderCode:7792962357a6e558ba41a5-98834721%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '96a067301231b93884453869392eb6e50a8e1433' => 
    array (
      0 => 'codes/T/default/InstallProcess.html',
      1 => 1471231106,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7792962357a6e558ba41a5-98834721',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a6e558bcd1a7_30999872',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a6e558bcd1a7_30999872')) {function content_57a6e558bcd1a7_30999872($_smarty_tpl) {?><br>
<div class='row centered'>
	<div class='col col-3'>
		<h3>硕星库存系统-<small>安装</small></h3>
		<hr>
		<br>
		<form class='form' action='<?php echo @constant('URL');?>
/Install/Check/type/steep2' method='post'>
			<div class='form-item'>
				<label for='dbhost'>服务器:</label>
				<input type='text' id='dbhost' name='dbhost' placeholder='localhost'>
			</div>
			<div class='form-item'>
				<label for='dbname'>数据库名:</label>
				<input type='text' id='dbname' name='dbname' placeholder='data'>
			</div>
			<div class='form-item'>
				<label for='dbuser'>用户:</label>
				<input type='text' id='dbuser' name='dbuser' placeholder='root'>
			</div>
			<div class='form-item'>
				<label for='dbpass'>密码:</label>
				<input type='password' id='dbpass' name='dbpass' placeholder='***'>
			</div>
			<div class='form-item'>
				<label for='dbprefix'>数据库前缀:</label>
				<input type='text' id='dbprefix' name='dbprefix' placeholder='sys_'>
			</div>
			<div class='form-item'>
				<button>重置</button>
				<input class='button primary' type='submit' name='submit' value='下一步'>
			</div>
		</form>
	</div>	
</div><?php }} ?>
