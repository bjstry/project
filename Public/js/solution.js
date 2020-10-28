$(function(){
	var gcounthtml = $("div#gcount").html();
	var gamecounthtml = $("div#gamecount").html();
	$("div#gcount").html("");
	$("div#gamecount").html("");
	$("input[value='XYP']").click(function(){

		var pchtml = $("div#pccpu").html();
		$("#cputype").html(pchtml);
		
		var pcmem = $("div#pcmem").html();
		$('#memsize').html(pcmem);

	});
	$("input[value='XYW']").click(function(){
		var whtml = $("div#wcpu").html();
		$("#cputype").html(whtml);
		
		var ssmem = $("div#ssmem").html();
		$('#memsize').html(ssmem);

	});
	$("input[value='XYS']").click(function(){
		var shtml = $("div#scpu").html();
		$("#cputype").html(shtml);
		var ssmem = $("div#ssmem").html();
		$('#memsize').html(ssmem);
	});
	$("input[value='XYAW']").click(function(){
		var awhtml = $("div#awcpu").html();
		$("#cputype").html(awhtml);
		var ssmem = $("div#ssmem").html();
		$('#memsize').html(ssmem);
	});
	
	$("input[value='XYAS']").click(function(){
		var ashtml = $("div#ascpu").html();
		$("#cputype").html(ashtml);
		var ssmem = $("div#ssmem").html();
		$('#memsize').html(ssmem);
	});
	
	$("input[value='XYNS']").click(function(){
		var nshtml = $("div#nscpu").html();
		$("#cputype").html(nshtml);
		var ssmem = $("div#ssmem").html();
		$('#memsize').html(ssmem);
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
});
$('form#getprice').submit(function(){
	//var cardcount = this.gamecount.value  +  this.gcount.value;
	//alert(this.gamecount.value);
	//let cardcount = this.gamecount.value;
	if(this.gamecount){
		if(this.gamecount.value > 4){
			alert('显卡最多支持四张!');
			return false;
		}
		if(this.gcount){
			//alert(Number(this.gamecount.value) + Number(this.gcount.value));
			if(Number(this.gamecount.value) + Number(this.gcount.value) > 4){
				alert('显卡最多支持四张!');
				return false;
			}
		}
	}

	if(!this.cputype.value){
		alert('请选择CPU!');
		return false;
	}
	
	if(this.cpucount.value > 2){
		alert('CPU数量超过上限!');
		return false;
	}

	if(!this.memsize.value){
		alert('请选择内存!');
		return false;
	}
	
	if(this.memcount.value > 16){
		alert('内存数量超过限制!');
		return false;
	}
	
	
	
	if(!this.hddsize.value){
		alert('请选择硬盘!');
		return false; 
	}
	
	if(!this.powerprice.value){
		alert('请选择电源!');
		return false;
	}
	
	
	/*if((this.gamecount.value  +  this.gcount.value) > 4){
		alert('显卡最多支持三张');
		return false;
	}/*
	/*if(!this.disprice.value){
		alert('请选择显示器！');
		return false;
	}*/
	return true;
	
});