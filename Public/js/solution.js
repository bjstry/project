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
	$("input[value='s']").click(function(){
		var whtml = $("div#scpu").html();
		$("#cputype").html(whtml);
		var ssmem = $("div#ssmem").html();
		$('#memsize').html(ssmem);
	});
});