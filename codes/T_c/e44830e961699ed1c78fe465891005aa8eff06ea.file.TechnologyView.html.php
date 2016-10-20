<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-13 08:49:46
         compiled from "codes/T/default/TechnologyView.html" */ ?>
<?php /*%%SmartyHeaderCode:107631107557fde6f569daa8-12625291%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e44830e961699ed1c78fe465891005aa8eff06ea' => 
    array (
      0 => 'codes/T/default/TechnologyView.html',
      1 => 1476319785,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '107631107557fde6f569daa8-12625291',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57fde6f56ccd17_34637633',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57fde6f56ccd17_34637633')) {function content_57fde6f56ccd17_34637633($_smarty_tpl) {?>
				<table class='table'>
									<tr><td>配件编号</td><td>厂商</td><td>型号</td><td>序列号/SN</td><td>供货商</td><td>数量</td><td>项目</td><td>负责人</td></tr>
									<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myparts']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
									<tr><td><?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
"><input type="hidden" name="cid" value="<?php echo $_smarty_tpl->tpl_vars['val']->value['cid'];?>
"></td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['model'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['sn'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['supplier'];?>
</td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['count'];?>
</td><td><a href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/GetParts/pid/<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
'><?php echo $_smarty_tpl->tpl_vars['val']->value['project'];?>
</a></td><td><?php echo $_smarty_tpl->tpl_vars['val']->value['incharge'];?>
</td></tr>
									<?php } ?>
								</table>
								<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
				</div>
			</div>
		</div>
	</div>
</div><?php }} ?>
