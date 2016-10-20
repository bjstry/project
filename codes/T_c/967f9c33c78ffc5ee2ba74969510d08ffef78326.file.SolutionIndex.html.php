<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-20 15:26:03
         compiled from "codes/T/default/SolutionIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:108686440457ce74f2ed6ad3-18395668%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '967f9c33c78ffc5ee2ba74969510d08ffef78326' => 
    array (
      0 => 'codes/T/default/SolutionIndex.html',
      1 => 1476948358,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '108686440457ce74f2ed6ad3-18395668',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_57ce74f2efbfe3_09011469',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_57ce74f2efbfe3_09011469')) {function content_57ce74f2efbfe3_09011469($_smarty_tpl) {?>
		<form action='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/GetPrice' method='post'>
			<div class='row'>
				<div class='col col-12'>
					<div>
						<h5>请选择送货地址：</h5>
						<label><input type='radio' checked="checked" name='city' value=0 />本地</label>
						<label><input type='radio' name='city' value=800 />外省</label>
					</div>
					<div>
						<h5>请选择机箱类型：</h5>
						<label><input type='radio' name='boxtype' value=1 />塔式</label>
						<label><input type='radio' checked="checked" name='boxtype' value=2 />机架式</label>
					</div>
					<div>
						<h5>请选择产品系列：</h5>
						<label><input type='radio' name='product_type' value='p' />星蕴P系列</label>
						<label><input type='radio' name='product_type' value='w' />星蕴W系列</label>
						<label><input type='radio' checked="checked" name='product_type' value='s' />星蕴S系列</label>
					</div>
					<div id='cputype'>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['scpu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<div>
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
' /><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</label> 
						</div>
						<?php } ?>
					</div>
					<div id='pccpu' class='hidden'>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['pccpu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<div>
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
' /><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</label> 
						</div>
						<?php } ?>
					</div>
					
					<div id='wcpu' class='hidden'>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['wcpu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<div>
							<label><input type='radio' name='cputype' value=<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</label> 
						</div>
						<?php } ?>
					</div>
					<div id='scpu' class='hidden'>
						<?php  $_smarty_tpl->tpl_vars['val'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['val']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['prj']->value['scpu']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['val']->key => $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
?>
						<div>
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['price'];?>
' /><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</label> 
						</div>
						<?php } ?>
					</div>
					<div id='pcmem' class='hidden'>
						<h5>请选择内存大小：</h5>
		
						
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48GPC']['price'];?>
 />8GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48GPC']['price']*2;?>
 />16GB</label>
						<label><input type='radio' checked='checked' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48GPC']['price']*4;?>
 />32GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48GPC']['price']*8;?>
 />64GB</label>
					</div>
					<div id='wsmem' class='hidden'>
						<h5>请选择内存大小：</h5>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*2;?>
 />32GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*4;?>
 />64GB</label>
						<label><input type='radio' checked='checked' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*8;?>
 />128GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*16;?>
 />256GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D432G']['price']*16;?>
 />512GB</label>
					</div>
					<div id='memsize'>
						<h5>请选择内存大小：</h5>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*2;?>
 />32GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*4;?>
 />64GB</label>
						<label><input type='radio' checked='checked' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*8;?>
 />128GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['price']*16;?>
 />256GB</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D432G']['price']*16;?>
 />512GB</label>
					</div>
					<div>
						<h5>请选择固态硬盘大小：</h5>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S128']['price'];?>
 />128GB</label>
						<label><input type='radio' checked="checked" name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S256']['price'];?>
 />256GB</label>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S512']['price'];?>
 />512GB</label>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S1T']['price'];?>
 />1024GB</label>
						<label><input type='radio' name='ssdsize' value=0 />不需要</label>
					</div>
					<div id='hddtype1'>
						<h5>请选择单块硬盘大小：</h5>
						<label><input type='radio' name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H1T']['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H1T']['info'];?>
</label>
						<label><input type='radio' checked="checked" name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H2T']['price'];?>
 />2TB</label>
						<label><input type='radio' name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H4T']['price'];?>
 />4TB</label>
						<label><input type='radio' name='hddsize' value='0' />不需要</label>
					</div>
					<div id='hddtype2' class='hidden'>
						<h5>请选择单块硬盘大小：</h5>
						<label><input type='radio' checked="checked" name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['E2T']['price'];?>
 />2TBe</label>
						<label><input type='radio' name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['E4T']['price'];?>
 />4TBe</label>
						<label><input type='radio' name='hddsize' value='0' />不需要</label>
					</div>
					<div id='hddtype'>
						<h5>请选择硬盘类型：</h5>
						<label><input type='radio' checked="checked" name='hddtype' value='1' />桌面级</label>
						<label><input type='radio' name='hddtype' value='2' />企业级</label>
					</div>
					<div id='hddcount'>
						<h5>请选择硬盘数量：</h5>
						<label><input type='number' name='hddcount' value=1 />块</label>
					</div>
					<div id='needotg'>
						<h5>请选择独显：</h5>
						<label><input type='radio' name='otg' value='0' />使用集显</label>
						<label><input type='radio' checked="checked" name='otg' value='1' />使用独显</label>
					</div>
					<div id='gtype'>
						<h5>独显类型：</h5>
						<label><input type='radio' checked="checked" name='gtype' value='0' />普通卡</label>
						<label><input type='radio' name='gtype' value='1' />专业卡</label>
					</div>
					<div id='ggtype'>
						<h5>请选择独显：</h5>
						<label><input type='radio' checked="checked" name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GT740']['price'];?>
 />GT740</label>
						<label><input type='radio' name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1060']['price'];?>
 />GTX1060</label>
						<label><input type='radio' name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1070']['price'];?>
 />GTX1070</label>
						<label><input type='radio' name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1080']['price'];?>
 />GTX1080</label>
					</div>
					<div id='ogtype' class='hidden'>
						<h5>请选择独显：</h5>
						<label><input type='radio' checked="checked" name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K620']['price'];?>
 />K620</label>
						<label><input type='radio' name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K2200']['price'];?>
 />K2200</label>
						<label><input type='radio' name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K6000']['price'];?>
 />K6000</label>
						<label><input type='radio' name='card' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['M6000']['price'];?>
 />M6000</label>
					</div>
					<div id='otgcount'>
						<h5>请选择显卡数量：</h5>
						<label><input type='number' name='otgcount' value=1 />块</label>
					</div>
					<div id='powertype'>
						<h5>请选择电源大小：</h5>
						<label><input type='radio' checked="checked" name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W550']['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W550']['info'];?>
</label>
						<label><input type='radio' name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W750']['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W750']['info'];?>
</label>
						<label><input type='radio' name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W1000']['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W1000']['info'];?>
</label>
					</div>
					<div id='displaytype'>
						<h5>请选择显示器：</h5>
						<label><input type='radio' checked="checked" name='dispirce' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN23']['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN23']['info'];?>
</label>
						<label><input type='radio' name='dispirce' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN27']['price'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN27']['info'];?>
</label>
						<label><input type='radio' name='dispirce' value=0 />无</label>
					</div>
					<input class='button small primary' type='submit' name='submit' value='计算价格'>
					<a class='button small' href='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
'>返回</a>
				</div>
			</div>
		</form>
	</div>
</div>
	</div>
</div><?php }} ?>
