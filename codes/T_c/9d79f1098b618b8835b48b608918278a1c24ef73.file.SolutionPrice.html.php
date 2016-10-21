<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 22:08:40
         compiled from "codes/T/default/SolutionPrice.html" */ ?>
<?php /*%%SmartyHeaderCode:2112401395808cfe89492e3-33095722%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9d79f1098b618b8835b48b608918278a1c24ef73' => 
    array (
      0 => 'codes/T/default/SolutionPrice.html',
      1 => 1476441985,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2112401395808cfe89492e3-33095722',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808cfe8969220_54426540',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808cfe8969220_54426540')) {function content_5808cfe8969220_54426540($_smarty_tpl) {?>				<div class='row'>
					<div class='col col-4'>
						<form action='' method='post'>
							<select name='class'>
								<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myclass']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
								<option value='<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['cname'];?>
</option>
								<?php } ?>
								<input class='col col-12' type='text' name='name' placeholder='请输入型号'>
								<input class='col col-12' type='text' name='price' placeholder='请输入价格'>
								<input class='col col-12' type='text' name='info' placeholder='请输入描述'>
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
