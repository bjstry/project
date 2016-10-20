<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-14 11:44:56
         compiled from "codes/T/default/SolutionAddPrice.html" */ ?>
<?php /*%%SmartyHeaderCode:187328625457ff63a84cf038-52802257%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41de90abab207b4860f5f71d56e464b0fc16d237' => 
    array (
      0 => 'codes/T/default/SolutionAddPrice.html',
      1 => 1476416676,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '187328625457ff63a84cf038-52802257',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ff63a84d7549_92373175',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ff63a84d7549_92373175')) {function content_57ff63a84d7549_92373175($_smarty_tpl) {?>				<div class='row'>
					<div class='col col-4'>
						<form action='' method='post'>
							<select name='class'>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myclass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['cname'];?>
</option>
								<?php } ?>
								<input class='col col-12' type='text' name='name' placeholder='请输入型号'>
								<input class='col col-12' type='text' name='price' placeholder='请输入价格'>
								<div>
									<input class='button primary small' type='submit' name='submit' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['subtype'];?>
'>
								</div>
							</select>
						</form>
					</div>
					<div class='col col-8'>
						<p>说明:</p>
						<p>intel系列酷睿CPU使用i前缀，例如i7 6770k的型号应该是i6770k,i3 6100的型号是i6100,志强系列使用E前缀，例如E5 2650 V4,型号为E2650V4，E3 1230 V5型号为E1230V5，注意区分大小写。</p>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div><?php }} ?>
