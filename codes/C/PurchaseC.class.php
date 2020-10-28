<?php

class PurchaseC extends C{
	
	public $prj;  //定义输出
	public $userinfo; //定义用户信息
	public $departurl; //定义部门链接
	public $logs; //定义日志类
	public $pagenb;   //定义每页日志条数
	public $pagekey;  //定义翻页关键字
	public $partclass; //定于分类类
	public $partprice; //定义配件价格类
	public $parts; //定义配件合集
	public $prjs; //定义配件合集
	public $users; //定义用户类
	
	public function Speekinit(){
		$this->prj['title'] = "采购部，硕星管理系统，西安硕星，硕星信息，西安硕星信息技术有限公司";
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['myjs'] = "<script type='text/javascript' src='"._P_."/outgo.js'></script>";
		$this->prj['webwidth'] = 80;
		
		$this->userinfo = session('uinfo');
		$this->departurl = getDepartment($this->userinfo['cid'],'url');
		$this->logs = M('logs');
		$this->user = M('user');
		$this->partclass = M('class');
		$this->parts = M('Parts');
		$this->prjs = M('projects');
		$this->pagenb = 15;  //定义默认每页条数
		$this->pagekey = 'page'; //定义默认翻页关键字
		$this->partclass = M('class');
		$this->users = M('user');
		
	}
	/*
	parts表 status 表示配件状态，1 为未报销  0 为已报销  2 为报销中*
	explist 表 status 表示报销状态 1 未报销 0 为已报销
	*/

	public function Kucun(){
		$departid=6;
		$myclass = $this->partclass->where('gid=1')->select();
		//$myclass = $class->where('fid=0')->select();
		$newmyclass;
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$this->prj['myclass'] = $myclass;
		if(isset($_POST['refresh'])){
			//$myclass=null;
			foreach($myclass as $val){
				//echo 'cid=>'.$val['cid'].'   name=>'.$val[cname].' 数量 '.$val[count].'---';
				$myparts = $this->parts->where("cid=$val[cid] and count>0 and location=$departid")->select();
				$val[count] = 0;
				foreach($myparts as $vval){
					$val[count]+=$vval[count];
					//$val[count] = 0;
				}
				$newmyclass[] = $val;
				$this->partclass->where("cid=$val[cid]")->update("count=$val[count]");
				//echo ' 新数量 '.$val[count].'<br>';
			}
			//header("location: ".URL.'/'.$_GET['c']);
			$this->prj['myclass'] = $newmyclass;
		}
		//print_r($myclass);
		
		if(isset($_POST['search_pid'])){
			$pid = $_POST['pid'];
			$result = $this->parts->where("id=$pid")->select();
			if(empty($result)){
				$this->url('未找到该配件');
			}else{
				$this->url('操作成功！',"/Purchase/viewdetail/pid/$pid");
			}
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Index(){
		$departid=6;
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$this->prj['myclass'] = $myclass;
		$this->prj['parts'] = $this->parts->where("location!=0")->order('id')->select(100);
		$this->prj['wdparts'] = $this->parts->where("location=8")->order('id')->select(100);
		$this->prj['wpparts'] = $this->parts->where("kpstatus=2 and location!=0")->order('id')->select(100);
		$this->assign('prj',$this->prj);
		$this->display();
	}
	

	public function Fpindex(){
		
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$myfp = M('Fapiao');
		$this->prj['fapiao_arr'] = $myfp->select();		
		if($_POST['tjfp']){
			if($myfp->insert("id,pid,value,remark","'','$_POST[pid]','$_POST[val]','$_POST[remark]'")){
				if($this->logs->insert('id,type,count,date,uid,content,remark',"'','登记发票',1,'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'登记发票 : $_POST[val]',''")){
					$this->URL("登记发票成功!");
				}
			}
		}
		
		if(isset($_GET['delete'])){
			$id=$_GET['delete'];
			if(empty($id)){
				exit('非法操作');
			}else{
				$myfp->where("id=$id")->delete();
				if($this->logs->insert('id,type,count,date,uid,content,remark',"'','移除发票',1,'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'移除发票ID : $id',''")){
					$this->URL("移除发票成功!");
				}
			}
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}

	public function Fpdetail(){
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$myfp = M('Fapiao');
		if(empty($_GET['id'])){
		    exit('非法访问!');
		}else{
		    if($_GET['id'] == 1){
		        $fp_arr['id'] = 1;
		        $fp_arr['value'] = '00000000';
		        $fp_arr['remark'] = '之前未录入已到发票';
		    }else if($_GET['id']==2){
		        $fp_arr['id'] = 2;
		        $fp_arr['value'] = '00000000';
		        $fp_arr['remark'] = '未到未知发票';
		    }else{
		        $fp_arr = $myfp->where("id=$_GET[id]")->find();
		    }
		    $this->prj['fp_arr'] = $fp_arr;
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Fpguixiang(){
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$myfp = M('Fapiao');
		$prjs = M('projects');
		if(empty($_GET['id'])){
			exit('非法操作!');
		}else{
			$this->prj['fpid'] = $_GET['id'];
		}
		
		if($_POST['submit']){
			$pid = $_POST['pid'];
			if($myprj = $prjs->where("id=$pid")->find()){
				if($myfp->where("id=$_GET[id]")->update("pid=$pid")){
					if($this->logs->insert('id,type,count,date,uid,content,remark',"'','发票归项',1,'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'发票ID : $_GET[id] 分配到项目: $pid',''")){
					$this->URL("发票归项成功!");
					}
				}
			}else{
				exit('不存在的项目！');
			}
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Test(){
		$mytest = M('test');
		$tests = $mytest->select();
		$price = ($tests[0]['price'] + $tests[1]['price'])*7+900;
		echo $price;
		print_r($tests);
	}
	public function Add(){
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['myclass'] = $myclass;
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Ruku(){
		if(empty($_GET['id'])){
			exit('非法访问!');
		}else{
			$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
			$id = $_GET['id'];
			$mypart = $this->parts->where("id=$id")->find();
			$this->prj['rukuid'] = $id;
			$this->assign('prj',$this->prj);
			if($_POST['ruku']){
				$bymkdate = mktime();
				$bydate = date("Ymd",$bymkdate);
				$this->parts->where("id=$id")->update("sn='$_POST[sn]',location=6,bydate='$bydate'");
				$this->URL('入库成功');
			}
			$this->display();
		}
	}
	
	
	public function Fapiao(){
		if(empty($_GET['id'])){
			exit('非法访问!');
		}else{
			$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
			$id = $_GET['id'];
			$myfp = M('Fapiao');
			$mypart = $this->parts->where("id=$id")->find();
			$this->prj['fpid'] = $id;
			$this->assign('prj',$this->prj);
			if($_POST['fapiao']){
				if(!empty($_POST['kpstatus'])){
					$fp_arr = $myfp->where("id=$_POST[kpstatus]")->find();
					if($fp_arr){
						$this->parts->where("id=$id")->update("kpstatus=$_POST[kpstatus]");
						$this->URL('更新成功!');
					}else{
						exit('未登记此发票!');
					}
				}else{
					exit('请输入规范的发票ID!');
				}
			}
			$this->display();
		}
	}
	
	public function Editdetail(){
		if(empty($_GET['id'])){
			exit('非法访问!');
		}else{
			$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
			$id = $_GET['id'];
			$mypart = $this->parts->where("id=$id")->find();
			$this->prj['edid'] = $id;
			$this->prj['oldsn'] = $mypart['sn'];
			if($_POST['edit']){
				$this->parts->where("id=$id")->update("sn='$_POST[sn]'");
				if($this->logs->insert('id,type,count,date,uid,content,remark',"'','编辑',$mypart[count],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],' 旧SN:".$this->prj['oldsn']."   修改为 新SN:$_POST[sn]',''")){
					$this->url('编辑成功！','/Purchase/Index');
				}
			}
			$this->assign('prj',$this->prj);
			$this->display();
		}
	}
	
	
	public function Prj_up(){
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Prj_upcheck(){
		if($_POST['upfile']){
			$return = prj_up();
			print_r($return);
		}
	}
	public function AddCheck(){
		if(isset($_POST['add'])){
			$departid=6;
			$bymkdate = mktime();
			$bydate = date("Ymd",$bymkdate);
			$post_arr = $_POST;
			if($post_arr['type'] == 3){
				if(strlen($post_arr['sn']) < 5){
					exit('请输入正确的内存SN/序列码');
				}
			}

			if($this->parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,bydate,indate,count,remark,location,incharge,status,kpstatus',"'',$_POST[type],'$_POST[name]','$_POST[model]','$_POST[sn]',$_POST[cap],'$_POST[cap_type]','$_POST[sup]',$_POST[price],'$bydate','$_POST[indate]',$_POST[count],'$_POST[remark]',$departid,".$this->userinfo['id'].",$_POST[status],$_POST[kpstatus]")){
				if($this->partclass->where("cid=$_POST[type]")->update("count=count+$_POST[count]")){
					if($this->logs->insert('id,type,count,date,uid,content,remark',"'','入库',$_POST[count],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'id=$myparts[id] $_POST[name] $_POST[model] 价格:$_POST[price] $_POST[cap] SN:$_POST[sn]',''")){
						$this->url('入库成功！','/Purchase/Index');
					}
				}else{
					echo '配件入库失败！';
					exit();
				}
			}else{
				echo 'error ! 4';
			}
		}else{
			$this->url('非法访问1！');
		}
	}
	
	public function Dengji(){
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['myclass'] = $myclass;
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	//登记采购明细
	public function DengjiCheck(){
		if(isset($_POST['add'])){
			$departid=8;
			$bymkdate = mktime();
			$bydate = date("Ymd",$bymkdate);
			$post_arr = $_POST;
			if($this->parts->insert('id,cid,name,model,cap,cap_type,supplier,price,bydate,indate,count,remark,location,incharge,status,kpstatus',"'',$_POST[type],'$_POST[name]','$_POST[model]',$_POST[cap],'$_POST[cap_type]','$_POST[sup]',$_POST[price],'$bydate','$_POST[indate]',$_POST[count],'$_POST[remark]',$departid,".$this->userinfo['id'].",$_POST[status],$_POST[kpstatus]")){
				if($this->partclass->where("cid=$_POST[type]")->update("count=count+$_POST[count]")){
					if($this->logs->insert('id,type,count,date,uid,content,remark',"'','采购登记',$_POST[count],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'id=$myparts[id] $_POST[name] $_POST[model] 价格:$_POST[price] $_POST[cap] SN:$_POST[sn]',''")){
						$this->url('登记成功！','/Purchase/Index');
					}
				}else{
					echo '采购登记失败！';
					exit();
				}
			}else{
				echo 'error ! 4';
			}
		}else{
			$this->url('非法访问1！');
		}
	}
	
	public function Outgo(){
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['myclass'] = $myclass;
		$this->prj['title'] = "硕星库存系统-出库";
		if($_POST['submit']){
			$departid=6;
			$partwhere = null;
			if(!$_POST[sn]==''){
				$partwhere = "cid=$_POST[class] and count>0 and location=$departid and sn like '%$_POST[sn]%'";
			}else{
				$partwhere = "cid=$_POST[class] and count>0 and location=$departid ";
			}
			$myparts = $this->parts->where($partwhere)->select();
			if(!empty($myparts)){
				//$this->assign('myparts',$myparts);
				$this->prj['myparts'] = $myparts;
			}
		}
		if($_POST['outgo']){
			if(empty($_POST['outcount'])){
				exit('请输入正确的数量！');
			}else if($_POST['outcount']<=0){
				exit('请输入正确的数量！');
			}

			$departid = 4;
			$myexppart = M('exppart');
			$partwhere = "id=$_POST[id]";
			$myparts = $this->parts->where($partwhere)->find();
			if(!empty($myparts)){
				if($myparts['count']>=$_POST['outcount']){
					if($myparts['count']==$_POST['outcount']){
						$this->parts->where($partwhere)->update("location=$departid,incharge=".$this->userinfo['id']);
						if($this->logs->insert('id,type,count,date,uid,content,remark',"'','出库',$_POST[outcount],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'id=$myparts[id] $myparts[name] $myparts[model] $myparts[cap]$myparts[cap_type] SN:$myparts[sn]',''")){
							$this->url('出库成功！','/Purchase/Outgo');
						}
						$this->url('出库成功！','/Purchase/Outgo');
					}else{
						if($this->parts->where("id=$_POST[id]")->update("count=count-$_POST[outcount]")){
							$newid=$this->parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,indate,count,remark,location,project,incharge,status,kpstatus',"'',$myparts[cid],'$myparts[name]','$myparts[model]','$myparts[sn]',$myparts[cap],'$myparts[cap_type]','$myparts[supplier]',$myparts[price],'$myparts[indate]',$_POST[outcount],'$myparts[remark]',$departid,'$myparts[project]',".$this->userinfo['id'].",$myparts[status],$myparts[kpstatus]");
							if($myparts['status'] == 0 or $myparts['status'] == 2){
								$myparteid = $myexppart->where("pid=$myparts[id]")->find();
								$myexppart->insert('eid,pid',"$myparteid[eid],$newid");
									
								
							}
							if($myclass->where("cid=$_POST[cid]")->update("count=count-$_POST[outcount]")){
								if($this->logs->insert('id,type,count,date,uid,content,remark',"'','出库',$_POST[outcount],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'id=$myparts[id] $myparts[name] $myparts[model] $myparts[cap]$myparts[cap_type] SN:$myparts[sn]',''")){
									$this->url('出库成功！','/Purchase/Outgo');
								}
							}else{
								die('更新存库数量出错了！');
							}
						}else{
							die('更新配件数量出错了！');
						}
					}
				}else{
					die('没有那么多库存！');
				}
			}else{
				die('没有找到该物品');
			}
		}
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Chaifen(){
		if(empty($_GET['id'])){
			exit('非法访问!');
		}else{

			$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
			$id = $_GET['id'];
			$explist = M('explist');
			$exparts = M('exppart');
			$mypart = $this->parts->where("id=$id")->find();
			$this->prj['cfid'] = $id;
			$this->assign('prj',$this->prj);
			if($_POST['chaifen']){
				if($mypart['count'] - $_POST['count'] > 0){
					if($this->parts->where("id=$id")->update("count=count-$_POST[count]")){
						$newid=$this->parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,indate,count,remark,location,project,incharge,status,kpstatus',"'',$mypart[cid],'$mypart[name]','$mypart[model]','$mypart[sn]',$mypart[cap],'$mypart[cap_type]','$mypart[supplier]',$mypart[price],'$mypart[indate]',$_POST[count],'$_POST[remark]',$mypart[location],'$mypart[project]',$mypart[incharge],$mypart[status],$mypart[kpstatus]");
						if($myexpart = $exparts->where("pid=$id")->find()){
							$exparts->insert("$myexpart[eid],$newid,''");
						}
						if($this->logs->insert('id,type,count,date,uid,content,remark',"'','拆分',$_POST[count],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'id=$mypart[id] to id=$newid $mypart[name] $mypart[model] $mypart[cap]$mypart[cap_type] SN:$mypart[sn]',''")){
							$this->url('拆分成功！','/Purchase/Index');
						}
					}
				}else{
					exit('数量不足!');
				}
			}
			$this->display();
		}
	}
	
	//操作日志方法
	public function Logs(){
		if(empty($_GET[$this->pagekey])){
			$_GET[$this->pagekey] = 1;
		}
		$page = $_GET[$this->pagekey];
		$pagecl = ($page-1)*$this->pagenb;
		if($this->userinfo['gid']==0){
			$this->prj['logsshow'] = $this->logs->where("type='出库' or type='入库' or type='归库' or type='撤销入库' or type='采购登记' or type='拆分' or type='编辑' or type='登记发票' or type='移除发票'")->order('id')->select("$pagecl,$this->pagenb");
		}else{
			$this->prj['logsshow'] = $this->logs->where("(type='出库' or type='入库' or type='归库' or type='撤销入库 or type='采购登记' or type='拆分' or type='编辑' or type='登记发票 or type='移除发票'') and uid=".$this->userinfo['id'])->select("$pagecl,$this->pagenb");
		}
		//$logs_arr = $this->prj['logs'];
		foreach($this->prj['logsshow'] as $key=>$value){
			//print_r($value);
			$theuserinfo = $this->users->where("id=$value[uid]")->find();
			//print_r($userinfo);
			$value['uid'] = $theuserinfo['urename'];
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
	public function View(){
		if(isset($_GET['type'])){
			$type=$_GET['type'];
			$departid=6;
			$partwhere = null;
			$partwhere = "cid=$type and count>0 and location=$departid ";
			$myparts = $this->parts->where($partwhere)->select();
		}
		$this->prj['myparts'] = $myparts;
		$this->prj['title'] = "库存详情-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Viewdetail(){
		$logs = M('logs');
		if(isset($_GET['pid'])){
			$partid=$_GET['pid'];
			$departid=6;
			$partwhere = null;
			$partwhere = "id=$partid ";
			$myparts = $this->parts->where($partwhere)->select();
		}
		$partid = $myparts[0]['id'];
		$this->prj['mylogs'] = $logs->where("content like '%id=$partid%'")->select();
		for ($i=0;$i<count($this->prj['mylogs']);$i++){
			$this->prj['mylogs'][$i]['uid'] = getRename($this->prj['mylogs'][$i]['uid']);
		}
		$this->prj['myparts'] = $myparts;
		/*if($this->prj['myparts'][0]['kpstatus'] == 0){
			$this->prj['myparts'][0]['kpstatus'] = '无票';
		}else{
			$this->prj['myparts'][0]['kpstatus'] = '有票';
		}*/
		$this->prj['title'] = "库存详情-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function ViewdetailTest(){
		if(isset($_GET['pid'])){
			$partid=$_GET['pid'];
			$departid=6;
			$partwhere = null;
			$partwhere = "id=$partid ";
			$myparts = $this->parts->where($partwhere)->select();
		}
		$partid = $myparts[0]['id'];
		$this->prj['mylogs'] = $this->logs->where("content like '%id=$partid%'")->select();
		for ($i=0;$i<count($this->prj['mylogs']);$i++){
			$this->prj['mylogs'][$i]['uid'] = getRename($this->prj['mylogs'][$i]['uid']);
		}
		$this->prj['myparts'] = $myparts;
		if($this->prj['myparts'][0]['kpstatus'] == 0){
			$this->prj['myparts'][0]['kpstatus'] = '无票';
		}else{
			$this->prj['myparts'][0]['kpstatus'] = '有票';
		}
		$this->prj['title'] = "库存详情-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function GetBack(){
		if(empty($_GET['pid'])){
			exit('非法访问！');
		}else{
			$thepart = getArr(array('parts','id',$_GET['pid']));
			if($this->logs->insert('id,type,count,date,uid,content,remark',"'','撤销入库',$thepart[count],'".date('Y-m-d H:i:s')."',$_SESSION[jspjuid],'id=$myparts[id] $thepart[name] $thepart[model] $thepart[cap] $thepart[cap_type] SN:$thepart[sn]',''")){
				$this->parts->where("id=$_GET[pid]")->update("location=0");
				$this->url('撤销入库成功！','/Purchase');
			}
		}
	}
	
	public function Expense(){
		$explist = M('explist');
		$myexplist = $explist->order('id')->select();
		$myparts = $this->parts->where("status=1 and location!=0 and location!=8")->select();
		for($i=0;$i<count($myexplist);$i++){
			$myexplist[$i][idate] = date("y年m月d日", $myexplist[$i]['idate']);
			if($myexplist[$i][fdate] !=0){
				$myexplist[$i][fdate] = date("y年m月d日", $myexplist[$i]['fdate']);
			}
			if($myexplist[$i][status] == 0){
				$myexplist[$i][statustr] = "<font color=green>已报</font>";
			}else{
				$myexplist[$i][statustr] = '<font color=red>未报</font>';
			}
		}
		for($i=0;$i<count($myparts);$i++){
			$myparts[$i]['cid'] = getFieldValue('class',array('cid',$myparts[$i][cid]),'rname');
		}
		//print_r($myparts);
		$this->prj['title'] = "报销-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		$this->prj['parts'] = $myparts;
		$this->prj['explist'] = $myexplist;
		
		if($_POST['cexp']){
			$explist->insert("'',1,'$_POST[name]',0,0,".mktime().",'',0,''");
			$this->url('提交成功！');
		}
		
		if(!empty($_GET['eid'])){
			$exparts = M('exppart');
			$myexparts = $exparts->where("eid=$_GET[eid]")->select();
			$myprice;
			foreach($myexparts as $val){
				$mypart = $this->parts->where("id=$val[pid] and location!=0")->select();
				//print_r($mypart);
				$myprice+=$mypart[0]['price']*$mypart[0]['count'];
			}
			
			$explist->where("id=$_GET[eid]")->update("price=$myprice");
			//print_r($myexparts);
			$this->url('更新成功！','/Purchase/Expense');
		}
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Exping(){
		$exppt = M('exppart');
		$explist = M('explist');
		$myexplist = $explist->where("status=1")->order('id')->select();
		$this->prj['explist'] = $myexplist;
		
		$this->prj['title'] = "报销-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		$this->prj['parts'] = $myparts;
		$this->prj['explist'] = $myexplist;
		
		if($_POST['submit']){
			
			$myparts = $this->parts->where("id=$_GET[pid]")->find();
			$exppt->insert("$_POST[eid],$_GET[pid],''");
			$myexlistarr = $explist->where("id=$_POST[eid]")->find();
			$explist->where("id=$_POST[eid]")->update("price=$myexlistarr[price]+$myparts[price]*$myparts[count]");
			$this->parts->where("id=$_GET[pid]")->update('status=2');
			$this->url('操作成功！','/Purchase/Expense#tab3');
		}
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Expview(){
		$exppt = M('exppart');
		$explist = M('explist');
		$tmpparts;
		$this->prj['title'] = "报销-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

		
		if($_GET[eid]){
			
			$myexppt = $exppt->where("eid=$_GET[eid]")->select();
			//print_r($this->prj['exparts']);
			for($i=0;$i<count($myexppt);$i++){
				$mywhere = $myexppt[$i][pid];
				$tmpparts[] = $this->parts->where("id=$mywhere")->find();
			}
			
			for($i=0;$i<count($tmpparts);$i++){
				if($tmpparts[$i]['location']!=0){
					$this->prj['exparts'][] = $tmpparts[$i];
				}
			}
			
			for($i=0;$i<count($this->prj['exparts']);$i++){
				$this->prj['exparts'][$i]['cid'] = getFieldValue('class',array('cid',$this->prj['exparts'][$i][cid]),'rname');
				if($this->prj['exparts'][$i][kpstatus] == 0){
					$this->prj['exparts'][$i][kpstatus] = '无';
				}else{
					$this->prj['exparts'][$i][kpstatus] = '有';
				}
			}
		}else{
			exit('非法访问！');
		}
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function ExpviewTest(){
		if($_SESSION['jspjuid'] == 1 or $_SESSION['jspjuid'] == 2){

			$exppt = M('exppart');
			$explist = M('explist');
			$tmpparts;
			$this->prj['title'] = "报销-硕星系统";
			$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

			
			if($_GET[eid]){
				
				$myexppt = $exppt->where("eid=$_GET[eid]")->select();
				//print_r($this->prj['exparts']);
				for($i=0;$i<count($myexppt);$i++){
					$mywhere = $myexppt[$i][pid];
					$tmpparts[] = $this->parts->where("id=$mywhere")->find();
					
				}
				
				for($i=0;$i<count($tmpparts);$i++){
					if($myexppt[$i]['finprice'] == 0){
						$tmpparts[$i]['finprice'] = $tmpparts[$i]['price'];
					}else{
						$tmpparts[$i]['finprice'] = $myexppt[$i]['finprice'];
					}
					if($tmpparts[$i]['location']!=0){
						$this->prj['exparts'][] = $tmpparts[$i];
					}
				}
				//print_r($tmpparts);
				//print_r($myexppt);
				for($i=0;$i<count($this->prj['exparts']);$i++){
					$this->prj['exparts'][$i]['cid'] = getFieldValue('class',array('cid',$this->prj['exparts'][$i][cid]),'rname');
					if($this->prj['exparts'][$i][kpstatus] == 0){
						$this->prj['exparts'][$i][kpstatus] = '无';
					}else{
						$this->prj['exparts'][$i][kpstatus] = '有';
					}
				}
				$this->prj['expinfo']=$explist->where("id=$_GET[eid]")->find();
				//print_r($this->prj['expinfo']);
			}else{
				exit('非法访问！');
			}
			
			$this->assign('prj',$this->prj);
			$this->display();
		}else{
			exit('非法访问!');
		}
	}
	
	public function ExpviewTV(){
		if($_SESSION['jspjuid'] == 1 or $_SESSION['jspjuid'] == 2){
			$exppt = M('exppart');
			$explist = M('explist');
			$tmpparts;
			$this->prj['title'] = "报销-硕星系统";
			$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";

			
			if($_GET[eid]){
				
				$myexppt = $exppt->where("eid=$_GET[eid]")->select();
				//print_r($this->prj['exparts']);
				for($i=0;$i<count($myexppt);$i++){
					$mywhere = $myexppt[$i][pid];
					$tmpparts[] = $this->parts->where("id=$mywhere")->find();
					
				}
				
				for($i=0;$i<count($tmpparts);$i++){
					if($myexppt[$i]['finprice'] == 0){
						$tmpparts[$i]['finprice'] = $tmpparts[$i]['price'];
					}else{
						$tmpparts[$i]['finprice'] = $myexppt[$i]['finprice'];
					}
					if($tmpparts[$i]['location']!=0){
						$this->prj['exparts'][] = $tmpparts[$i];
					}
				}
				//print_r($tmpparts);
				//print_r($myexppt);
				for($i=0;$i<count($this->prj['exparts']);$i++){
					$this->prj['exparts'][$i]['cid'] = getFieldValue('class',array('cid',$this->prj['exparts'][$i][cid]),'rname');
					if($this->prj['exparts'][$i][kpstatus] == 0){
						$this->prj['exparts'][$i][kpstatus] = '无';
					}else{
						$this->prj['exparts'][$i][kpstatus] = '有';
					}
				}
				$this->prj['expinfo']=$explist->where("id=$_GET[eid]")->find();
				//print_r($this->prj['expinfo']);
			}else{
				exit('非法访问！');
			}
			
			$this->assign('prj',$this->prj);
			$this->display();
		}else{
			exit('非法访问!');
		}
	}
	
	public function expcheck(){
		if($_SESSION['jspjuid'] == 1 or $_SESSION['jspjuid'] == 2){
			if($_POST['expsub']){
				$exppt = M('exppart');
				$explist = M('explist');
				$expArr = $_POST;
				//echo 0;
				if(!empty($_GET['eid'])){

					//echo 1;
					foreach($expArr as $key=>$val){
						if($key=='ctprice'){
							$explist->where("id=$_GET[eid]")->update("finprice=$val");
							//echo 2;
						}else if($key=='remark'){
							$explist->where("id=$_GET[eid]")->update("remark='$val'");
							//echo 3;
						}else if($key=='othprice'){
							$explist->where("id=$_GET[eid]")->update("othprice=$val");
							//echo 4;
						}else if($key=='expsub'){
							//echo 5;
						}else if($epresult = $exppt->where("pid=$key")->find()){
							$exppt->where("pid=$key")->update("finprice=$val");
							//echo 6;
							//print_r($epresult);
						}
						//echo $key.'==>'.$val.'<br>';
						//echo 7;
					}
					$nowtime = mktime();
					$explist->where("id=$_GET[eid]")->update("status=0,fdate=$nowtime");
					//echo 8;
					$this->url('操作成功！','/Purchase/Expense');
					
				}else{
					//echo 999;
				}
			}
		}else{
			exit('非法访问!');
		}
	}
}
