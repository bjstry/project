<?php
class TechnologyC extends C{
	
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
	
	public function Speekinit(){
		
		$this->prj['title']='技术部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
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

		if($this->departurl=='Sale'){
			$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$this->departurl");
			$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
			$this->prj['left'][] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
			$this->prj['left'][] = array('name'=>'提交售后','url'=>URL."/Technology/CustAdd");
			$this->prj['left'][] = array('name'=>'售后进度','url'=>URL."/Technology/CustomerService");
			$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
			$this->prj['backurl']=URL.'/'.$this->departurl;
		}else{
			$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$this->prj['left'][] = array('name'=>'提交售后','url'=>URL."/$_GET[c]/CustAdd");
			$this->prj['left'][] = array('name'=>'售后进度','url'=>URL."/$_GET[c]/CustomerService");
			$this->prj['left'][] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
			$this->prj['left'][] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
			$this->prj['left'][] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
			if($this->userinfo['gid']==0){
				$this->prj['left'][] = array('name'=>'操作日志','url'=>URL."/$_GET[c]/Logs");
			}
			$this->prj['left'][] = array('name'=>'返回功能区','url'=>URL);
			$this->prj['backurl']=URL.'/'.$_GET['c'];
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
			$this->prj['logsshow'] = $this->logs->where("type='领用' or type='返还' or type='归库'")->order('id')->select("$pagecl,$this->pagenb");
		}else{
			$this->prj['logsshow'] = $this->logs->where("(type='领用' or type='返还' or type='归库') and uid=".$this->userinfo['id'])->select("$pagecl,$this->pagenb");
		}
		
		foreach($this->prj['logsshow'] as $key=>$value){

			$theuserinfo = $this->user->where("id=$value[uid]")->find();
			$value['uid'] = $theuserinfo['urename'];
			$this->prj['logsshow'][$key] = $value;
			
		}
		//$this->prj['logs'] = $logs_arr; 
		$mypages = $this->logs->pageint('',$this->pagenb,$this->pagekey,'','is-active');
		$this->prj['title'] = "操作记录-硕星系统";
		$this->prj['logs'] = "<li><a href='".URL."/Purchase/Logs'>操作记录</a></li>";
		$this->prj['mypages'] = $mypages;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Sign(){   //验收单打印(测试,未完成)

		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Index(){
		$departid=4;
		$newmyclass;
		$newunmyclass;
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['myclass'] = $myclass;

		foreach($myclass as $val){
			$myparts = $this->parts->where("cid=$val[cid] and count>0 and location=$departid and project=0")->select();
			$val[count] = 0;
			foreach($myparts as $vval){
				$val[count]+=$vval[count];
			}
			$newmyclass[] = $val;
		}
		
		foreach($myclass as $val){
			if($this->userinfo['gid']!=0){
				$myunparts = $this->parts->where("cid=$val[cid] and count>0 and location=$departid and project<>0 and incharge=".$this->userinfo['id'])->select();
			}else{
				$myunparts = $this->parts->where("cid=$val[cid] and count>0 and location=$departid and project<>0")->select();
			}
			$val[count] = 0;
			foreach($myunparts as $vval){
				$val[count]+=$vval[count];
			}
			$newunmyclass[] = $val;
		}
		
		
		if(isset($_POST['search_sb'])){
			$sn = $_POST['search_sn'];
			$myprjs = $this->prjs->where("sn='$sn' or prjname1 like '$sn' or prjname2 like '$sn' or prjcustomer like '$sn'")->select();
			if(empty($myprjs)){
				$this->url('项目不存在!');
			}else{
				$pid = $myprjs[0][id];
				//$this->url('操作成功！',"/Technology/ProjectInfo/pid/$pid");
			}
			//print_r($myprjs);
		}
		
		$this->prj['myclass'] = $newmyclass;
		$this->prj['myunclass'] = $newunmyclass;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function SearchList(){
		$departid=4;
		$newmyclass;
		$newunmyclass;
		if($this->departurl=='Sale'){
			exit('你没有此权限!');
		}
		$myclass = $this->partclass->where('gid=1')->select();
		$this->prj['myclass'] = $myclass;

		
		if(isset($_POST['search_sb'])){
			$sn = $_POST['search_sn'];
			$myprjs = $this->prjs->where("sn='$sn' or prjname1 like '%$sn%' or prjname2 like '%$sn%' or prjcustomer like '%$sn%'")->select();
			if(empty($myprjs)){
				$this->url('项目不存在!');
			}else{
				foreach($myprjs as $val){
					if($this->departurl=='Sale'){
						//$val['prjstatus'] = '2';
					}
					$val['uid']=getRename($val[uid]);
					$val['prjstatus']=getPjstatus($val[prjstatus]);
					$myprojects[]=$val;
				}
				$this->prj['myprojects'] = $myprojects;
			}
			//print_r($myprjs);
		}
		
		$this->prj['myclass'] = $newmyclass;
		$this->prj['myunclass'] = $newunmyclass;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Add(){

		if($this->departurl=='Sale'){
			exit('你没有此权限!');
		}

		if(isset($_POST['submit'])){
			$this->prjs->insert("id,uid,prjname1,prjname2,prjcustomer,prjsaleman,prjsalephone,prjstatus,prjstart,prjfinish,prjkey","'',".$this->userinfo['id'].",'$_POST[prjname1]','$_POST[prjname2]','$_POST[prjcustomer]','$_POST[prjsaleman]',$_POST[prjsalephone],1,'$_POST[prjstart]','','$_POST[prjkey]'");
			$this->url('项目创建成功！','/Technology');
		}
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function ProjectManager(){
		$myprojects;
		$uid=$this->userinfo[id];
		if($this->userinfo['id']==1){
			$projects = $this->prjs->where("prjstatus!=0 and prjstatus!=7")->order('id')->select();
		}else if($this->userinfo['cid']==4){
			$projects = $this->prjs->where("prjstatus!=0 and prjstatus!=7")->order('id')->select();
		}else{
			$projects = $this->prjs->where("(uid=$uid or prjsaleman='".$this->userinfo[urename]."') and prjstatus!=0 and prjstatus!=7")->order('id')->select();
		}
		foreach($projects as $val){
			if($departurl=='Sale'){
				//$val['prjstatus'] = '2';
			}
			$val['uid']=getRename($val[uid]);
			$val['prjstatus']=getPjstatus($val[prjstatus]);
			$myprojects[]=$val;
		}
		$this->prj['myprojects'] = $myprojects;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function DocManager(){
		
		if(empty($_GET[$this->pagekey])){
			$_GET[$this->pagekey] = 1;
		}
		$page = $_GET[$this->pagekey];
		$pagecl = ($page-1)*$this->pagenb;
		$myprojects;
		

		$uid=$this->userinfo[id];

		if($this->userinfo['id']==1){
			$projects = $this->prjs->where("prjstatus=7")->order('id')->select("$pagecl,$this->pagenb");
		}else if($this->userinfo['cid']==4 && $this->userinfo['gid']==0){
			$projects = $this->prjs->where("prjstatus=7")->order('id')->select("$pagecl,$this->pagenb");
		}else{
			$projects = $this->prjs->where("prjstatus=7")->order('id')->select("$pagecl,$this->pagenb");
		}
		//print_r($projects);
		foreach($projects  as $val){
			//echo $val['uid']."<br>";
			$val['uid']=getRename($val[uid]);
			$val['prjstatus']=getPjstatus($val[prjstatus]);
			$myprojects[]=$val;
		}
		$mypages = $this->prjs->pageint('',$this->pagenb,$this->pagekey,'','is-active');
		$this->prj['mypages'] = $mypages;
		$this->prj['myprojects'] = $myprojects;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function ProjectInfo(){  //档案管理,无大部分编辑作用
		if(!isset($_GET[pid])){
			exit('非法访问');
		}
		
		$myaction = M('prjaction');
		$pid=$_GET['pid'];
		$uid = getFieldValue('projects',array('id',$pid),'uid');
		
			if($uid == $this->userinfo[id] or $this->userinfo[id]==2){
				
				$this->prj[edit]="<a href='".URL."/".$_GET[c]."/Prjedit/pid/$pid'>编辑</a>";
			}
			$this->prj[actionadd] = "<a href='".URL."/$_GET[c]/prjaca/pid/$_GET[pid]' class='button small primary'>增加</a>";
			$this->prj['backurl']=URL.'/'.$_GET['c'];

		
		
		$this->prj['actions'] = $myaction->where("pid=$pid")->select();
		//print_r($this->prj['actions']);
		for($i=0;$i<count($this->prj['actions']);$i++){
			$this->prj['actions'][$i]['uid'] = getFieldValue('user',array('id',$this->prj[actions][$i][uid]),'urename');
		}
		$myprj = $this->prjs->where("id=$pid")->find();
		$myprj['prjstatus']=getPjstatus($myprj[prjstatus]);
		$myprj['uid']=getRename($myprj[uid]);
		$this->prj['myprj'] = $myprj;
		$this->prj['backurl'] = URL.'/Technology/ProjectManager';
		$this->prj['myparts'] = $this->parts->where("project=$pid")->select();
		foreach($this->prj['myparts'] as $key=>$val){
			$val['incharge'] = getRename($val['incharge']);
			$this->prj['myparts'][$key] = $val;
		}

		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function ProjectInfoTest(){ //项目管理
		if(!isset($_GET[pid])){
			exit('非法访问');
		}
		$myaction = M('prjaction');
		$pid=$_GET['pid'];
		$this->prj['uinfo'] = $this->userinfo;
		$uid = getFieldValue('projects',array('id',$pid),'uid');
		
			if($uid == $this->userinfo[id] or $this->userinfo[id] == 2){
				$this->prj[edit]="<a href='".URL."/".$_GET[c]."/Prjedit/pid/$pid'>编辑</a>";
			}
			$this->prj[actionadd] = "<a href='".URL."/$_GET[c]/prjaca/pid/$_GET[pid]' class='button small primary'>增加</a>";
			$this->prj['backurl']=URL.'/'.$_GET['c'];
		
		$this->prj['actions'] = $myaction->where("pid=$pid")->select();
		//print_r($this->prj['actions']);
		for($i=0;$i<count($this->prj['actions']);$i++){
			$this->prj['actions'][$i]['uid'] = getFieldValue('user',array('id',$this->prj[actions][$i][uid]),'urename');
		}
		$myprj = $this->prjs->where("id=$pid")->find();
		$myprj['prjstatus']=getPjstatus($myprj[prjstatus]);
		$myprj['uid']=getRename($myprj[uid]);
		$this->prj['myprj'] = $myprj;
		$this->prj['backurl'] = URL.'/Technology/ProjectManager';
		$this->prj['myparts'] = $this->parts->where("project=$pid")->select();
		foreach($this->prj['myparts'] as $key=>$val){
			$val['incharge'] = getRename($val['incharge']);
			$this->prj['myparts'][$key] = $val;
		}

		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function Prjedit(){
		if(!isset($_GET['pid'])){
			exit('非法访问');
		}
		$pid=$_GET[pid];
		$this->prj['myprjs'] = $this->prjs->where("id=$pid")->find();
		$this->prj['stitle']=$myprj['prjname1'].$myprj['prjcustomer'];

		if(isset($_POST[submit])){
			if($_POST[prjstatus]==5){
				$_POST['sn'] = getSN($pid); 
			}
			$this->prjs->where("id=$pid")->update("sn='$_POST[sn]',prjname1='$_POST[prjname1]',prjname2='$_POST[prjname2]',prjcustomer='$_POST[prjcustomer]',prjsaleman='$_POST[prjsaleman]',prjsalephone=$_POST[prjsalephone],prjstart='$_POST[prjstart]',prjfinish='$_POST[prjfinish]',prjstatus=$_POST[prjstatus],prjkey='$_POST[prjkey]'");
			$this->url('更新成功','/Technology');
		}
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function View(){
		
		if(isset($_GET['type'])){
			if($_GET['type']==0){
				$where="project=0";
			}else if($_GET['type']==1){
				if($this->userinfo['gid']!=0){
					$where="project<>0  and incharge=".$this->userinfo['id'];
				}else{
					$where="project<>0";	
				}
			}
			$newmyparts;
			$type=$_GET['val'];
			$departid=4;
			$partwhere = null;
			$partwhere = "cid=$type and count>0 and location=$departid and $where";
			$myparts = $this->parts->where($partwhere)->select();
			foreach($myparts as $val){
				$val['incharge'] = getRename($val['incharge']);
				$val['project'] = getProject($val['project']);
				$newmyparts[] = $val;
			}
		}
		$this->prj['myparts'] = $newmyparts;
		$this->prj['title'] = "配件详情-硕星系统";

		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function GetParts(){
		

		$uid=$this->userinfo[id];
		if($uid == 2){
			$projects = $this->prjs->where("prjstatus!=7")->order("id")->select();
		}else{
			$projects = $this->prjs->where("uid!=2 and prjstatus!=7")->order("id")->select();
		}
		foreach($projects as $val){
			$val['uid']=getRename($val[uid]);
			$val['prjstatus']=getPjstatus($val[prjstatus]);
			$myprojects[]=$val;
		}
		
		if(isset($_POST['submit'])){
			$this->parts->where("id=$_GET[pid]")->update("project=$_POST[pjid],incharge=$uid");
			$myparts = $this->parts->where("id=$_GET[pid]")->find();
			$this->prjname = getProject($_POST[pjid]);
			$this->logs->insert('id,type,count,date,uid,content,remark',"'','领用',$myparts[count],'".date('Y-m-d H:i:s')."',$uid,'领用配件 $myparts[name]$myparts[model] id=$myparts[id] 分配给 <a href=\'".URL."/Technology/ProjectInfo/pid/$_POST[pjid]\'>$this->prjname</a>',''");
			$this->url('配件领用成功！','/Technology');
		}
		
		$this->prj['myprojects'] = $myprojects;
		$this->prj['title'] = "配件领用-硕星系统";

		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Prjaca(){
		if(!$_GET['pid']){
			exit('feifafangwen');
		}
		$myactions = M('prjaction');

	
		if($_POST['submit']){

			$myactions->insert("'',".$this->userinfo['id'].",$_GET[pid],'$_POST[actime]','$_POST[accontent]',".mktime().",'$_POST[acremark]'");
			$this->url('添加成功！','/Technology/ProjectManager');
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	// 配件返还未分配
	public function GetBack(){
		if(empty($_GET['pid'])){
			exit('非法访问！');
		}else{
			$uid=$this->userinfo[id];
			$this->parts->where("id=$_GET[pid]")->update("project=0,incharge=1");
			$myparts = $this->parts->where("id=$_GET[pid]")->find();
			$this->logs->insert('id,type,count,date,uid,content,remark',"'','返还',$myparts[count],'".date('Y-m-d H:i:s')."',$uid,'返还配件 $myparts[name]$myparts[model] id=$myparts[id] 到技术部<未分配>',''");
			$this->url('配件返还成功！','/Technology');
		}
	}
	// 配件归库
	public function GetWH(){
		if(empty($_GET['pid'])){
			exit('非法访问！');
		}else{
			$uid=$this->userinfo[id];
			$this->parts->where("id=$_GET[pid]")->update("location=6");
			$myparts = $this->parts->where("id=$_GET[pid]")->find();
			$this->logs->insert('id,type,count,date,uid,content,remark',"'','归库',$myparts[count],'".date('Y-m-d H:i:s')."',$uid,'配件 $myparts[name]$myparts[model] id=$myparts[id] 归还库房',''");
			$this->url('配件归库成功！','/Technology');
		}
	}
	
	// 售后服务
	public function CustomerService(){
		//售后状态servstat说明  0:未分配，1:未完成或者处理中，2:已完成，3:删除的售后
		$custserv = M('custserv');
		if($this->userinfo[id] == 1 or $this->userinfo[id] == 2 or $this->userinfo[id] == 5){
			$nocustserv = $custserv->where("servstat = 0")->order('id')->select();
			//获取处理中售后
			$mycustserv = $custserv->where("servstat = 1")->order('id')->select();
			//获取已完成售后
			$fscustserv = $custserv->where("servstat = 2")->order('id')->select();
			
			
			for($i=0;$i<count($nocustserv);$i++){
				$nocustserv[$i]['keyphone'] = getInfo($nocustserv[$i][saleman],'uphone');
				$nocustserv[$i]['keyman'] = getRename($nocustserv[$i][saleman]);
				$nocustserv[$i]['servstat'] = getServstat($nocustserv[$i][servstat]);
			}
			for($i=0;$i<count($mycustserv);$i++){
				$mycustserv[$i]['keyphone'] = getInfo($mycustserv[$i][saleman],'uphone');
				$mycustserv[$i]['keyman'] = getRename($mycustserv[$i][saleman]);
				$mycustserv[$i]['servstat'] = getServstat($mycustserv[$i][servstat]);
			}
			for($i=0;$i<count($fscustserv);$i++){
				$fscustserv[$i]['keyphone'] = getInfo($fscustserv[$i][saleman],'uphone');
				$fscustserv[$i]['keyman'] = getRename($fscustserv[$i][saleman]);
				$fscustserv[$i]['servstat'] = getServstat($fscustserv[$i][servstat]);
			}

		}else{
			//echo $departurl;
			if($this->departurl=='Sale'){
				//获取未分配售后
				$nocustserv = $custserv->where("servstat = 0 and saleman = ".$this->userinfo['id'])->order('id')->select();
				//获取处理中售后
				$mycustserv = $custserv->where("servstat = 1 and saleman = ".$this->userinfo['id'])->order('id')->select();
				//获取已完成售后
				$fscustserv = $custserv->where("servstat = 2 and saleman = ".$this->userinfo['id'])->order('id')->select();
	
	
				
		
				for($i=0;$i<count($nocustserv);$i++){
					$nocustserv[$i]['keyphone'] = getInfo($nocustserv[$i][saleman],'uphone');
					$nocustserv[$i]['keyman'] = getRename($nocustserv[$i][saleman]);
					$nocustserv[$i]['servstat'] = getServstat($nocustserv[$i][servstat]);
				}
				for($i=0;$i<count($mycustserv);$i++){
					$mycustserv[$i]['keyphone'] = getInfo($mycustserv[$i][techman],'uphone');
					$mycustserv[$i]['keyman'] = getRename($mycustserv[$i][techman]);
					$mycustserv[$i]['servstat'] = getServstat($mycustserv[$i][servstat]);
				}
				for($i=0;$i<count($fscustserv);$i++){
					$fscustserv[$i]['keyphone'] = getInfo($fscustserv[$i][techman],'uphone');
					$fscustserv[$i]['keyman'] = getRename($fscustserv[$i][techman]);
					$fscustserv[$i]['servstat'] = getServstat($fscustserv[$i][servstat]);
				}
				
			}else if($this->departurl=='Technology' or $this->departurl=='Index'){
				if($this->userinfo[id] != 1 and $this->userinfo[id] != 2 and $this->userinfo[id] != 5){
					//获取未分配售后
					$nocustserv = $custserv->where("servstat = 0")->order('id')->select();
					//获取处理中售后
					$mycustserv = $custserv->where("servstat = 1 and techman = ".$this->userinfo['id'])->order('id')->select();
					//获取已完成售后
					$fscustserv = $custserv->where("servstat = 2 and techman = ".$this->userinfo['id'])->order('id')->select();
				}else{
					//获取未分配售后
					$nocustserv = $custserv->where("servstat = 0")->order('id')->select();
					//获取处理中售后
					$mycustserv = $custserv->where("servstat = 1")->order('id')->select();
					//获取已完成售后
					$fscustserv = $custserv->where("servstat = 2")->order('id')->select();
				}
				
			
				
				for($i=0;$i<count($nocustserv);$i++){
					$nocustserv[$i]['keyphone'] = getInfo($nocustserv[$i][saleman],'uphone');
					$nocustserv[$i]['keyman'] = getRename($nocustserv[$i][saleman]);
					$nocustserv[$i]['servstat'] = getServstat($nocustserv[$i][servstat]);
				}
				for($i=0;$i<count($mycustserv);$i++){
					$mycustserv[$i]['keyphone'] = getInfo($mycustserv[$i][saleman],'uphone');
					$mycustserv[$i]['keyman'] = getRename($mycustserv[$i][saleman]);
					$mycustserv[$i]['servstat'] = getServstat($mycustserv[$i][servstat]);
				}
				for($i=0;$i<count($fscustserv);$i++){
					$fscustserv[$i]['keyphone'] = getInfo($fscustserv[$i][saleman],'uphone');
					$fscustserv[$i]['keyman'] = getRename($fscustserv[$i][saleman]);
					$fscustserv[$i]['servstat'] = getServstat($fscustserv[$i][servstat]);
				}
				
			}
		}

		
		

		
	//	print_r($mycustserv);
		$this->prj['myclass'] = $myclass;

		$this->prj['noserv'] = $nocustserv;
		$this->prj['myserv'] = $mycustserv;
		$this->prj['fsserv'] = $fscustserv;
		$this->assign('prj',$this->prj);
		
		
		
		$this->display();
	}
	
	
	//技术人员选择处理售后
	public function CustPick(){
		if($this->departurl != 'Technology'){
			exit('你没有这个权限!');
		}else{
			if(!empty($_GET['sid'])){
				$custserv = M('custserv');
				$cid = $_GET['sid'];
				$mycust = $custserv->where("id=$cid")->find();
				if(empty($mycust)){
					exit('参数返回值为空');
				}
				if($mycust['servstat']!=0){
					exit('请勿非法操作!');
				}else{
					$custserv->where("id=$cid")->update("techman=".$this->userinfo['id'].",servstat=1");
					$this->url('售后领取成功!','/Technology/CustomerService');
				}
			}else{
				exit('参数无效!');
			}
		}
	}
	
	//技术人员完成处理售后
	public function CustFinish(){
		if($this->departurl != 'Technology'){
			exit('你没有这个权限!');
		}else{
			if(!empty($_GET['sid'])){
				$custserv = M('custserv');
				$cid = $_GET['sid'];
				$mycust = $custserv->where("id=$cid")->find();
				if(empty($mycust)){
					exit('参数返回值为空');
				}
				if($mycust['servstat']!=1){
					exit('请勿非法操作!');
				}else{
					$endtime=date("Y.m.d-H:i:s");
					$custserv->where("id=$cid")->update("techman=".$this->userinfo['id'].",servstat=2,enddate='$endtime'");
					$this->url('售后状态更新成功!','/Technology/CustomerService');
				}
			}else{
				exit('参数无效!');
			}
		}
	}
	
	
	// 已完成售后
	public function CustOk(){
		$custserv = M('custserv');
		$mycustserv = $custserv->where("servstat!='0' and servstat = '完成'")->order('id')->select();
		$this->prj['myclass'] = $myclass;
		$this->prj['myserv'] = $mycustserv;
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	//查看售后详细信息
	public function CustInfo(){
		
		$custserv = M('custserv');
		
		if(!empty($_GET[cid])){
			$id = $_GET['cid'];
			$custserv = M('custserv');
			$myaction = M('custaction');
			$mcustserv = $custserv->where("id=$id")->find();
			$actions = $myaction->where("cid=$_GET[cid]")->select();
			if($this->userinfo['id'] == $mcustserv['saleman'] or $this->userinfo['id'] == $mcustserv['techman'] or $this->userinfo['id']==1 or $this->userinfo['id'] ==2){
				if($mcustserv['servstat'] == 1 or $this->userinfo['id'] == 2 or $this->userinfo['id'] == 1){
					$this->prj['actionadd'] = "<a href='".URL."/$_GET[c]/CustAction/cid/$id' class='button small primary'>增加</a>";
				}

				if($this->departurl=='Sale'){
					$mcustserv['keyphone'] = getInfo($mcustserv['techman'],"uphone");
				}else{
					$mcustserv['keyphone'] = getInfo($mcustserv['saleman'],"uphone");
				}
				$mcustserv['servstat'] = getServStat($mcustserv['servstat']);
				$mcustserv['techman'] = getRename($mcustserv['techman']);
				$mcustserv['saleman'] = getRename($mcustserv['saleman']);
				
				$this->prj['mcustserv'] = $mcustserv;
				
			}else{
				exit('请重试!');
			}
			for($i=0;$i<count($actions);$i++){
				$actions[$i]['uid'] = getRename($actions[$i]['uid']);
			}
			$this->prj['actions'] = $actions;
		}

		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	// 提交售后
	public function CustAdd(){
		$this->prj['myclass'] = $myclass;
		$this->prj['smen'] = $this->user->where('cid=2 and gid!=9')->select();
		$this->prj['tmen'] = $this->user->where('cid=4 and gid!=9')->select();
		if(!empty($_GET['sid'])){
			$custserv = M('custserv');
			if($this->userinfo[id]==2 or $this->userinfo[id]==1){
				$id = $_GET['sid'];
				$mcustserv = $custserv->where("id=$id")->find();
				$mcustserv[techman] = getRename($mcustserv[techman]);
				$mcustserv[saleman] = getRename($mcustserv[saleman]);
				$this->prj['mcustserv'] = $mcustserv;
			}else{
				exit('你没有此权限!');
			}
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	// 技术提交售后
	public function TechAdd(){
		$this->prj['myclass'] = $myclass;
		if(!empty($_GET['sid'])){
			if($this->userinfo[id]==2 or $this->userinfo[id]==1){
				$id = $_GET['sid'];
				$custserv = M('custserv');
				$mcustserv = $custserv->where("id=$id")->find();
				$mcustserv[techman] = getRename($mcustserv[techman]);
				$mcustserv[saleman] = getRename($mcustserv[saleman]);
				$this->prj['mcustserv'] = $mcustserv;
			}else{
				exit('你没有此权限!');
			}
		}
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function TechAddCheck(){
		if($_POST['submit']){
			//print_r($_POST);
		}
	}
	
	// 编辑或者提交售后
	public function CustAddCheck(){
		if(isset($_POST['submit'])){
			
			$custserv = M('custserv');
			if(!empty($_POST['id'])){
				$id = $_POST['id'];
				$_POST['techman'] = getUid($_POST['techman']);
				$_POST['saleman'] = getUid($_POST['saleman']);
				$custserv->where("id=$id")->update("name='$_POST[name]',servcont='$_POST[servcont]',servstat=$_POST[servstat],techman=$_POST[tmen],saleman=$_POST[smen],ctinfo='$_POST[ctinfo]',startdate='$_POST[startdate]',enddate='$_POST[enddate]'");
				$this->url('修改成功！','/Technology/CustomerService');
			}else{
				$smen = $_POST['smen'];
				if($smen == 0){
					$smen = $this->userinfo['id'];
				}
				$custserv->insert("id,name,servcont,servstat,techman,saleman,ctinfo,startdate,enddate","'','$_POST[name]','$_POST[servcont]','0',0,'$smen','$_POST[ctinfo]','$_POST[startdate]','$_POST[enddate]'");
				$this->url('提交成功！','/Technology/CustomerService');
			}
		}else{
			exit('非法访问');
		}
	}
	
	//售后操作相关记录
	public function CustAction(){
		if(!empty($_GET['cid'])){
			$this->prj['myclass'] = $myclass;

			
			if($_POST['submit']){
				$myaction = M('custaction');
				$myaction->insert("id,uid,cid,adate,avalue,sdate,remark","'',".$this->userinfo['id'].",$_GET[cid],'$_POST[actime]','$_POST[accontent]',".mktime().",''");
				$this->url('记录成功！','/Technology/CustomerService');
			}

			$this->assign('prj',$this->prj);
			$this->display();
		}else{
			exit('参数非法!');
		}
	}
	
	public function CustDel(){
		if(!empty($_GET['sid'])){
			$id = $_GET['sid'];
			if($this->departurl=='Technology'){
				$custserv = M('custserv');
				$custserv->where("id=$id")->update("servstat=3");
				$this->url('删除成功！');
			}else{
				exit('非法访问！');
			}
			
		}else{
			exit('非法访问!');
		}
	}
}
?>