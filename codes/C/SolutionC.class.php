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
			if($_POST['product_type']!='p'){
				$Multiple=1.8;
				$srqcount=2;
				$cpucount=2;
				$boardwhere="X10DRLI";
				if($_POST['otgcount']>1){
					$boardwhere = "X10DAI";
				}
				$memprice = $newprices['D416G']['price']*8;
				if($_POST['memsize']>$memprice){
					$boardwhere = "X10DAI";
				}
				$srqwhere="R17";
				if($_POST['product_type']=='w'){
					$srqcount=1;
					$cpucount=1;
				}
				if($_POST['boxtype']==1){
					$boxwhere='LZ9K';
				}else if($_POST['boxtype']==2){
					$boxwhere='LZ4550';
				}
			}else{
				$Multiple=1.5;
				$srqcount=1;
				$cpucount=1;
				if($_POST['cputype']==$newprices['i6600k']['price'] or $_POST['cputype']==$newprices['i6700k']['price']){
					$boardwhere = "Z170";
					$srqwhere="DST";
				}else{
					$boardwhere = "B150";
					$srqwhere="XB400";
				}
				$boxwhere='GX900';
			}
			$board=$newprices[$boardwhere]['price'];
			$srqprice = $srqcount*$newprices[$srqwhere]['price'];
			$boxprice = $newprices[$boxwhere]['price'];
			$dvdprice = $newprices['DVDRW']['price'];
			$pricecount=$_POST['city']+$_POST['cputype']*2+$_POST['memsize']+$_POST['ssdsize']+$_POST['hddsize']*$_POST['hddcount']+$_POST['card']+$_POST['powerprice']+$boxprice+$board+$_POST['dispirce']+$newprices['UMOUSE']['price']+$dvdprice+$srqprice;
			$prj['price']['count']=$pricecount*$Multiple;
			//echo $Multiple;
			$prj['price']['cpu']=$_POST['cputype']*2;
			$prj['price']['board']=$board;
			$prj['price']['ssd']=$_POST['ssdsize'];
			$prj['price']['hdd']=$_POST['hddsize']*$_POST['hddcount'];
			$prj['price']['power']=$_POST['powerprice'];
			$prj['price']['srq']=$srqprice;
			$prj['price']['box']=$boxprice;
			$prj['price']['mem']=$_POST['memsize'];
			$prj['price']['card']=$_POST['card'];
			$prj['price']['mouse']=$newprices['UMOUSE']['price'];
			$prj['price']['display']=$_POST['dispirce'];
			$prj['price']['dvd']=$dvdprice;
			
			//$prj['price']['config']=array("CPU"=>$new);
			print_r($prj['price']);
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
				$price->where("name='$_POST[name]'")->update("cid=$_POST[class],price=$_POST[price],info='$_POST[info]'");
				$this->url('更新成功！');
			}else{
				$price->insert("'',$_POST[class],'$_POST[name]',$_POST[price],'$_POST[info]'");
				$this->url('添加成功！');
			}
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