<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 14:33:14
         compiled from "codes/T/default/SolutionGetPrice.html" */ ?>
<?php /*%%SmartyHeaderCode:5440825595805b7d7d69c72-88291790%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c0844044659159252efd240e6a4fcdca044c912' => 
    array (
      0 => 'codes/T/default/SolutionGetPrice.html',
      1 => 1476772388,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5440825595805b7d7d69c72-88291790',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5805b7d7d71c21_56572684',
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5805b7d7d71c21_56572684')) {function content_5805b7d7d71c21_56572684($_smarty_tpl) {?>				<div class='row'>
					<div class='col col-3'>
						方案价格: <?php echo $_smarty_tpl->tpl_vars['prj']->value['price']['count'];?>
 
					</div>
					<div class='col col-3'>
						九折价格: <?php echo $_smarty_tpl->tpl_vars['prj']->value['price']['count']*0.9;?>
 
					</div>
					<div class='col col-3'>
						八折价格: <?php echo $_smarty_tpl->tpl_vars['prj']->value['price']['count']*0.8;?>
  
					</div>
					<div class='col col-3'>
						七折价格: <?php echo $_smarty_tpl->tpl_vars['prj']->value['price']['count']*0.7;?>
 
					</div>
					<div class='col col-12'>
						<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
