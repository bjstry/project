<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 15:10:08
         compiled from "codes/T/default/TechnologyPrjedit.html" */ ?>
<?php /*%%SmartyHeaderCode:68054397757ff059801d306-65189159%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2d854107b9c951a1131ca2826d1b2b5e2de0bb35' => 
    array (
      0 => 'codes/T/default/TechnologyPrjedit.html',
      1 => 1476342606,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '68054397757ff059801d306-65189159',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ff05980258d7_47777685',
  'variables' => 
  array (
    'prj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ff05980258d7_47777685')) {function content_57ff05980258d7_47777685($_smarty_tpl) {?>				<div class='col col-12'>
					<h4>编辑项目</h4>
				</div>
				<form action='' method='post'>
					<input type='text' name='prjname1' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['myprjs']['prjname1'];?>
' placeholder='请输入学校/单位名称'>
					<input type='text' name='prjname2' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['myprjs']['prjname2'];?>
' placeholder='请输入院系/部门'>
					<input type='text' name='prjcustomer' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['myprjs']['prjcustomer'];?>
' placeholder='请输入客户名称'>
					<input type='text' name='prjsaleman' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['myprjs']['prjsaleman'];?>
' placeholder='请输入业务姓名'>
					<input type='number' name='prjsalephone' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['myprjs']['prjsalephone'];?>
' placeholder='请输入业务电话'>
					<input type='text' name='prjstart' value='<?php echo $_smarty_tpl->tpl_vars['prj']->value['myprjs']['prjstart'];?>
' placeholder='项目开始时间'>
					<select name='prjstatus'>
						<option value=1>缺配件</option>
						<option value=2>组装中</option>
						<option value=3>系统软件安装</option>
						<option value=4>测试</option>
						<option value=5>待发货</option>
						<option value=6>物流运输中</option>
						<option value=7>已签收</option>
					</select>
					<input class='button small primary' type='submit' name='submit' value='修改'>
					<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>
