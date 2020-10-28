<?php
class SolutionC extends C{
	
	public $prj;  //定义输出
	public $userinfo; //定义用户信息
	public $departurl; //定义部门链接
	public $logs; //定义日志类
	public $user; //定义用户类
	public $partclass; //定于分类类
	public $partprice; //定义配件价格类
	public $pagenb;   //定义每页日志条数
	public $pagekey;  //定义翻页关键字
	
	public function Speekinit(){
		//输出基本信息
		$this->prj['webwidth'] = 80;
		$this->prj['title']='方案部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['myjs'] = "<script src='"._P_."/js/solution.js'></script>";
		
		//初始化定义信息
		$this->userinfo = session('uinfo');
		$this->logs = M('logs');
		$this->user = M('user');
		$this->partclass = M('class');
		$this->partprice = M('partprice');
		$this->pagenb = 15;  //定义默认每页条数
		$this->pagekey = 'page'; //定义默认翻页关键字
		//从用户信息中获取部门信息
		$this->departurl = getDepartment($this->userinfo['cid'],'url');
		//根据部门信息决定侧栏显示权限
		if($this->departurl=='Sale'){
			//如果用户为销售部则仅显示询价系统和返回主页
			if($this->userinfo[id]!='28'){
				
				$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$this->departurl");
				$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
				$this->prj['left'][] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
				$this->prj['left'][] = array('name'=>'提交售后','url'=>URL."/Technology/CustAdd");
				$this->prj['left'][] = array('name'=>'售后进度','url'=>URL."/Technology/CustomerService");
				$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
				

			}else{
				$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$this->departurl");
				$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
				$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
			}

			
			
		}else{
			//如果用户不是销售部，则显示配件改价、新增配件以及日志记录
			$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$this->prj['left'][] = array('name'=>'价格管理','url'=>URL."/$_GET[c]/PartPrice");
			$this->prj['left'][] = array('name'=>'新增报价','url'=>URL."/$_GET[c]/AddPrice");
			if($this->userinfo['gid']==0){
				//如果用户为主管，显示日志
				$this->prj['left'][] = array('name'=>'操作日志','url'=>URL."/$_GET[c]/Logs");
				$this->prj['left'][] = array('name'=>'测试项目','url'=>URL."/$_GET[c]/Generate");
				$this->prj['left'][] = array('name'=>'清空测试','url'=>URL."/$_GET[c]/Generate/del_device/all");
			}
			$this->prj['left'][] = array('name'=>'返回功能区','url'=>URL);
		}
		
	}
	//----日志模块，记录每条操作相关信息---//
	public function Logs(){
		//$pagenb = 10;
		//$pagekey = 'page';
		if(empty($_GET[$this->pagekey])){
			$_GET[$this->pagekey] = 1;
		}
		$page = $_GET[$this->pagekey];
		$pagecl = ($page-1)*$this->pagenb;
		
		if($this->userinfo['gid']==0){
			$this->prj['logsshow'] = $this->logs->where("type='更新' or type='添加'")->order('id')->select("$pagecl,$this->pagenb");
		}else{
			$this->prj['logsshow'] = $this->logs->where("(type='更新' or type='添加') and uid=".$this->userinfo['id'])->select("$pagecl,$this->pagenb");
		}
		//$logs_arr = $this->prj['logs'];
		foreach($this->prj['logsshow'] as $key=>$value){
			//print_r($value);
			$this->userinfo = $this->user->where("id=$value[uid]")->find();
			//print_r($userinfo);
			$value['uid'] = $this->userinfo['urename'];
			$this->prj['logsshow'][$key] = $value;
			//$logs_arr[uid] = $userinfo['uname'];
		}
		//$this->prj['logs'] = $logs_arr; 
		$mypages = $this->logs->pageint('',$this->pagenb,$this->pagekey,'','is-active');
		$this->prj['title'] = "操作记录-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$this->prj['mypages'] = $mypages;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	//-----首页，询价系统初始化页面-----//
	public function Index(){
		
		//获取配件分类信息

		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['series'] = $this->partclass->where('gid=2')->order(array('visible','asc'))->select();

		//获取分类配件价格信息
		foreach($myclass as $key){
			$this->prj[$key['cname']] = $this->partprice->where("cid=$key[cid] and visible>0")->order(array('visible','asc'))->select();
			//echo $key['cname'];
		}
		
	
		$prices=$this->partprice->where('cid<>0')->select();
		//创建价格存储数组
		$newprices;
		//通过一种蠢笨的方法将数据库中所有配件的价格存入一个新的数据库   配件名字=》价格
		foreach($prices as $val){
			$newprices[$val['name']]=$val;
		}
		//将这个价格表存入前台数据合集中
		$this->prj['prices'] = $newprices;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	

	
	public function Generate(){

		if(isset($_POST['submit'])){
			$subarr = $_POST;
			$devices = array();
			$devices_arr = array();
			//echo 1;
			$mysolution = D('SolutionPrice');
			$myslt = D('Solution');
			$newslp = D('SolutionPart');
			$newslp->SetParts($subarr);
			$myslt->GetPrice($newslp);
			if(is_array($_SESSION['devices'])){
				$devices = $_SESSION['devices'];
			}
			array_push($devices,array($myslt->name,$myslt->allpartprice,$myslt->counts,$myslt->devtype,$myslt->allpartarr));
			session('devices',$devices);
			if(!empty($_SESSION['myslp'])){
				$myslp = session('myslp');
			}
			$myslp[] = serialize($newslp);
			session('myslp',$myslp);
		}
		
		if(isset($_POST['generate'])){
			$newslpdm = D('SolutionPart');
			$newsolu = D('Solution');
			$newsoluprice = D('SolutionPrice');
			foreach($_SESSION['myslp'] as $val){
				$newsolu->addSlp(unserialize($val));
			}
			$newsoluprice->GetPrice($newsolu);
			$priceout = '总共 '.$newsoluprice->devcount.' 台设备, 成本: '.$newsoluprice->allpartprice.', 服务费: '.$newsoluprice->cityprice.',  方案价: <span id=\'finprice\'>'.$newsoluprice->allprice.'</span>';
			session('pjpriceout',$priceout);
		}
		
		if(isset($_POST['getsolu'])){
			print_r($_POST);
			print_r($_SESSION['myslp']);
		}
		
		/*if(!empty($_SESSION['devices'])){
			echo 'ready ?';
			$devices = session('devices');
			$devices_parts;
			foreach($devices as $val){
				$devices_parts[] = $val[4];
			}
			//print_r($devices_parts);
			$mysoluprice = D('SolutionPrice');
			$mysoluprice->GetPriceTest($devices_parts);
		}*/

		if(isset($_GET['del_device'])){
			$did = $_GET['del_device'];
			unset($_SESSION['devices'][$did]);
			unset($_SESSION['myslp'][$did]);
			$this->url('成功!','/Solution/Generate');
			if($did == 'all'){
				session('devices','null');
				session('myslp','null');
				session('pjpriceout','null');
				$this->url('成功!','/Solution/Generate');
			}
		}
		
		$this->prj['devices'] = session('devices');
		


		if(!empty($_SESSION['pjpriceout'])){
			$this->prj['priceout'] = $_SESSION['pjpriceout'];
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Ctprice(){
		
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['series'] = $this->partclass->where('gid=2')->order(array('visible','asc'))->select();

		//获取分类配件价格信息
		foreach($myclass as $key){
			$this->prj[$key['cname']] = $this->partprice->where("cid=$key[cid] and visible>0")->order(array('visible','asc'))->select();
			//echo $key['cname'];
		}
		
	
		$prices=$this->partprice->where('cid<>0')->select();
		//创建价格存储数组
		$newprices;
		//通过一种蠢笨的方法将数据库中所有配件的价格存入一个新的数据库   配件名字=》价格
		foreach($prices as $val){
			$newprices[$val['name']]=$val;
		}
		//将这个价格表存入前台数据合集中
		$this->prj['prices'] = $newprices;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Devinfo(){
		
		if(isset($_GET['sid'])){
			$dev_info = array();
		
			$dev_arr = $_SESSION['devices'][$_GET['sid']];
			
			//$dev_arr_len = count($dev_arr[3]);
	
			foreach($dev_arr[4] as $key=>$val){
				$infos = D('Part',$key);
				$info_arr = $infos->result;
				$info_arr['count'] = $val;
				$dev_info[] = $info_arr;
			}
			$this->prj['dev_info'] = $dev_info;
			
		}else{
			exit('非法访问!');
		}
		

		$this->assign('prj',$this->prj);
		$this->display();
	}


	
	public function Solution(){
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	//-----价格管理系统-----//
	public function PartPrice(){
		
		$this->prj['mypccpuprice'] = $this->partprice->where("cid=42")->order(array('visible','asc'))->select();
		$this->prj['myiscpuprice'] = $this->partprice->where("cid=43")->order(array('visible','asc'))->select();
		$this->prj['myidcpuprice'] = $this->partprice->where("cid=44")->order(array('visible','asc'))->select();
		$this->prj['myiqcpuprice'] = $this->partprice->where("cid=45")->order(array('visible','asc'))->select();
		$this->prj['myamdcpuprice'] = $this->partprice->where("cid=46 or cid=47 or cid=48")->order(array('visible','asc'))->select();
		$this->prj['myboardprice'] = $this->partprice->where("cid=2")->select();
		$this->prj['mypcmemprice'] = $this->partprice->where("cid=17")->select();
		$this->prj['mysememprice'] = $this->partprice->where("cid=16")->select();
		$this->prj['mydiskprice'] = $this->partprice->where("cid=4 or cid=32 or cid=41 or cid=40 or cid=39")->select();
		$this->prj['mycardprice'] = $this->partprice->where("cid=11 or cid=18 or cid=19 or cid=20")->select();
		$this->prj['mygecardprice'] = $this->partprice->where("cid=18")->select();
		$this->prj['myqucardprice'] = $this->partprice->where("cid=19")->select();
		$this->prj['mytecardprice'] = $this->partprice->where("cid=20")->select();
		$this->prj['mypowerprice'] = $this->partprice->where("cid=5")->select();
		$this->prj['myboxprice'] = $this->partprice->where("cid=6")->select();
		$this->prj['myvgaprice'] = $this->partprice->where("cid=8")->select();
		$this->prj['mysrqprice'] = $this->partprice->where("cid=9")->select();
		$this->prj['mymouseprice'] = $this->partprice->where("cid=7 or cid=10")->select();
		$this->prj['mynetprice'] = $this->partprice->where("cid=14")->select();
		$this->prj['myboxups'] = $this->partprice->where("cid=51 or cid=52")->select();
		$this->prj['myoprice'] = $this->partprice->where("cid=15")->select();
		$this->prj['mysrprice'] = $this->partprice->where("cid=50")->select();
		if($_POST[submit]){
			$uid=$this->userinfo[id];

			$varr = $_POST;
			print_r($varr);
			foreach($varr as $key=>$val){
				if($key!=='submit'){
					//echo $key;
					$this->partprice->where("name='$key'")->update("price=$val");
					echo $tmp_name = $_POST['submit'];
					$this->logs->insert('id,type,count,date,uid,content,remark',"'','更新',1,'".date('Y-m-d H:i:s')."',$uid,'更新配件 $_POST[submit] 价格为 $_POST[$tmp_name]',''");
					//echo $_POST[$tmp_name];
					//$this->url("更新成功！",'/Solution/PartPrice');
				}
			}
		}
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function GetPrice(){
		if(isset($_POST['submit'])){

			$prices = $this->partprice->where("visible>0")->select();  //获取所有价格
			$myprice;
			$mylevel;
			$mynames;
			$localcity = 5100;
			$outcity = 8000;
			$cityprice;
			$result = $_POST; 
			$cityprice = $result['city']; //获取区域服务费
			$count = $result['count']; //获取设备数量
			$tax = 1.1; //税率
			$scale = 1.5; //价格系数
			if($result['city'] == 1){
				$cityprice = $localcity;
			}else if($result['city'] == 2){
				$cityprice = $outcity;
			}
			//20190318 before 1.16 1.55
			if(!empty($result['cpucount'])){
				$cpucount = $result['cpucount'];
			}else{
				$cpucount = 1; //cpu数量
			}
			$boardid = 235; //默认普通PC主板
			$srqid = 249;  //默认普通pc散热器
			foreach($prices as $val){
				$myprice[$val['id']] = $val['price'];
				$mylevel[$val['id']] = $val['level'];
				$mynames[$val['id']] = $val['name'];
			}
			if($result['product_type'] == 'XYP'){
				if($mylevel[$result['cputype']] == 2){
					$srqid = 250;
					$boardid = 236;
				}
				if($mylevel[$result['cputype']] == 3){
					$srqid = 251;
					$boardid = 237;
				}
			}
			if($result['product_type'] == 'XYW'){
				$srqid = 251;
				$boardid = 242;
				if($mylevel[$result['cputype']] == 2){
					$srqid = 252;
					$boardid = 241;
				}
			}
			if($result['product_type'] == 'XYAW'){
				$srqid = 252;
				$boardid = 243;
			}
			if($result['product_type'] == 'XYS'){
				if(!empty($result['cpucount'])){
					$cpucount = $result['cpucount'];
				}else{
					$cpucount = 2; //cpu数量
				}
				$srqid = 251;
				$boardid = 239;
				if($result['memcount']>8 or ($result['gamecount']+$result['gcount']) > 1 or $result['boardtype']==3){
					$boardid = 244;
				}
				if($mylevel[$result['cputype']] == 2){
					$srqid = 252;
					$boardid = 245;
					if($result['memcount']>8 or ($result['gamecount']+$result['gcount']) > 1 or $result['boardtype']==3){
						$boardid = 246;
					}
				}
			}
			if($result['product_type'] == 'XYAS'){
				if(!empty($result['cpucount'])){
					$cpucount = $result['cpucount'];
				}else{
					$cpucount = 2; //cpu数量
				}
				$srqid = 252;
				$boardid = 247;
				if($result['memcount']>8 or ($result['gamecount']+$result['gcount']) > 1 or $result['boardtype']==3){
					$boardid = 248;
				}
			}
			$cpuprice = $cpucount*$myprice[$result['cputype']];
			$memprice = $result['memcount']*$myprice[$result['memsize']];
			$boardprice = $myprice[$boardid];
			$srqprice = $cpucount*$myprice[$srqid];
			$diskprice = $myprice[$result['hddsize']]*$result['hddcount']+$myprice[$result['ssdsize']]*$result['ssdcount'];
			$powerprice = $result['powerprice'];
			$disprice = $result['disprice'];
			$cityprice = $cityprice;
			$caseprice = 700;
			$cardprice = $myprice[$result['gamecard']]*$result['gamecount']+$myprice[$result['gcard']]*$result['gcount'];
			$mousprice = 100;
			$powerprice = $myprice[$result['powerprice']];
			$disprice = $myprice[$result['disprice']];
			$otherprice = $result['otherprice'];
			$pricecount=$cpuprice+$memprice+$boardprice+$srqprice+$diskprice+$powerprice+$disprice+$caseprice+$cardprice+$mousprice;
			$this->prj['money'] = $pricecount*$tax*$scale*$result['count']+$cityprice+$otherprice;
			
			
		
			$this->prj['price'][] = array('key'=>'CPU','name'=>$mynames[$result['cputype']],'count'=>$cpucount,'price'=>$myprice[$result['cputype']],'countprice'=>$cpuprice);
			$this->prj['price'][] = array('key'=>'散热器','name'=>'标配','count'=>$cpucount,'price'=>$myprice[$srqid],'countprice'=>$srqprice);
			$this->prj['price'][] = array('key'=>'主板','name'=>$mynames[$boardid],'count'=>1,'price'=>$boardprice,'countprice'=>$boardprice);
			$this->prj['price'][] = array('key'=>'内存','name'=>$mynames[$result['memsize']],'count'=>$result['memcount'],'price'=>$myprice[$result['memsize']],'countprice'=>$memprice);
			$this->prj['price'][] = array('key'=>'电源','name'=>$mynames[$result['powerprice']],'count'=>1,'price'=>$powerprice,'countprice'=>$powerprice);
			$this->prj['price'][] = array('key'=>'显示器','name'=>$mynames[$result['disprice']],'count'=>1,'price'=>$disprice,'countprice'=>$disprice);
			$this->prj['price'][] = array('key'=>'固态','name'=>$mynames[$result['ssdsize']],'count'=>$result['ssdcount'],'price'=>$myprice[$result['ssdsize']],'countprice'=>$myprice[$result['ssdsize']]*$result['ssdcount']);
			$this->prj['price'][] = array('key'=>'机械','name'=>$mynames[$result['hddsize']],'count'=>$result['hddcount'],'price'=>$myprice[$result['hddsize']],'countprice'=>$myprice[$result['hddsize']]*$result['hddcount']);
			$this->prj['price'][] = array('key'=>'显卡','name'=>$mynames[$result['gamecard']],'count'=>$result['gamecount'],'price'=>$myprice[$result['gamecard']],'countprice'=>$myprice[$result['gamecard']]*$result['gamecount']);
			$this->prj['price'][] = array('key'=>'图形卡','name'=>$mynames[$result['gcard']],'count'=>$result['gcount'],'price'=>$myprice[$result['gcard']],'countprice'=>$myprice[$result['gcard']]*$result['gcount']);
			$this->prj['price'][] = array('key'=>'键鼠','name'=>'标配USB键鼠','count'=>1,'price'=>$mousprice,'countprice'=>$mousprice);
			$this->prj['price'][] = array('key'=>'机箱','name'=>'标配机箱','count'=>1,'price'=>$caseprice,'countprice'=>$caseprice);
			$this->prj['price'][] = array('key'=>'服务','name'=>'安装售后','count'=>1,'price'=>$cityprice,'countprice'=>$cityprice);
			$this->prj['price'][] = array('key'=>'其他','name'=>'其他费用','count'=>1,'price'=>$otherprice,'countprice'=>$otherprice);
	
			if($this->userinfo[cid] == 4 or $this->userinfo[gid] == 0){
				$pricecount = $pricecount*$result['count'];
				$this->prj['price'][] = array('key'=>'统计',"name"=>"硬件成本："."$pricecount","count"=>"系数：$scale","price"=>"税率: $tax");
			}
			
			
			$this->assign('prj',$this->prj);
			

			$this->assign('prj',$this->prj);
			$this->display();
			
			
			
		}else{
			exit('非法访问!');
		}
	}

	public function AddPrice(){

		$this->prj['title']='增加报价-硕星信息，西安硕星信息技术有限公司';
		$this->prj['subtype'] = '添加';
		$uid = $this->userinfo[id];
		$this->prj['myclass']=$this->partclass->where('gid=1')->select();
		
		
		
		if(isset($_POST['submit'])){
			if(empty($_GET['id'])){
				$return = $this->partprice->where("name='$_POST[name]'")->find();
				if(!empty($return)){
					$this->partprice->where("name='$_POST[name]'")->update("cid=$_POST[class],price=$_POST[price],info='$_POST[info]',`desc`='$_POST[desc]',`visible`='$_POST[visible]',`level`='$_POST[level]'");
					$this->logs->insert('id,type,count,date,uid,content,remark',"'','更新',1,'".date('Y-m-d H:i:s')."',$uid,'更新配件 $_POST[name] 价格为 $_POST[price]',''");
					$this->url('更新成功！');
				}else{
					$this->partprice->insert("'',$_POST[class],'$_POST[name]',$_POST[price],'$_POST[info]','$_POST[desc]','$_POST[visible]','$_POST[level]'");
					$this->logs->insert('id,type,count,date,uid,content,remark',"'','添加',1,'".date('Y-m-d H:i:s')."',$uid,'添加配件 $_POST[name] 价格为 $_POST[price]',''");
					$this->url('添加成功！');
				}
			}else{
				$return = $this->partprice->where("id=$_GET[id]")->find();
				if(!empty($return)){
					$this->partprice->where("id=$_GET[id]")->update("name='$_POST[name]',cid=$_POST[class],price=$_POST[price],info='$_POST[info]',`desc`='$_POST[desc]',`visible`='$_POST[visible]',`level`='$_POST[level]'");
					$this->url('更新成功！');
				}else{
					$this->partprice->insert("'',$_POST[class],'$_POST[name]',$_POST[price],'$_POST[info]','$_POST[desc]','$_POST[visible]','$_POST[level]'");
					$this->url('添加成功！');
				}
			}
			
		}
		
		if(!empty($_GET['id'])){
			for($i=0;$i<count($this->prj['myclass']);$i++){
				//echo $this->prj['myclass'][$i]['cid'].'===='.getClass($_GET['id'],'cid').'<br>';
				if($this->prj['myclass'][$i]['cid']==getClass($_GET['id'],'cid')){
					$this->prj['myclass'][$i]['select'] = 'selected';
				}
			}
			$this->prj['myclass']['price']=$this->partprice->where("id=$_GET[id]")->find();
			$this->prj['myclass']['price']['back'] = "<input class='button small' onClick=history.go(-1) type='button' value='返回'>";
		}

		$this->assign('prj',$this->prj);
		$this->display('SolutionPrice');
	}
	public function EditPrice(){
		$this->prj['title']='编辑报价-硕星信息，西安硕星信息技术有限公司';
		$this->prj['subtype'] = '修改';
		$class = M('class');
		$this->prj['myclass']=$class->select();
		$this->assign('prj',$this->prj);
		$this->display('SolutionPrice');	
	}
	public function ViewDetail(){
		if(!empty($_GET['sid'])){
			
		
			$this->prj['mycontent'] = array(
				"<p style='text-indent:2em'>西安硕星信息技术有限公司致力于为科研领域提供专业的计算模拟解决方案，公司始终本着“以信为本，以质取胜”的宗旨，着眼于市场需求，守信经营。客户在这里可以得到售前技术咨询，售中合理化方案和售后标准化服务等一整套完善的技术支持，从而最大限度的满足用户的需求。</p>",
				"<p style='text-indent:2em'>秉承精细工艺，严把品质检测， 提供满意服务，争创一流企业</p><p style='text-indent:2em'>硕星完善的服务制度，为产品保驾护航，保障客户享受高品质的产品体验与服务。优良的品质和卓越的服务也是硕星争创行业一流企业的信心来源。硕星始终秉承严谨、务实、高效率的工作态度服务于每一位客户。</p><p style='text-indent:2em'>硕星专业的服务体现在和用户沟通中更多是沟通用户软件使用方面的工作，硕星始终相信用户购买硬件不是目的，基于硬件使用自身的软件程序出理想的成果才是最终目的，所以在客户调研前期结合用户现用的软件、规模、环境、要求等制作出最合理解决方案，供用户参考选择。</p><p style='text-indent:2em'>硕星有着行业领先的服务体系，在行业中硬件成熟的前提下，将大量的精力致力于软件服务，硕星产品在送到客户手上后，实现开机直接使用的效果，操作系统、数据库、编译工具、相关领域科研软件等在交付客户前完成，并可根据客户的需求提供远程任务提交、多用户管理、作业调度系统等系统服务（含集群管理系统服务），后期提供专业技术支持，确保用户整套计算系统的正常使用。</p><p style='text-indent:2em'>硕星相信设备交付到客户手上后服务只是起点而非终点</p>",
				"<p>星蕴S系列</p><p style='text-indent:2em'>星蕴S系列产品属于硕星核心产品，定位于需要大量计算资源，做大规模及超大规模计算的客户，S系列产品能带来超强的能耗比，超高的计算性能让它成为新老用户的首选。</p><p>星蕴W系列</p><p style='text-indent:2em'>定位为入门级产品，主要服务于各大高校的老师，对做计算有一定需求，但规模不大的客户，提供够用的性能、优质的产品，性价比极高。</p><p>星蕴P系列</p><p>主要为计算规模较小的客户定制，满足轻量级、小规模计算需求。</p><p>星蕴B系列</p><p style='text-indent:2em'>主要为存储系列，支持RAID0、1、5、10等。可提高传输速率，大幅提高存储系统的数据吞吐量。</p>",
				"<p style='text-indent:2em'>星蕴系列基于高效能的散热系统以及静音技术，结合散热通道的合理分配，达到低噪音乃至静音的效果。 </p><p style='text-indent:2em'>根据不同用户的实际需求，基于高效散热以及低噪音的前提硕星提供塔式、4UU机架式、2UU机架式等机型以供选择。</p><p style='text-indent:2em'>星蕴系列产品基于和客户前期深入的沟通，在后期使用中高性能的计算能力将会使用户的计算结果更精确，并且减少计算时间，可以让用户有更多的时间对参数及模型本身进行更细致的工作，并且根据用户的程序以及软件情况，推荐更合适的专业显卡将会具有更真实的模拟过程，结合实验结果进行省事省力的验证。</p><p style='text-indent:2em'>星蕴系列产品在出厂前都要进行72U小时二次极限检测，确保硬件稳定性、系统稳定性、相关专业软件及环境的正常工作，降低客户使用中故障发生几率。</p>",
				"<p>提供计算领域3款专业软件的安装服务及有限后期技术支持服务（商业软件由用户提供)。</p>",
				"<p>科学计算库BLAS、ATLAS、LAPACK、ScaLAPACK、FFTW等。</p>",
				"<p>含有的软件开发环境支持 C、C++、Fortran,还包括了并行编译,以及基于GNU 软件含常用的科学作图与LATEX 文档写作软件。GCC、G77、Gfortran、Intel Fortran 编译器、并行编译 MPICH2U。</p>",
				"<p>可为用户完成数据处理、存储及并行计算Linux操作系统的安装（Windows系统安装需客户自己激活）和调试及系统优化；</p><p>可提供多任务多用户管理系统、远程作业系统、局域网搭建(3台及3台以下PC机免费搭建）；</p><p>可为用户完成MPI 并行计算环境的搭建 ，包含浮点计算数学库和相关编译工具；</p><p>可为用户提供所需的并行集群搭建及 Linux 系统管理，并提供相关培训 ，包含：系统使用、系统管理、系统维护等；</p><p>可为用户现有设备提供系统升级、硬件扩容及网络搭建服务；</p><p>可为用户安装所需其他软件，并提供相应的技术支持及必要的编译服务；</p><p>可为用户设置网络文件系统和并行计算系统、保证网络  安全并提供后期维护；</p><p>提供三年硬件质量保证及一年免费技术支持服务，2U4U 小时内响应，7 个工作日内解决问题。</p>",
				"<p style='text-indent:2em'> 集群  综合管理系统，支持最高权限用户远程管理,多用户多任务队列提交，可进行客户端远程提交任务，实现集群运行情况监控功能，后台采用数据库以支持集群历史运行状态信息的保存。统一告警平台，提供全方位的集群运行告警管理功能，可监控机架式服务器硬件状态的实时信息，最大限度保证集群的正常运行；实现并行集群的作业调度，配合搭建MPI并行计算环境，提高集群计算资源利用率，支持提交任务的多队列管理，各个队列可分别设置不同管理策略、可根据用户作业的运行状况动态调整用户优先级；具有良好的稳定性和高可用性的作业调度系统，系统发生故障后可自动恢复对作业系统中已运行、排队作业的管理，不丢失作业数据。</p>",
				"<p>人民币捌万贰仟圆整  (¥82000)</p>",
				"价格有效期:2019年4月8日—2019年4月11日",
				"专注品质 用心服务",
				"西安硕星信息技术有限公司",
				"https://www.shuoxing.info/ 400-693-3112  西安雁塔南方星座",
				"网址：https://www.shuoxing.info &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 电话：400-693-3112 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 地址：西安市雁塔区南方星座C座",
				array(
					array('名称','型号','外观','功耗'),
					array('星蕴流体力学集群计算模拟平台','星蕴SPT200','4U机架式','小于1000W'),
				),
				array(
					array('配件','CPU','平台','内存','系统盘','数据盘','电源'),
					array('技术参数','两颗Intel Xeon Gold 5118 CPU,共2U4UCores, 4U8Threads；2U.3GHz主频,16.5MB L3 Smart Cache;平台基于领先的 14U 纳米制程工艺打造,集成六通道DDR4U 内存控制器,单颗CPU最大支持768GB DDR4U ECC CPU Registered 内存,支持 Intel AVX-512U 指令集,全新 RDT 资源调配技术，虚拟化增强技术和全新优化可信执行技术。',
					'基于硕星最新星蕴SPT系列,支持 2U颗Intel    ® Xeon  Scalable ® 系列处理器;采用全新 Intel C62U1 芯片组;基于最新 PCIE3 通讯总线技术,支持多种PCI-E 3.0 扩展接口;集成高速USB 3.0 接口;Intel 双千兆网络控制器;ACPI 4U.0 高级电源管理接口。',
					'96GB（16GB*6） DDR4U RECC 内存；速度快、安全性高、稳定性好,适用于中高端服务器及图形工作站，最多支持8个内存插槽(内存可选8GB/16GB/32UGB)',
					'240GB SSD/连续读取速度：高达500 MB/s连续写入速度：高达400MB/s',
					'8TB 72U00RPM企业级 SATA 6Gb/s 2U56MB Smart Cache；最大支持10个硬盘驱动器接口, 支 持RAID0,1,5,10;',
					'500W/80Plu金牌认证/转化效率高达90%/7*2U4U小时高速运',
					),
					array('金额','18000','11200','7200','700','2800','400'),
					array('数量','1套'),
				),
				
			);
			
			
			$this->prj['printsolu']="<small><a href='http://prj.shuoxing.info:8888/index.php/Solution/viewdetailprint/sid/1' target='view_window'>打印</a></small>";
			$this->assign('prj',$this->prj);
			$this->display('SolutionViewDetail');
		}else{
			exit('参数错误!');
		}
	}
	
	public function ViewDetailPrint(){
		if(!empty($_GET['sid'])){
			
		
			$this->prj['mycontent'] = array(
				"<p style='text-indent:2em'>西安硕星信息技术有限公司致力于为科研领域提供专业的计算模拟解决方案，公司始终本着“以信为本，以质取胜”的宗旨，着眼于市场需求，守信经营。客户在这里可以得到售前技术咨询，售中合理化方案和售后标准化服务等一整套完善的技术支持，从而最大限度的满足用户的需求。</p>",
				"<p style='text-indent:2em'>秉承精细工艺，严把品质检测， 提供满意服务，争创一流企业</p><p style='text-indent:2em'>硕星完善的服务制度，为产品保驾护航，保障客户享受高品质的产品体验与服务。优良的品质和卓越的服务也是硕星争创行业一流企业的信心来源。硕星始终秉承严谨、务实、高效率的工作态度服务于每一位客户。</p><p style='text-indent:2em'>硕星专业的服务体现在和用户沟通中更多是沟通用户软件使用方面的工作，硕星始终相信用户购买硬件不是目的，基于硬件使用自身的软件程序出理想的成果才是最终目的，所以在客户调研前期结合用户现用的软件、规模、环境、要求等制作出最合理解决方案，供用户参考选择。</p><p style='text-indent:2em'>硕星有着行业领先的服务体系，在行业中硬件成熟的前提下，将大量的精力致力于软件服务，硕星产品在送到客户手上后，实现开机直接使用的效果，操作系统、数据库、编译工具、相关领域科研软件等在交付客户前完成，并可根据客户的需求提供远程任务提交、多用户管理、作业调度系统等系统服务（含集群管理系统服务），后期提供专业技术支持，确保用户整套计算系统的正常使用。</p><p style='text-indent:2em'>硕星相信设备交付到客户手上后服务只是起点而非终点</p>",
				"<p>星蕴S系列</p><p style='text-indent:2em'>星蕴S系列产品属于硕星核心产品，定位于需要大量计算资源，做大规模及超大规模计算的客户，S系列产品能带来超强的能耗比，超高的计算性能让它成为新老用户的首选。</p><p>星蕴W系列</p><p style='text-indent:2em'>定位为入门级产品，主要服务于各大高校的老师，对做计算有一定需求，但规模不大的客户，提供够用的性能、优质的产品，性价比极高。</p><p>星蕴P系列</p><p>主要为计算规模较小的客户定制，满足轻量级、小规模计算需求。</p><p>星蕴B系列</p><p style='text-indent:2em'>主要为存储系列，支持RAID0、1、5、10等。可提高传输速率，大幅提高存储系统的数据吞吐量。</p>",
				"<p style='text-indent:2em'>星蕴系列基于高效能的散热系统以及静音技术，结合散热通道的合理分配，达到低噪音乃至静音的效果。 </p><p style='text-indent:2em'>根据不同用户的实际需求，基于高效散热以及低噪音的前提硕星提供塔式、4UU机架式、2UU机架式等机型以供选择。</p><p style='text-indent:2em'>星蕴系列产品基于和客户前期深入的沟通，在后期使用中高性能的计算能力将会使用户的计算结果更精确，并且减少计算时间，可以让用户有更多的时间对参数及模型本身进行更细致的工作，并且根据用户的程序以及软件情况，推荐更合适的专业显卡将会具有更真实的模拟过程，结合实验结果进行省事省力的验证。</p><p style='text-indent:2em'>星蕴系列产品在出厂前都要进行72U小时二次极限检测，确保硬件稳定性、系统稳定性、相关专业软件及环境的正常工作，降低客户使用中故障发生几率。</p>",
				"<p>提供计算领域3款专业软件的安装服务及有限后期技术支持服务（商业软件由用户提供)。</p>",
				"<p>科学计算库BLAS、ATLAS、LAPACK、ScaLAPACK、FFTW等。</p>",
				"<p>含有的软件开发环境支持 C、C++、Fortran,还包括了并行编译,以及基于GNU 软件含常用的科学作图与LATEX 文档写作软件。GCC、G77、Gfortran、Intel Fortran 编译器、并行编译 MPICH2U。</p>",
				"<p>可为用户完成数据处理、存储及并行计算Linux操作系统的安装（Windows系统安装需客户自己激活）和调试及系统优化；</p><p>可提供多任务多用户管理系统、远程作业系统、局域网搭建(3台及3台以下PC机免费搭建）；</p><p>可为用户完成MPI 并行计算环境的搭建 ，包含浮点计算数学库和相关编译工具；</p><p>可为用户提供所需的并行集群搭建及 Linux 系统管理，并提供相关培训 ，包含：系统使用、系统管理、系统维护等；</p><p>可为用户现有设备提供系统升级、硬件扩容及网络搭建服务；</p><p>可为用户安装所需其他软件，并提供相应的技术支持及必要的编译服务；</p><p>可为用户设置网络文件系统和并行计算系统、保证网络  安全并提供后期维护；</p><p>提供三年硬件质量保证及一年免费技术支持服务，2U4U 小时内响应，7 个工作日内解决问题。</p>",
				"<p style='text-indent:2em'> 集群  综合管理系统，支持最高权限用户远程管理,多用户多任务队列提交，可进行客户端远程提交任务，实现集群运行情况监控功能，后台采用数据库以支持集群历史运行状态信息的保存。统一告警平台，提供全方位的集群运行告警管理功能，可监控机架式服务器硬件状态的实时信息，最大限度保证集群的正常运行；实现并行集群的作业调度，配合搭建MPI并行计算环境，提高集群计算资源利用率，支持提交任务的多队列管理，各个队列可分别设置不同管理策略、可根据用户作业的运行状况动态调整用户优先级；具有良好的稳定性和高可用性的作业调度系统，系统发生故障后可自动恢复对作业系统中已运行、排队作业的管理，不丢失作业数据。</p>",
				"<p>人民币捌万贰仟圆整  (¥82000)</p>",
				"价格有效期:2019年4月8日—2019年4月11日",
				"专注品质 用心服务",
				"西安硕星信息技术有限公司",
				"https://www.shuoxing.info/ 400-693-3112  西安雁塔南方星座",
				"网址：https://www.shuoxing.info &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 电话：400-693-3112 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 地址：西安市雁塔区南方星座C座",
				array(
					array('名称','型号','外观','功耗'),
					array('星蕴流体力学集群计算模拟平台','星蕴SPT200','4U机架式','小于1000W'),
				),
				array(
					array('配件','CPU','平台','内存','系统盘','数据盘','电源'),
					array('技术参数','两颗Intel Xeon Gold 5118 CPU,共2U4UCores, 4U8Threads；2U.3GHz主频,16.5MB L3 Smart Cache;平台基于领先的 14U 纳米制程工艺打造,集成六通道DDR4U 内存控制器,单颗CPU最大支持768GB DDR4U ECC CPU Registered 内存,支持 Intel AVX-512U 指令集,全新 RDT 资源调配技术，虚拟化增强技术和全新优化可信执行技术。',
					'基于硕星最新星蕴SPT系列,支持 2U颗Intel    ® Xeon  Scalable ® 系列处理器;采用全新 Intel C62U1 芯片组;基于最新 PCIE3 通讯总线技术,支持多种PCI-E 3.0 扩展接口;集成高速USB 3.0 接口;Intel 双千兆网络控制器;ACPI 4U.0 高级电源管理接口。',
					'96GB（16GB*6） DDR4U RECC 内存；速度快、安全性高、稳定性好,适用于中高端服务器及图形工作站，最多支持8个内存插槽(内存可选8GB/16GB/32UGB)',
					'240GB SSD/连续读取速度：高达500 MB/s连续写入速度：高达400MB/s',
					'8TB 72U00RPM企业级 SATA 6Gb/s 2U56MB Smart Cache；最大支持10个硬盘驱动器接口, 支 持RAID0,1,5,10;',
					'500W/80Plu金牌认证/转化效率高达90%/7*2U4U小时高速运',
					),
					array('金额','18000','11200','7200','700','2800','400'),
					array('数量','1套'),
				),
				
			);

			$this->prj['webwidth'] = 100;
			$this->prj['myjs'] = "<script src='"._P_."/js/print.js'></script>";
			$this->assign('prj',$this->prj);
			$this->display('SolutionViewDetailPrint',1);
			
		}else{
			exit('参数错误!');
		}
	}
	
	public function jinsong(){
		$this->display('jinsong',1);
	}
	
}