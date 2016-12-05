$(function(){
	var gcounthtml = $("div#gcount").html();
	var gamecounthtml = $("div#gamecount").html();
	$("div#gcount").html("");
	$("div#gamecount").html("");
	$("input[value='p']").click(function(){

		var pchtml = $("div#pccpu").html();
		$("#cputype").html(pchtml);
		
		var pcmem = $("div#pcmem").html();
		$('#memsize').html(pcmem);

	});
	$("input[value='w']").click(function(){
		var whtml = $("div#wcpu").html();
		$("#cputype").html(whtml);

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
	$("select.gamecard").change(function(){
		if(this.value=='0'){
			$("div#gamecount").html("");
		}else{
			$("div#gamecount").html(gamecounthtml);
		}
	});
	$("select.gcard").change(function(){
		if(this.value=='0'){
			$("div#gcount").html("");
		}else{
			$("div#gcount").html(gcounthtml);
		}
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