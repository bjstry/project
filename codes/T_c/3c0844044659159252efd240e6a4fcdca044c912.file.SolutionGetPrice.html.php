<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-21 01:49:55
         compiled from "codes/T/default/SolutionGetPrice.html" */ ?>
<?php /*%%SmartyHeaderCode:14486873465808d6d9bbe7b2-40656558%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c0844044659159252efd240e6a4fcdca044c912' => 
    array (
      0 => 'codes/T/default/SolutionGetPrice.html',
      1 => 1476985792,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14486873465808d6d9bbe7b2-40656558',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808d6d9be5490_31669360',
  'variables' => 
  array (
    'prj' => 0,
    'key' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808d6d9be5490_31669360')) {function content_5808d6d9be5490_31669360($_smarty_tpl) {?>				<div class='row'>
					<div class='col col-12'>
						<div>
							<table class='talbe'>
								<tr>
									<th>配件</th><th>型号</th><th>数量</th><th>单价(元)</th><th>合计(元)</th>
								</tr>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['price']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['val']->key;
?>
								<tr><td><?php echo $_smarty_tpl->tpl_vars['key']->value;?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['price']*$_smarty_tpl->tpl_vars['val']->value['count'];?>
</td></tr>
								<?php } ?>
							</table>
						</div>
					</div>
					<div class='col col-3'>
						方案价: <?php echo $_smarty_tpl->tpl_vars['prj']->value['money'];?>
 元
					</div>
					<div class='col col-3'>
						九折价: <?php echo $_smarty_tpl->tpl_vars['prj']->value['money']*0.9;?>
 元
					</div>
					<div class='col col-3'>
						八折价: <?php echo $_smarty_tpl->tpl_vars['prj']->value['money']*0.8;?>
 元
					</div>
					<div class='col col-3'>
						七折价: <?php echo $_smarty_tpl->tpl_vars['prj']->value['money']*0.7;?>
 元
					</div>
					
					<div class='col col-12'>
						<br>
						<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
