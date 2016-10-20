<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 16:36:24
         compiled from "codes/T/default/TechnologyProjectInfo.html" */ ?>
<?php /*%%SmartyHeaderCode:24561567457fe15d04a3a90-31793690%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4663ba46422414e5af33b618498033331b6ba839' => 
    array (
      0 => 'codes/T/default/TechnologyProjectInfo.html',
      1 => 1476779783,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '24561567457fe15d04a3a90-31793690',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fe15d04ab904_66479663',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fe15d04ab904_66479663')) {function content_57fe15d04ab904_66479663($_smarty_tpl) {?>			<div class='row'>
				<div class='col col-12'>
					<h4><?php echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['prjname1'];
echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['prjcustomer'];?>
 &nbsp;<small>项目开始时间: <?php echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['prjstart'];?>
</small> &nbsp;<a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/Prjedit/pid/<?php echo $_GET['pid'];?>
'><?php echo $_smarty_tpl->tpl_vars['prj']->value['edit'];?>
</a>&nbsp;<a onClick=window.print() href=''><small>打印</small></a></h4>
				</div>
				<div class='col col-3'>
					目前状态: <?php echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['prjstatus'];?>

				</div>
				<div class='col col-3'>
					业务姓名: <?php echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['prjsaleman'];?>

				</div>
				<div class='col col-3'>
					联系电话: <?php echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['prjsalephone'];?>

				</div>
				<div class='col col-3'>
					项目负责人: <?php echo $_smarty_tpl->tpl_vars['prj']->value['myprj']['uid'];?>

				</div>
				<div class='col col-12'>
					<br>
					<h5>操作记录</h5>
					20161012 硬件出库，缺少主板
					<br>20161013 硬件出库完成，开始组装
					<br>20161014 硬件组装完成，开始安装windows操作系统，安装ansys软件
				</div>
				<div class='col col-12'>
					<br>
					<h5>配件列表</h5>
					<table class='table'>
						<tr><td>物品编号</td><td>厂商</td><td>型号</td><td>序列号/SN</td><td>数量</td><td>出库人</td><td>出库时间</td><td>检测结果</td></tr>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myparts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<form action='' method='post' class='form'>
						<tr><td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
"></td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['model'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['sn'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</td><td>123</td><td>出库</td><td>合格</td></tr>
						</form>
						<?php } ?>
					</table>
					<a class='button small' href='<?php echo $_smarty_tpl->tpl_vars['prj']->value['backurl'];?>
'>返回</a>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
