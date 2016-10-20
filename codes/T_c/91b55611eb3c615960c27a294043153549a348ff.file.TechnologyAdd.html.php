<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-12 18:27:50
         compiled from "codes/T/default/TechnologyAdd.html" */ ?>
<?php /*%%SmartyHeaderCode:152309657157fdb192413666-16028812%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '91b55611eb3c615960c27a294043153549a348ff' => 
    array (
      0 => 'codes/T/default/TechnologyAdd.html',
      1 => 1476268068,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '152309657157fdb192413666-16028812',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fdb19241b7e3_74460648',
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fdb19241b7e3_74460648')) {function content_57fdb19241b7e3_74460648($_smarty_tpl) {?>				<div class='col col-12'>
					<h4>创建项目</h4>
				</div>
				<form action='' method='post'>
					<input type='text' name='prjname1' placeholder='请输入学校/单位名称'>
					<input type='text' name='prjname2' placeholder='请输入院系/部门'>
					<input type='text' name='prjcustomer' placeholder='请输入客户名称'>
					<input type='text' name='prjsaleman' placeholder='请输入业务姓名'>
					<input type='number' name='prjsalephone' placeholder='请输入业务电话'>
					<input type='text' name='prjstart' placeholder='项目开始时间'>
					<input class='button small primary' type='submit' name='submit' value='添加'>
					<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
				</form>
			</div>
		</div>
	</div>
</div><?php }} ?>
