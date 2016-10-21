<?php /* Smarty version Smarty-3.1.21-dev, created on 2016-10-21 02:19:32
         compiled from "codes/T/default/SolutionIndex.html" */ ?>
<?php /*%%SmartyHeaderCode:12848346065808c413b21136-93716618%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '967f9c33c78ffc5ee2ba74969510d08ffef78326' => 
    array (
      0 => 'codes/T/default/SolutionIndex.html',
      1 => 1476987519,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12848346065808c413b21136-93716618',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.21-dev',
  'unifunc' => 'content_5808c413c27f47_88047717',
  'variables' => 
  array (
    'prj' => 0,
    'val' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5808c413c27f47_88047717')) {function content_5808c413c27f47_88047717($_smarty_tpl) {?>
		<form action='<?php echo @constant('URL');?>
/<?php echo $_GET['c'];?>
/GetPrice' method='post'>
			<div class='row'>
				<div class='col col-12'>
					<div>
						<h5>请选择送货地址：</h5>
						<label><input type='radio' checked="checked" name='city' value=0 />本地</label>
						<label><input type='radio' name='city' value=300 />外省</label>
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
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
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
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
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
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
' /><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
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
							<label><input type='radio' name='cputype' value='<?php echo $_smarty_tpl->tpl_vars['val']->value['name'];?>
' /><?php echo $_smarty_tpl->tpl_vars['val']->value['info'];?>
</label> 
						</div>
						<?php } ?>
					</div>
					<div id='pcmem' class='hidden'>
						<h5>请选择内存大小：</h5>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D44GPC']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D44GPC']['info'];?>
</label>
						<label><input type='radio' checked='checked' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48GPC']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48GPC']['info'];?>
</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416GPC']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416GPC']['info'];?>
</label>
					</div>
					<div id='memsize'>
						<h5>请选择内存大小：</h5>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D48G']['info'];?>
</label>
						<label><input type='radio' checked='checked' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['info'];?>
</label>
						<label><input type='radio' name='memsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D416G']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['D432G']['info'];?>
</label>
					</div>
					<div id='memcount'>
						<h5>请选择内存数量：</h5>
						<label><input type='number' name='memcount' value=1 />条</label>
					</div>
					<div id='ssdsize'>
						<h5>请选择固态硬盘：</h5>
						<label><input type='radio' checked="checked" name='ssdsize' value=0 />不需要</label>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S128']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S128']['info'];?>
</label>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S256']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S256']['info'];?>
</label>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S512']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S512']['info'];?>
</label>
						<label><input type='radio' name='ssdsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S1T']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['S1T']['info'];?>
</label>
					</div>
					<div id='ssdcount' class='hidden'>
						<h5>请选择数量：</h5>
						<label><input type='number' name='ssdcount' value=1 />块</label>
					</div>
					<div id='hddtype1'>
						<h5>请选择单块硬盘大小：</h5>
						<label><input type='radio' name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H1T']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H1T']['info'];?>
</label>
						<label><input type='radio' checked="checked" name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H2T']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H2T']['info'];?>
</label>
						<label><input type='radio' name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H4T']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['H4T']['info'];?>
</label>
						<label><input type='radio' name='hddsize' value='0' />不需要</label>
					</div>
					<div id='hddtype2' class='hidden'>
						<h5>请选择单块硬盘大小：</h5>
						<label><input type='radio' checked="checked" name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['E2T']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['E2T']['info'];?>
</label>
						<label><input type='radio' name='hddsize' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['E4T']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['E4T']['info'];?>
</label>
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
					<div id='gametype'>
						<h5>请选择显卡：</h5>
						<label><input type='radio' checked="checked" name='gamecard' value=0 />集显</label>
						<label><input type='radio' name='gamecard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GT740']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GT740']['info'];?>
</label>
						<label><input type='radio' name='gamecard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1060']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1060']['info'];?>
</label>
						<label><input type='radio' name='gamecard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1070']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1070']['info'];?>
</label>
						<label><input type='radio' name='gamecard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1080']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['GTX1080']['info'];?>
</label>
					</div>
					<div id='gamecount' class='hidden'>
						<h5>请选择数量：</h5>
						<label><input type='number' name='gamecount'  />块</label>
					</div>
					<div id='gtype'>
						<h5>请选择图形卡：</h5>
						<label><input type='radio' checked="checked" name='gcard' value=0 />不需要</label>
						<label><input type='radio' name='gcard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K620']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K620']['info'];?>
</label>
						<label><input type='radio' name='gcard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K2200']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K2200']['info'];?>
</label>
						<label><input type='radio' name='gcard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K6000']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K6000']['info'];?>
</label>
						<label><input type='radio' name='gcard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['M6000']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['M6000']['info'];?>
</label>
					</div>
					<div id='gcount' class='hidden'>
						<h5>数量：</h5>
						<label><input type='number' name='gcount' />块</label>
					</div>
					<!--<div id='cgtype'>
						<h5>请选择计算卡：</h5>
						<label><input type='radio' checked="checked" name='ccard' value=0 />不需要</label>
						<label><input type='radio' name='ccard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K20']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K20']['info'];?>
</label>
						<label><input type='radio' name='ccard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K40']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['k40']['info'];?>
</label>
						<label><input type='radio' name='ccard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K80']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['K80']['info'];?>
</label>
						<label><input type='radio' name='ccard' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['P100']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['P100']['info'];?>
</label>
					</div>
					<div id='ccount' class='hidden'>
						<h5>数量：</h5>
						<label><input type='number' name='ccount' />块</label>
					</div>-->
					<div id='powertype'>
						<h5>请选择电源大小：</h5>
						<label><input type='radio' checked="checked" name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W500']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W500']['info'];?>
</label>
						<label><input type='radio' name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W750']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W750']['info'];?>
</label>
						<label><input type='radio' name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W1000']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W1000']['info'];?>
</label>
						<label><input type='radio' name='powerprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W1200']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['W1250']['info'];?>
</label>
					</div>
					<div id='displaytype'>
						<h5>请选择显示器：</h5>
						<label><input type='radio' name='disprice' value=0 />无</label>
						<label><input type='radio' checked="checked" name='disprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN23']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN23']['info'];?>
</label>
						<label><input type='radio' name='disprice' value=<?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN27']['name'];?>
 /><?php echo $_smarty_tpl->tpl_vars['prj']->value['prices']['IN27']['info'];?>
</label>
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
