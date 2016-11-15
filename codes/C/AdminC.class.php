<?php
class AdminC extends C{
	public function Index(){
		$prj['title']='后台管理-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		
	
		$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$prj['left'][] = array('name'=>'部门管理','url'=>URL."/$_GET[c]/Department");
		$prj['left'][] = array('name'=>'用户管理','url'=>URL."/$_GET[c]/User");
		$prj['left'][] = array('name'=>'分类管理','url'=>URL."/$_GET[c]/Pclass");
		$prj['left'][] = array('name'=>'返回首页','url'=>URL);

		
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Pclass(){
		if(!VerifySession('gid',0)){
			$class = M('class');
			$myclass = $class->select();
			$prj['title'] = "分类管理，硕星系统，西安硕星信息技术有限公司";
			$prj['myclass'] = $myclass;
			$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
			$prj['mangertitle'] = '分类管理';
			$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
			$prj['left'][] = array('name'=>'部门管理','url'=>URL."/$_GET[c]/Department");
			$prj['left'][] = array('name'=>'用户管理','url'=>URL."/$_GET[c]/User");
			$prj['left'][] = array('name'=>'分类管理','url'=>URL."/$_GET[c]/Pclass");
			$prj['left'][] = array('name'=>'返回首页','url'=>URL);
			$this->assign('prj',$prj);
			$this->display();
			if($_POST['edit']){
				echo 'edit<br>';
				print_r($_POST);
			}
			if($_POST['delete']){
				$myclass = M('class');
				if($myclass->where("cid=$_POST[cid]")->delete()){
					$this->url("删除分类成功！",'/Admin/Pclass');
				}else{
					echo '删除分类失败！';
				}
			}
			if($_POST['index']){
				echo "<script>location.href='".URL."';</script>";
			}
		}else{
			echo '非法访问 3 ！';
			exit();
		}
	}
	public function CreateCheck(){
		if(!VerifySession('gid',0)){
			if(isset($_POST['submit'])){
				$class = M('class');
				if($class->insert('`cid`,`fid`,`gid`,`cname`',"'',$_POST[fid],$_POST[gid],'$_POST[cname]'")){
					$this->url('创建分类成功！','/Admin/Pclass');
				}else{
					print_r($_POST);
					echo 'some things is wrong... 3!';
					exit();
				}
			}else{
				echo '非法访问 4 !';
				exit();
			}
		}else{
			echo '非法访问 5 ！';
			exit();
		}
	}
	public function User(){
		$user = M('User');
		$departs = M('Departs');
		$prj['users'] = $user->select();
		$prj['departs'] = $departs->select();
		$prj['mangertitle'] = '用户管理';
		$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$prj['left'][] = array('name'=>'部门管理','url'=>URL."/$_GET[c]/Department");
		$prj['left'][] = array('name'=>'用户管理','url'=>URL."/$_GET[c]/User");
		$prj['left'][] = array('name'=>'分类管理','url'=>URL."/$_GET[c]/Pclass");
		$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		if($_POST['submit']){
			$user->insert("'',$_POST[udepart],$_POST[ulevel],'$_POST[uname]','".md5($_POST['upass'])."','$_POST[uemail]',$_POST[uphone],'$_POST[urename]'");
			$this->url('添加成功！','/Admin/User');
		}
		
		$prj['title']='用户管理-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function UserChange(){
		$myuser = M('User');
		$user = $_SESSION['uinfo'];
		$prj['user'] = $user;
		if(isset($_POST['submit'])){
			if(md5($_POST['oldupass']) == $user['upass']){
				if($_POST['newupass'] == $_POST['newreupass']){
					if($_POST['newupass'] != $_POST['oldupass']){
						$myuser->where("id=$user[id]")->update("upass='".md5($_POST['newupass'])."',umail='$_POST[uemail]',uphone=$_POST[uphone],urename='$_POST[urename]'");
						$this->url('修改成功！','/Index/LoginOut');
					}else{
						$this->url('新旧密码不能一样!');
					}
				}else{
					$this->url('两次密码不一致！');
				}
			}else{
				$this->url('密码错误!');
			}
		}
		$prj['title']='用户管理-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function Department(){
		$prj['title']='部门管理-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['myjs'] = "<script type='text/javascript' src='".ROOT."/Public/default/admin.js'></script>";
		
		$myextend = M('de_extend');
	
		$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$prj['left'][] = array('name'=>'部门管理','url'=>URL."/$_GET[c]/Department");
		$prj['left'][] = array('name'=>'用户管理','url'=>URL."/$_GET[c]/User");
		$prj['left'][] = array('name'=>'分类管理','url'=>URL."/$_GET[c]/Pclass");
		$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		$departs = M('departs');
		$row = $departs->select();
		$prj['depart']['action'][] = array("action"=>"edit","name"=>"编辑");
		$prj['depart']['action'][] = array("action"=>"delete","name"=>"删除");
		for($i=0;$i<count($row);$i++){
			$row[$i]['fname']=getDepartment($row[$i]['fid'],'name');
			$did=$row[$i][id];
			$row[$i]['extend'] = $myextend->where("did=$did")->select();
			if(!empty($_GET['id'])){
				if($row[$i]['id']==getDepartment($_GET[id],'fid')){
					$row[$i]['select']='selected';
				}
			}
		}
		if($_GET['action']=='edit'){
			$prj['depart']['edit']='部门编辑';
			$prj['depart']['type']='提交';
			$departrow = $departs->where("id=$_GET[id]")->find();
			$prj['depart']['editrow'] = $departrow;
			if(isset($_POST['departedit'])){
				$departs->where("id=$_GET[id]")->update("name='$_POST[dename]',url='$_POST[deurl]',fid=$_POST[defid]");
				print_r($_POST['departedit']);
				//$this->url('修改成功！','/Admin/Department');
			}
		}else{
			$prj['depart']['edit']='部门添加';
			$prj['depart']['type']='添加';
			if(isset($_POST['departedit'])){
				$departs->insert("id,fid,name,url","'',$_POST[defid],'$_POST[dename]','$_POST[deurl]'");
				$this->url('添加成功!','/Admin/Department');
			}
			if($_GET['action']=='delete'){
				$departs->where("id=$_GET[id]")->delete();
				$this->url('删除成功！','/Admin/Department');
			}
		}
		$prj['departs'] = $row;
		$this->assign('prj',$prj);
		$this->display();
		//print_r($row);
	}
}