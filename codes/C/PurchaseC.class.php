<?php

class PurchaseC extends C{
	/*
	parts表 status 表示配件状态，1 为未报销  0 为已报销  2 为报销中
	*/
	public function Speekinit(){
		if(empty($_SESSION['uid'])){
			$this->url('请登录','/index/login');
		}
	}
	public function Index(){
		$departid=6;
		$class = M('class');
		$parts = M('Parts');
		$myclass = $class->select();
		//$myclass = $class->where('fid=0')->select();
		$newmyclass;
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['title'] = "库存，硕星管理系统，西安硕星信息技术有限公司";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['myclass'] = $myclass;
		if(isset($_POST['refresh'])){
			//$myclass=null;
			foreach($myclass as $val){
				//echo 'cid=>'.$val['cid'].'   name=>'.$val[cname].' 数量 '.$val[count].'---';
				$myparts = $parts->where("cid=$val[cid] and count>0 and location=$departid")->select();
				$val[count] = 0;
				foreach($myparts as $vval){
					$val[count]+=$vval[count];
					//$val[count] = 0;
				}
				$newmyclass[] = $val;
				$class->where("cid=$val[cid]")->update("count=$val[count]");
				//echo ' 新数量 '.$val[count].'<br>';
			}
			//header("location: ".URL.'/'.$_GET['c']);
			$prj['myclass'] = $newmyclass;
		}
		//print_r($myclass);
		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Add(){
		$class = M('class');
		$myclass = $class->select();
		$prj['myclass'] = $myclass;
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function AddCheck(){
		if(isset($_POST['add'])){
			$userinfo = session('uinfo');
			$departid=6;
			$parts = M('parts');
			$class = M('class');
			$logs = M('logs');
			if($parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,indate,count,remark,location,incharge,status,kpstatus',"'',$_POST[type],'$_POST[name]','$_POST[model]','$_POST[sn]',$_POST[cap],'$_POST[cap_type]','$_POST[sup]',$_POST[price],'$_POST[indate]',$_POST[count],'$_POST[remark]',$departid,$userinfo[id],$_POST[status],$_POST[kpstatus]")){
				if($class->where("cid=$_POST[type]")->update("count=count+$_POST[count]")){
					if($logs->insert('id,type,count,date,uid,content,remark',"'','入库',$_POST[count],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$_POST[name] $_POST[model] 价格:$_POST[price] $_POST[cap] SN:$_POST[sn]',''")){
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
	public function Outgo(){
		$class = M('class');
		$myclass = $class->select();
		$prj['myclass'] = $myclass;
		$prj['myjs'] = "<script type='text/javascript' src='"._P_."/outgo.js'></script>";
		$prj['title'] = "硕星库存系统-出库";
		
		if($_POST['submit']){
			$departid=6;
			$parts = M('parts');
			$partwhere = null;
			if(!$_POST[sn]==''){
				$partwhere = "cid=$_POST[class] and count>0 and location=$departid and sn like '%$_POST[sn]%'";
			}else{
				$partwhere = "cid=$_POST[class] and count>0 and location=$departid ";
			}
			$myparts = $parts->where($partwhere)->select();
			if(!empty($myparts)){
				//$this->assign('myparts',$myparts);
				$prj['myparts'] = $myparts;
			}
		}
		if($_POST['outgo']){
			if(empty($_POST['outcount'])){
				exit('请输入正确的数量！');
			}else if($_POST['outcount']<=0){
				exit('请输入正确的数量！');
			}
			$userinfo = session('uinfo');
			$departid = 4;
			$parts = M('parts');
			$myexppart = M('exppart');
			$logs = M('logs');
			$myclass = M('class');
			$partwhere = "id=$_POST[id]";
			$myparts = $parts->where($partwhere)->find();
			if(!empty($myparts)){
				if($myparts['count']>=$_POST['outcount']){
					if($myparts['count']==$_POST['outcount']){
						$parts->where($partwhere)->update("location=$departid,incharge=$userinfo[id]");
						if($logs->insert('id,type,count,date,uid,content,remark',"'','出库',$_POST[outcount],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$myparts[name] $myparts[model] $myparts[cap]$myparts[cap_type] SN:$myparts[sn]',''")){
							$this->url('出库成功！','/Purchase/Outgo');
						}
						$this->url('出库成功！','/Purchase/Outgo');
					}else{
						if($parts->where("id=$_POST[id]")->update("count=count-$_POST[outcount]")){
							$newid=$parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,indate,count,remark,location,project,incharge,status,kpstatus',"'',$myparts[cid],'$myparts[name]','$myparts[model]','$myparts[sn]',$myparts[cap],'$myparts[cap_type]','$myparts[supplier]',$myparts[price],'$myparts[indate]',$_POST[outcount],'$myparts[remark]',$departid,'$myparts[project]',$userinfo[id],$myparts[status],$myparts[kpstatus]");
							if($myparts['status'] == 0 or $myparts['status'] == 2){
								$myparteid = $myexppart->where("pid=$myparts[id]")->find();
								$myexppart->insert('eid,pid',"$myparteid[eid],$newid");
									
								
							}
							if($myclass->where("cid=$_POST[cid]")->update("count=count-$_POST[outcount]")){
								if($logs->insert('id,type,count,date,uid,content,remark',"'','出库',$_POST[outcount],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$myparts[name] $myparts[model] $myparts[cap]$myparts[cap_type] SN:$myparts[sn]',''")){
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
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Logs(){
		$pagenb = 10;
		$pagekey = 'page';
		if(empty($_GET[$pagekey])){
			$_GET[$pagekey] = 1;
		}
		$page = $_GET[$pagekey];
		$pagecl = ($page-1)*$pagenb;
		$logs = M('logs');
		$user = M('user');
		if($_SESSION['uinfo']['gid']==0){
			$prj['logsshow'] = $logs->where("type='出库' or type='入库' or type='撤销入库'")->order('id')->select("$pagecl,$pagenb");
		}else{
			$prj['logsshow'] = $logs->where("(type='出库' or type='入库' or type='撤销入库') and uid=".$_SESSION['uinfo']['id'])->select("$pagecl,$pagenb");
		}
		//$logs_arr = $prj['logs'];
		foreach($prj['logsshow'] as $key=>$value){
			//print_r($value);
			$userinfo = $user->where("id=$value[uid]")->find();
			//print_r($userinfo);
			$value['uid'] = $userinfo['urename'];
			$prj['logsshow'][$key] = $value;
			//$logs_arr[uid] = $userinfo['uname'];
		}
		//$prj['logs'] = $logs_arr; 
		$mypages = $logs->pageint('',$pagenb,$pagekey,'','');
		$prj['title'] = "操作记录-硕星系统";
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['mypages'] = $mypages;
		$this->assign('prj',$prj);
		$this->display();
	}
	public function View(){
		if(isset($_GET['type'])){
			$type=$_GET['type'];
			$departid=6;
			$parts = M('parts');
			$partwhere = null;
			$partwhere = "cid=$type and count>0 and location=$departid ";
			$myparts = $parts->where($partwhere)->select();
		}
		$prj['myparts'] = $myparts;
		$prj['title'] = "库存详情-硕星系统";
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function GetBack(){
		
		if(empty($_GET['pid'])){
			exit('非法访问！');
		}else{
			$logs = M('logs');
			$parts = M('parts');
			$thepart = getArr(array('parts','id',$_GET['pid']));
			if($logs->insert('id,type,count,date,uid,content,remark',"'','撤销入库',$thepart[count],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$thepart[name] $thepart[model] $thepart[cap] $thepart[cap_type] SN:$thepart[sn]',''")){
				$parts->where("id=$_GET[pid]")->update("location=0");
				$this->url('撤销入库成功！','/Purchase');
			}
		}
	}
	
	public function Expense(){
		$parts = M('parts');
		$explist = M('explist');
		$myexplist = $explist->select();
		$myparts = $parts->where("status=1 and location!=0")->select();
		for($i=0;$i<count($myexplist);$i++){
			$myexplist[$i][idate] = date("Y年m月d日", $myexplist[$i]['idate']);
		}
		for($i=0;$i<count($myparts);$i++){
			$myparts[$i]['cid'] = getFieldValue('class',array('cid',$myparts[$i][cid]),'cname');
		}
		//print_r($myparts);
		$prj['title'] = "报销-硕星系统";
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['parts'] = $myparts;
		$prj['explist'] = $myexplist;
		
		if($_POST['cexp']){
			$explist->insert("'',1,'$_POST[name]',0,".mktime().",''");
			$this->url('提交成功！');
		}
		
		if(!empty($_GET['eid'])){
			$exparts = M('exppart');
			$myexparts = $exparts->where("eid=$_GET[eid]")->select();
			$myprice;
			foreach($myexparts as $val){
				$mypart = $parts->where("id=$val[pid] and location!=0")->select();
				//print_r($mypart);
				$myprice+=$mypart[0]['price']*$mypart[0]['count'];
			}
			
			$explist->where("id=$_GET[eid]")->update("price=$myprice");
			//print_r($myexparts);
			$this->url('更新成功！','/Purchase/Expense');
		}
		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Exping(){
		$parts = M('parts');
		$exppt = M('exppart');
		$explist = M('explist');
		$myexplist = $explist->select();
		$prj['explist'] = $myexplist;
		
		$prj['title'] = "报销-硕星系统";
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['parts'] = $myparts;
		$prj['explist'] = $myexplist;
		
		if($_POST['submit']){
			$parts->where("id=$_GET[pid]")->update('status=2');
			$myparts = $parts->where("id=$_GET[pid]")->find();
			$exppt->insert("$_POST[eid],$_GET[pid]");
			$myexlistarr = $explist->where("id=$_POST[eid]")->find();
			$explist->where("id=$_POST[eid]")->update("price=$myexlistarr[price]+$myparts[price]*$myparts[count]");
			$this->url('操作成功！','/Purchase/Expense#tab3');
		}
		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Expview(){
		$parts = M('parts');
		$exppt = M('exppart');
		$explist = M('explist');
		$tmpparts;
		$prj['title'] = "报销-硕星系统";
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		
		if($_GET[eid]){
			
			$myexppt = $exppt->where("eid=$_GET[eid]")->select();
			//print_r($prj['exparts']);
			for($i=0;$i<count($myexppt);$i++){
				$mywhere = $myexppt[$i][pid];
				$tmpparts[] = $parts->where("id=$mywhere")->find();
			}
			
			for($i=0;$i<count($tmpparts);$i++){
				if($tmpparts[$i]['location']!=0){
					$prj['exparts'][] = $tmpparts[$i];
				}
			}
			
			for($i=0;$i<count($prj['exparts']);$i++){
				$prj['exparts'][$i]['cid'] = getFieldValue('class',array('cid',$prj['exparts'][$i][cid]),'cname');
				if($prj['exparts'][$i][kpstatus] == 0){
					$prj['exparts'][$i][kpstatus] = '无票';
				}else{
					$prj['exparts'][$i][kpstatus] = '有票';
				}
			}
		}else{
			exit('非法访问！');
		}
		
		$this->assign('prj',$prj);
		$this->display();
	}
}
