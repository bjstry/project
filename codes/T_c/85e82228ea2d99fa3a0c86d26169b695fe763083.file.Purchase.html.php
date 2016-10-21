<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-21 02:24:04
         compiled from "codes/T/default/theme/Purchase.html" */ ?>
<?php /*%%SmartyHeaderCode:213194069158090bc4476ce0-77451368%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '85e82228ea2d99fa3a0c86d26169b695fe763083' => 
    array (
      0 => 'codes/T/default/theme/Purchase.html',
      1 => 1476248868,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '213194069158090bc4476ce0-77451368',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_58090bc44a45a4_93269185',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_58090bc44a45a4_93269185')) {function content_58090bc44a45a4_93269185($_smarty_tpl) {?><div class='row centered'>
		<div class='col col-8'>
			<div class='text-center'>
				<h3 class='depart-title'>硕星内部系统-采购部</h3>
				<hr>
			</div>
			<div class='row'>
				<div class='col col-3'>
					<div id="my-collapse" class='collapse'>
						<ul>
							<li><a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>首页</a></li>
							<li><a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/Outgo'>出库</a></li>
							<li><a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/Add'>入库</a></li>
							<?php echo $_smarty_tpl->tpl_vars['prj']->value['logs'];?>

							<li><a href='<?php echo @constant('URL');?>
'>返回功能区</a></li>
						</ul>
					</div>
				</div>
				<div class='col col-9'>
					<div class='row'>
<?php }} ?>
