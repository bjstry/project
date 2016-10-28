<?php
class TechnologyC extends C{
	//public function __construct(){
	//	echo 1;
	//}
	public function Sign(){
		$class = M('class');
		$parts = M('Parts');
		$userinfo = session('uinfo');
		$departurl = getDepartment($userinfo['cid'],'url');
		if($departurl=='Sale'){
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}else{
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
			$prj['left'][] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
			$prj['left'][] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}
		$prj['myclass'] = $myclass;
		$prj['title']='技术部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Index(){
		$departid=4;
		$newmyclass;
		$newunmyclass;
		$class = M('class');
		$parts = M('Parts');
		$userinfo = session('uinfo');
		$departurl = getDepartment($userinfo['cid'],'url');
		if($departurl=='Sale'){
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}else{
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
			$prj['left'][] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
			$prj['left'][] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}
		$myclass = $class->select();
		$prj['myclass'] = $myclass;
		$prj['title']='技术部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		foreach($myclass as $val){
			$myparts = $parts->where("cid=$val[cid] and count>0 and location=$departid and project=0")->select();
			$val[count] = 0;
			foreach($myparts as $vval){
				$val[count]+=$vval[count];
			}
			$newmyclass[] = $val;
		}
		
		foreach($myclass as $val){
			$myunparts = $parts->where("cid=$val[cid] and count>0 and location=$departid and project<>0")->select();
			$val[count] = 0;
			foreach($myunparts as $vval){
				$val[count]+=$vval[count];
			}
			$newunmyclass[] = $val;
		}
		
		$prj['myclass'] = $newmyclass;
		$prj['myunclass'] = $newunmyclass;
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Add(){
		$user = M('projects');
		$userinfo = session('uinfo');
		$departurl = getDepartment($userinfo['cid'],'url');
		if($departurl=='Sale'){
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}else{
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
			$prj['left'][] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
			$prj['left'][] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		}
		$prj['title']='技术部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		
		if(isset($_POST['submit'])){
			$uinfo = session('uinfo');
			$user->insert("id,uid,prjname1,prjname2,prjcustomer,prjsaleman,prjsalephone,prjstatus,prjstart,prjfinish","'',$uinfo[id],'$_POST[prjname1]','$_POST[prjname2]','$_POST[prjcustomer]','$_POST[prjsaleman]',$_POST[prjsalephone],1,'$_POST[prjstart]',''");
			$this->url('项目创建成功！','/Technology');
		}
		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function ProjectManager(){
		$myprojects;
		$prj['title']='技术部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prjs = M('projects');
		$uid=$_SESSION[uinfo][id];
		$userinfo = session('uinfo');
		$departurl = getDepartment($userinfo['cid'],'url');
		if($departurl=='Sale'){
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			$prj['backurl']=URL.'/'.$departurl;
		}else{
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
			$prj['left'][] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
			$prj['left'][] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			$prj['backurl']=URL.'/'.$_GET['c'];
		}
		$projects = $prjs->where("uid=$uid or prjsaleman='$userinfo[urename]'")->select();
		foreach($projects as $val){
			$val['uid']=getRename($val[uid]);
			$val['prjstatus']=getPjstatus($val[prjstatus]);
			$myprojects[]=$val;
		}
		$prj['myprojects'] = $myprojects;
		$this->assign('prj',$prj);
		$this->display();
	}
	public function ProjectInfo(){
		if(!isset($_GET[pid])){
			exit('非法访问');
		}
		$parts = M('parts');
		$pid=$_GET['pid'];
		$prjs = M('projects');
		$userinfo = session('uinfo');
		$departurl = getDepartment($userinfo['cid'],'url');
		if($departurl=='Sale'){
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$departurl");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			$prj['backurl']=URL.'/'.$departurl;
		}else{
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
			$prj['left'][] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
			$prj['left'][] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			$prj[edit]='编辑';
			$prj['backurl']=URL.'/'.$_GET['c'];
		}
		$myprj = $prjs->where("id=$pid")->find();
		$myprj['prjstatus']=getPjstatus($myprj[prjstatus]);
		$myprj['uid']=getRename($myprj[uid]);
		$prj['myprj'] = $myprj;
		$prj['myparts'] = $parts->where("project=$pid")->select();
		$prj['title']='技术部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Prjedit(){
		if(!isset($_GET['pid'])){
			exit('非法访问');
		}
		$pid=$_GET[pid];
		$prjs = M('projects');
		$prj['myprjs'] = $prjs->where("id=$pid")->find();
		$prj['title']='项目编辑-硕星信息，西安硕星信息技术有限公司';
		$prj['stitle']=$myprj['prjname1'].$myprj['prjcustomer'];
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		
		if(isset($_POST[submit])){
			$prjs->where("id=$pid")->update("sn='$_POST[sn]',prjname1='$_POST[prjname1]',prjname2='$_POST[prjname2]',prjcustomer='$_POST[prjcustomer]',prjsaleman='$_POST[prjsaleman]',prjsalephone=$_POST[prjsalephone],prjstart='$_POST[prjstart]',prjstatus=$_POST[prjstatus]");
			$this->url('更新成功','/Technology');
		}
		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Logs(){
		
	}
	public function View(){
		if(isset($_GET['type'])){
			if($_GET['type']==0){
				$where="project=0";
			}else if($_GET['type']==1){
				$where="project<>0";
			}
			$newmyparts;
			$type=$_GET['val'];
			$departid=4;
			$parts = M('parts');
			$partwhere = null;
			$partwhere = "cid=$type and count>0 and location=$departid and $where";
			$myparts = $parts->where($partwhere)->select();
			foreach($myparts as $val){
				$val['incharge'] = getRename($val['incharge']);
				$val['project'] = getProject($val['project']);
				$newmyparts[] = $val;
			}
		}
		$prj['myparts'] = $newmyparts;
		$prj['title'] = "配件详情-硕星系统";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function GetParts(){
		$prjs = M('projects');
		$parts = M('parts');
		$uid=$_SESSION[uinfo][id];
		$projects = $prjs->where("uid=$uid")->select();
		foreach($projects as $val){
			$val['uid']=getRename($val[uid]);
			$val['prjstatus']=getPjstatus($val[prjstatus]);
			$myprojects[]=$val;
		}
		
		if(isset($_POST['submit'])){
			$parts->where("id=$_GET[pid]")->update("project=$_POST[pjid],incharge=$uid");
			$this->url('配件领用成功！','/Technology');
		}
		
		$prj['myprojects'] = $myprojects;
		$prj['title'] = "配件领用-硕星系统";
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
}
?>