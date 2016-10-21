<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 21:55:20
         compiled from "codes/T/default/SolutionPartPrice.html" */ ?>
<?php /*%%SmartyHeaderCode:5606124675808ccc886bcf2-90834180%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a875c6b2f2091f75a660d1ae3fed3749f5a5fcac' => 
    array (
      0 => 'codes/T/default/SolutionPartPrice.html',
      1 => 1476756506,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5606124675808ccc886bcf2-90834180',
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
  'unifunc' => 'content_5808ccc8979cc7_25949555',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808ccc8979cc7_25949555')) {function content_5808ccc8979cc7_25949555($_smarty_tpl) {?>
				<div class='row'>
					<div class='col col-12'>
						CPU
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mycpuprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
		
					<div class='col col-12'>
						主板、内存
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myboardprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
				
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mymemprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
			
					<div class='col col-12'>
						硬盘
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mydiskprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
					<div class='col col-12'>
						显卡
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mycardprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
			
					<div class='col col-12'>
						电源
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mypowerprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
					<div class='col col-12'>
						机箱、显示器
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myboxprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
			
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myvgaprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
					<div class='col col-12'>
						散热器、键鼠、光驱
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mysrqprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>

					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mymouseprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>

					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mydvdprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
					<div class='col col-12'>
						交换机、路由及其他配件
					</div>
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['mynetprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
					
					<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['myoprice']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
					<div class='col col-1'>
						<form action='' method='post'><input class='text-center' type='submit' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
" name='submit'><input type='text' value="<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
" name="<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
"><div class='partinfo'><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</div></form>
					</div>
					<?php } ?>
				</div>
				<div class='message success' id='my-message'>添加成功！</div>
				<button data-component='message' data-target='#my-message'>测试</button>
			</div>
		</div>
	</div>
</div><?php }} ?>
