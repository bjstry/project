<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-08-15 11:51:48
         compiled from "codes/T/default/InstallIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:166183337157a69ca5a901c9-93689404%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4ee6134ad6b7483d3a7b76831efc8c7b14602215' => 
    array (
      0 => 'codes/T/default/InstallIndex.html',
      1 => 1471233020,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '166183337157a69ca5a901c9-93689404',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57a69ca5a91257_82339340',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57a69ca5a91257_82339340')) {function content_57a69ca5a91257_82339340($_smarty_tpl) {?><div class='row centered'>
	<div class='col col-3'>
		<br>
		<form action='<?php echo @constant('URL');?>
/Install/Check/type/steep1' method='post'>
			<h3>硕星库存系统-<small>使用协议</small></h3>
			<hr>
			<p>暂无...</p>
			<hr>
			<label class='form-item'>
				<input type='checkbox' id='check'>我同意用户使用协议
			</label>
			
			<div class='form-item'>
				<input class='button primary' type='submit' name='next' value='下一步'>
			</div>
		</form>
	</div>
</div><?php }} ?>
