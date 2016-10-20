<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-18 16:30:54
         compiled from "codes/T/default/TechnologyProjectManager.html" */ ?>
<?php /*%%SmartyHeaderCode:163826201957fdb23e7e4511-81707468%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8a9f9a2787422afa07e75bbc266564b9cd0c1998' => 
    array (
      0 => 'codes/T/default/TechnologyProjectManager.html',
      1 => 1476779450,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '163826201957fdb23e7e4511-81707468',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fdb23e7ec550_49113618',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fdb23e7ec550_49113618')) {function content_57fdb23e7ec550_49113618($_smarty_tpl) {?>
				<table class='table'>
									<tr><td>项目编号</td><td>项目名称</td><td>学校</td><td>学院/系</td><td>客户姓名</td><td>业务姓名</td><td>业务电话</td><td>项目负责人</td><td>状态</td></tr>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myprojects']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
									<tr><td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['prjname1'];
echo $_smarty_tpl->tpl_vars['val']->value['prjcustomer'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['prjname1'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['prjname2'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['prjcustomer'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['prjsaleman'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['prjsalephone'];?>
</td><d><td><?php echo $_smarty_tpl->tpl_vars['val']->value['uid'];?>
</td><td><a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/ProjectInfo/pid/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['prjstatus'];?>
</a></td></tr>
									<?php } ?>
								</table>
								<a class='button small' href='<?php echo $_smarty_tpl->tpl_vars['prj']->value['backurl'];?>
'>返回</a>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
