<?php
class SolutionC extends C{
	public function Index(){
		$userinfo = session('uinfo');
		$departurl = getDepartment($userinfo['cid'],'url');
		if($departurl=='Sale'){
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}else{
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'价格管理','url'=>URL."/$_GET[c]/PartPrice");
			$prj['left'][] = array('name'=>'新增报价','url'=>URL."/$_GET[c]/AddPrice");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}
		$prj['myjs'] = "<script src='"._P_."/js/solution.js'></script>";
		$prj['title']='方案部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$partprice = M('partprice');
		$prj['pccpu'] = $partprice->where("cid=1 and name like 'i%'")->select();
		$prj['wcpu'] = $partprice->where("cid=1 and name like 'E1%'")->select();
		$prj['scpu'] = $partprice->where("cid=1 and name like 'E2%'")->select();
		$prices=$partprice->where('cid<>0')->select();
		$newprices;
		foreach($prices as $val){
			$newprices[$val['name']]=$val;
		}
		$prj['prices'] = $newprices;
		$this->assign('prj',$prj);
		$this->display();
	}
	public function PartPrice(){
		$prj['title']='价格管理-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		
		$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$prj['left'][] = array('name'=>'价格管理','url'=>URL."/$_GET[c]/PartPrice");
		$prj['left'][] = array('name'=>'新增报价','url'=>URL."/$_GET[c]/AddPrice");
		$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		$price = M('partprice');
		$prj['mycpuprice'] = $price->where("cid=1")->select();
		$prj['myboardprice'] = $price->where("cid=2")->select();
		$prj['mymemprice'] = $price->where("cid=3")->select();
		$prj['mydiskprice'] = $price->where("cid=4")->select();
		$prj['mycardprice'] = $price->where("cid=11")->select();
		$prj['mypowerprice'] = $price->where("cid=5")->select();
		$prj['myboxprice'] = $price->where("cid=6")->select();
		$prj['myvgaprice'] = $price->where("cid=8")->select();
		$prj['mysrqprice'] = $price->where("cid=9")->select();
		$prj['mymouseprice'] = $price->where("cid=7")->select();
		$prj['mydvdprice'] = $price->where("cid=10")->select();
		$prj['mynetprice'] = $price->where("cid=14")->select();
		$prj['myoprice'] = $price->where("cid=15")->select();
		if($_POST[submit]){
			$varr = $_POST;
			//print_r($varr);
			foreach($varr as $key=>$val){
				if($key!=='submit'){
					$price->where("name='$key'")->update("price=$val");
					$this->url("更新成功！",'/Solution/PartPrice');
				}
			}
		}
		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function GetPrice(){
		if(isset($_POST['submit'])){
			$price = M('partprice');
			$newprices;
			$prices=$price->where('cid<>0')->select();
			$boardwhere;
			$card;
			$srqwhere;
			$srqcount;
			$Multiple;
			$boxwhere;
			$cpucount;
			$userinfo = session('uinfo');
			$departurl = getDepartment($userinfo['cid'],'url');
			if($departurl=='Sale'){
				$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
				$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			}else{
				$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
				$prj['left'][] = array('name'=>'价格管理','url'=>URL."/$_GET[c]/PartPrice");
				$prj['left'][] = array('name'=>'新增报价','url'=>URL."/$_GET[c]/AddPrice");
				$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			}
			foreach($prices as $val){
				$newprices[$val['name']]=$val;
			}
			if($_POST['product_type']=='s'){
				$Multiple=1.85;
				$srqcount=2;
				$cpucount=2;
				$boardwhere="X10DRLI";
				if($_POST['gamecount'] + $_POST['gcount'] >1 ){
					//echo '显卡大于1';
					$boardwhere = "X10DAI";
				}
				//$memprice = $newprices['D416G']['price']*8;
				if($_POST['memcount']>8){
					$boardwhere = "X10DAI";
				}
				$srqwhere="R17";
				if($_POST['boxtype']==1){
					$boxwhere='LZ9K';
				}else if($_POST['boxtype']==2){
					$boxwhere='LZ4550';
				}
			}else if($_POST['product_type']=='p'){
				$Multiple=1.5;
				$srqcount=1;
				$cpucount=1;
				if($_POST['cputype']=='i6600k' or $_POST['cputype']=='i6700k'){
					$boardwhere = "Z170";
					$srqwhere="DST";
				}else{
					$boardwhere = "B150";
					$srqwhere="XB400";
				}
				$boxwhere='GX900';
			}else if($_POST['product_type']=='w'){
				$Multiple=1.85;
				$srqcount=1;
				$cpucount=1;
				$boardwhere="X10SRA";
				$srqwhere="R17";
				if($_POST['boxtype']==1){
					$boxwhere='LZ9K';
				}else if($_POST['boxtype']==2){
					$boxwhere='LZ4550';
				}
			}
			$board=$newprices[$boardwhere]['price'];
			$srqprice = $srqcount*$newprices[$srqwhere]['price'];
			$boxprice = $newprices[$boxwhere]['price'];
			$dvdprice = $newprices['DVDRW']['price'];
			
			$pricecount=$_POST['city']+$newprices[$_POST['cputype']]['price']*$cpucount+$newprices[$_POST['memsize']]['price']*$_POST['memcount']+$newprices[$_POST['ssdsize']]['price']*$_POST['ssdcount']+$newprices[$_POST['hddsize']]['price']*$_POST['hddcount']+$newprices[$_POST['gamecard']]['price']*$_POST['gamecount']+$newprices[$_POST['gcard']]['price']*$_POST['gcount']+$newprices[$_POST['powerprice']]['price']+$boxprice+$board+$newprices[$_POST['disprice']]['price']+$newprices['UMOUSE']['price']+$dvdprice+$srqprice;
			//print_r($_POST);
			$prj['money']=$pricecount*$Multiple;
			//echo $Multiple;
			
			
			$prj['price']['CPU']=array("name"=>$_POST['cputype'],"count"=>$cpucount,'price'=>$newprices[$_POST['cputype']]['price']);
			$prj['price']['散热器']=array("name"=>$srqwhere,"count"=>$srqcount,"price"=>$newprices[$srqwhere]['price']);
			$prj['price']['主板']=array("name"=>$boardwhere,"count"=>1,"price"=>$newprices[$boardwhere]['price']);
			if(!$_POST['product_type']=='p'){
				$prj['price']['内存']=array("name"=>$newprices[$_POST['memsize']]['info'].' RECC',"count"=>$_POST['memcount'],'price'=>$newprices[$_POST['memsize']]['price']);
			}else{
				$prj['price']['内存']=array("name"=>$newprices[$_POST['memsize']]['info'],"count"=>$_POST['memcount'],'price'=>$newprices[$_POST['memsize']]['price']);
			}
			if(!$_POST['ssdsize']==0){
				$prj['price']['固态硬盘']=array("name"=>$newprices[$_POST['ssdsize']]['info'],"count"=>$_POST['ssdcount'],'price'=>$newprices[$_POST['ssdsize']]['price']);
			}
			if(!$_POST['hddsize']==0){
				if($_POST['hddtype'==1]){
					$prj['price']['机械硬盘']=array("name"=>$newprices[$_POST['hddsize']]['info'],"count"=>$_POST['hddcount'],'price'=>$newprices[$_POST['hddsize']]['price']);
				}else{
					$prj['price']['机械硬盘']=array("name"=>$newprices[$_POST['hddsize']]['info'].' 企业级硬盘',"count"=>$_POST['hddcount'],'price'=>$newprices[$_POST['hddsize']]['price']);
				}
			}
			if(!$_POST['gamecard']==0){
				$prj['price']['显卡']=array("name"=>$_POST['gamecard'],"count"=>$_POST['gamecount'],'price'=>$newprices[$_POST['gamecard']]['price']);
			}
			if(!$_POST['gcard']==0){
				$prj['price']['图形卡']=array("name"=>$_POST['gcard'],"count"=>$_POST['gcount'],'price'=>$newprices[$_POST['gcard']]['price']);
			}
			$prj['price']['电源']=array("name"=>$newprices[$_POST['powerprice']]['info'],"count"=>1,'price'=>$newprices[$_POST['powerprice']]['price']);
			
			$prj['price']['机箱']=array("name"=>$newprices[$boxwhere]['info'],"count"=>1,"price"=>$newprices[$boxwhere]['price']);
			
			$prj['price']['键鼠']=array("name"=>$newprices['UMOUSE']['info'],"count"=>1,"price"=>$newprices['UMOUSE']['price']);
			if(!$_POST['disprice']==0){
				$prj['price']['显示器']=array("name"=>$newprices[$_POST['disprice']]['info'],"count"=>1,'price'=>$newprices[$_POST['disprice']]['price']);
			}
			$prj['price']['光驱']=array("name"=>"DVD-RW","count"=>1,"price"=>$newprices["DVDRW"]['price']);
			if(!$_POST['city']==0){
				$prj['price']['其他'] = array("name"=>"运费","count"=>1,"price"=>$_POST['city']);
			}
			
			
			/**$prj['price']['cpu']=$newprices[$_POST['cputype']]['price']*2;
			$prj['price']['board']=$board;
			$prj['price']['ssd']=$newprices[$_POST['ssdsize']]['price']*$_POST['ssdcount'];
			$prj['price']['hdd']=$newprices[$_POST['hddsize']]['price']*$_POST['hddcount'];
			$prj['price']['power']=$newprices[$_POST['powerprice']]['price'];
			$prj['price']['srq']=$srqprice;
			$prj['price']['box']=$boxprice;
			$prj['price']['mem']=$newprices[$_POST['memsize']]['price']*$_POST['memcount'];
			$prj['price']['gamecard']=$newprices[$_POST['gamecard']]['price']*$_POST['gamecount'];
			$prj['price']['gcard']=$newprices[$_POST['gcard']]['price']*$_POST['gcount'];
			$prj['price']['mouse']=$newprices['UMOUSE']['price'];
			$prj['price']['display']=$newprices[$_POST['dispirce']]['price'];
			$prj['price']['dvd']=$dvdprice;*/
			
			//$prj['price']['config']=array("CPU"=>$new);
			//print_r($_POST);
			//print_r($prj['price']);
			$prj['myjs'] = "<script src='"._P_."/js/solution.js'></script>";
			$prj['title']='方案价-硕星信息，西安硕星信息技术有限公司';
			$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
			$this->assign('prj',$prj);
			$this->display();
		}else{
			exit('非法访问!');
		}
	}
	public function AddPrice(){
		$price = M('partprice');
		$prj['title']='增加报价-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['subtype'] = '添加';
		$class = M('class');
		$prj['myclass']=$class->select();
		
		$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$prj['left'][] = array('name'=>'价格管理','url'=>URL."/$_GET[c]/PartPrice");
		$prj['left'][] = array('name'=>'新增报价','url'=>URL."/$_GET[c]/AddPrice");
		$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		if(isset($_POST['submit'])){
			$return = $price->where("name='$_POST[name]'")->find();
			if(!empty($return)){
				$price->where("name='$_POST[name]'")->update("cid=$_POST[class],price=$_POST[price],info='$_POST[info]',`desc`='$_POST[desc]'");
				$this->url('更新成功！');
			}else{
				$price->insert("'',$_POST[class],'$_POST[name]',$_POST[price],'$_POST[info]','$_POST[desc]'");
				$this->url('添加成功！');
			}
		}
		
		if(!empty($_GET['id'])){
			for($i=0;$i<count($prj['myclass']);$i++){
				//echo $prj['myclass'][$i]['cid'].'===='.getClass($_GET['id'],'cid').'<br>';
				if($prj['myclass'][$i]['cid']==getClass($_GET['id'],'cid')){
					$prj['myclass'][$i]['select'] = 'selected';
				}
			}
			$prj['myclass']['price']=$price->where("id=$_GET[id]")->find();
			$prj['myclass']['price']['back'] = "<input class='button small' onClick=history.go(-1) type='button' value='返回'>";
		}

		$this->assign('prj',$prj);
		$this->display('SolutionPrice');
	}
	public function EditPrice(){
		$prj['title']='编辑报价-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['subtype'] = '修改';
		$class = M('class');
		$prj['myclass']=$class->select();
		$this->assign('prj',$prj);
		$this->display('SolutionPrice');	
	}
}