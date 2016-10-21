$(function(){
	$("input[value='p']").click(function(){
		/**$("#cputype").html("<div> \
						<label><input type='radio' name='cputype' value='p1' />Intel Core I3 6100  2核心 4线程 3.7Ghz 缓存3M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='p2' />Intel Core I3 6300  2核心 4线程 3.8Ghz 缓存4M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='p21' />Intel Core I5 6400  4核心 4线程 3.3Ghz 缓存6M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='p22' />Intel Core I5 6500  4核心 4线程 3.6Ghz 缓存6M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='p23' />Intel Core I5 6600  4核心 4线程 3.9Ghz 缓存6M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='p31' />Intel Core I7 6700  4核心 8线程 4.0Ghz 缓存8M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='p32' />Intel Core I7 6700K 4核心 8线程 4.0Ghz 缓存8M</label> \
						</div>"
		);**/
		var pchtml = $("div#pccpu").html();
		$("#cputype").html(pchtml);
		
		var pcmem = $("div#pcmem").html();
		$('#memsize').html(pcmem);
		/**$('#memsize').html("<h5>请选择内存大小：</h5>\
						<label><input type='radio' name='memsize' value='1' />8GB</label>\
						<label><input type='radio' name='memsize' value='2' />16GB</label>\
						<label><input type='radio' checked='checked' name='memsize' value='4' />32GB</label>\
						<label><input type='radio' name='memsize' value='8' />64GB</label>"
		);**/
	});
	$("input[value='w']").click(function(){
		var whtml = $("div#wcpu").html();
		$("#cputype").html(whtml);
		/**$("#cputype").html("<div> \
						<label><input type='radio' name='cputype' value='w1' />Intel Xeon E5-1620 V4  4核心 8线程 3.5Ghz 缓存10M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='w2' />Intel Xeon E5-1630 V4  4核心 8线程 3.7Ghz 缓存10M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='w2' />Intel Xeon E5-1650 V4  6核心 12线程 3.6Ghz 缓存15M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='w2' />Intel Xeon E5-1660 V4  8核心 16线程 3.2Ghz 缓存20M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='w3' />Intel Xeon E5-1680 V4 8核心 16线程 3.4Ghz 缓存20M</label> \
						</div>"
		);**/
		/**$('#memsize').html("<h5>请选择内存大小：</h5>\
						<label><input type='radio' name='memsize' value='2' />32GB</label>\
						<label><input type='radio' checked='checked' name='memsize' value='4' />64GB</label>\
						<label><input type='radio' name='memsize' value='8' />128GB</label>\
						<label><input type='radio' name='memsize' value='16' />256GB</label>\
						<label><input type='radio' name='memsize' value='32' />512GB</label>"
		);**/
	});
	$("input[name='hddsize'][value='0']").click(function(){
		$("div#hddtype").hide();
		$("div#hddcount").hide();
	});
	$("input[name='hddsize'][value!='0']").click(function(){
		$("div#hddtype").show();
		$("div#hddcount").show();	
	});
	$("input[name='otg'][value='0']").click(function(){
		$("div#gtype").hide();
		$("div#ggtype").hide();
		$("div#ogtype").hide();
		$("div#otgcount").hide();
	});
	$("input[name='otg'][value!='0']").click(function(){
		$("div#gtype").show();
		$("div#ggtype").show();
		$("div#otgcount").show();
	});
	$("input[name='gtype'][value='0']").click(function(){
		$("div#ggtype").show();
		$("div#ogtype").hide();
	});
	$("input[name='gtype'][value='1']").click(function(){
		$("div#ggtype").hide();
		$("div#ogtype").show();
	});
	$("input[name='hddtype'][value='1']").click(function(){
		$("div#hddtype1").show();
		$("div#hddtype2").hide();
	});
	$("input[name='hddtype'][value='2']").click(function(){
		$("div#hddtype1").hide();
		$("div#hddtype2").show();
	});
	$("input[name='ssdsize'][value=0]").click(function(){
		$("div#ssdcount").hide();
	});
	$("input[name='ssdsize'][value!=0]").click(function(){
		$("div#ssdcount").show();
	});
	$("input[name='gamecard'][value=0]").click(function(){
		$("div#gamecount").hide();
	});
	$("input[name='gamecard'][value!=0]").click(function(){
		$("div#gamecount").show();
	});
	$("input[name='gcard'][value=0]").click(function(){
		$("div#gcount").hide();
	});
	$("input[name='gcard'][value!=0]").click(function(){
		$("div#gcount").show();
	});
	$("input[name='ccard'][value=0]").click(function(){
		$("div#ccount").hide();
	});
	$("input[name='ccard'][value!=0]").click(function(){
		$("div#ccount").show();
	});
	$("input[value='s']").click(function(){
		var whtml = $("div#scpu").html();
		$("#cputype").html(whtml);
		/**$("#cputype").html("<div>\
							<label><input type='radio' name='cputype' value='s11' />Intel Xeon E5-2620 V4  8核心 16线程 主频2.1Ghz 缓存20M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='s12' />Intel Xeon E5-2630 V4  10核心 20线程 主频2.2Ghz 缓存25M</label> \
						</div> \
						<div> \
							<label><input type='radio' name='cputype' value='s13' />Intel Xeon E5-2640 V4 10核心 20线程 主频2.4Ghz 缓存25M</label>\
						</div> \
						<div>\
							<label><input type='radio' name='cputype' value='s21' />Intel Xeon E5-2650 V4 12核心 24线程 主频2.2Ghz 缓存30M</label>\
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s22' />Intel Xeon E5-2660 V4 14核心 28线程 主频2.0Ghz 缓存35M</label>\
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s31' />Intel Xeon E5-2667 V4 8核心 16线程 主频3.2Ghz 缓存25M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s32' />Intel Xeon E5-2680 V4 14核心 28线程 主频2.4Ghz 缓存30M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s33' />Intel Xeon E5-2683 V4 16核心 32线程 主频2.1Ghz 缓存40M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s41' />Intel Xeon E5-2687W V4 12核心 24线程 主频3.0Ghz 缓存30M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s42' />Intel Xeon E5-2690 V4 14核心 28线程 主频2.6Ghz 缓存35M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s43' />Intel Xeon E5-2695 V4 18核心 36线程 主频2.1Ghz 缓存45M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s51' />Intel Xeon E5-2697 V4 18核心 36线程 主频2.3Ghz 缓存45M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s52' />Intel Xeon E5-2698 V4 20核心 40线程 主频2.2Ghz 缓存50M</label> \
						</div>\
						<div> \
							<label><input type='radio' name='cputype' value='s53' />Intel Xeon E5-2699 V4 20核心 40线程 主频2.2Ghz 缓存55M</label> \
						</div>"
		);**/
		var wsmem = $("div#wsmem").html();
		$('#memsize').html(wsmem);
		/**$('#memsize').html("<h5>请选择内存大小：</h5>\
						<label><input type='radio' name='memsize' value='2' />32GB</label>\
						<label><input type='radio' name='memsize' value='4' />64GB</label>\
						<label><input type='radio' checked='checked' name='memsize' value='8' />128GB</label>\
						<label><input type='radio' name='memsize' value='16' />256GB</label>\
						<label><input type='radio' name='memsize' value='32' />512GB</label>"
		);**/
	});
});