<?php
class PurchaseC extends C{
	public function Index(){
		$departid=6;
		$class = M('class');
		$parts = M('Parts');
		$myclass = $class->where('fid=0')->select();
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
			$departid=6;
			$parts = M('parts');
			$class = M('class');
			$logs = M('logs');
			if($parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,indate,count,remark,location',"'',$_POST[type],'$_POST[name]','$_POST[model]','$_POST[sn]',$_POST[cap],'$_POST[cap_type]','$_POST[sup]',$_POST[price],'$_POST[indate]',$_POST[count],'$_POST[remark]',$departid")){
				if($class->where("cid=$_POST[type]")->update("count=count+$_POST[count]")){
					if($logs->insert('id,type,count,date,uid,content,remark',"'','入库',$_POST[count],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$_POST[name] $_POST[model] $_POST[cap]$_POST[cap_type] SN:$_POST[sn]',''")){
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
			$departid = 4;
			$parts = M('parts');
			$logs = M('logs');
			$myclass = M('class');
			$partwhere = "id=$_POST[id]";
			$myparts = $parts->where($partwhere)->find();
			if(!empty($myparts)){
				if($myparts['count']>=$_POST['outcount']){
					if($myparts['count']==$_POST['outcount']){
						$parts->where($partwhere)->update("location=$departid");
						if($logs->insert('id,type,count,date,uid,content,remark',"'','出库',$_POST[outcount],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$myparts[name] $myparts[model] $myparts[cap]$myparts[cap_type] SN:$myparts[sn]',''")){
							$this->url('出库成功！','/Purchase/Outgo');
						}
						$this->url('出库成功！','/Purchase/Outgo');
					}else{
						if($parts->where("id=$_POST[id]")->update("count=count-$_POST[outcount]")){
							$parts->insert('id,cid,name,model,sn,cap,cap_type,supplier,price,indate,count,remark,location,project,incharge',"'',$myparts[cid],'$myparts[name]','$myparts[model]','$myparts[sn]',$myparts[cap],'$myparts[cap_type]','$myparts[supplier]',$myparts[price],'$myparts[indate]',$_POST[outcount],'$myparts[remark]',$departid,'$myparts[project]',$myparts[incharge]");
							if($myclass->where("cid=$_POST[cid]")->update("count=count-$_POST[outcount]")){
								if($logs->insert('id,type,count,date,uid,content,remark',"'','出库',$_POST[outcount],'".date('Y-m-d H:i:s')."',$_SESSION[uid],'$myparts[name] $myparts[model] $myparts[cap]$myparts[cap_type] SN:$myparts[sn]',''")){
									$this->url('出库成功！','/Purchase/Outgo');
								}
							}else{
								echo '更新存库数量出错了！';
							}
						}else{
							echo '更新配件数量出错了！';
						}
					}
				}else{
					echo '没有那么多库存！';
				}
			}else{
				echo '没有找到该物品';
			}
		}
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Logs(){
		$logs = M('logs');
		$user = M('user');
		if($_SESSION['uinfo']['id']==1){
			$prj['logsshow'] = $logs->select();
		}else{
			$prj['logsshow'] = $logs->where("uid=".$_SESSION['uinfo']['id'])->select();
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
		$prj['title'] = "操作记录-硕星系统";
		$prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
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
}