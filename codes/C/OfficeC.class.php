<?php
class OfficeC extends C{
	public function Speekinit(){
		$this->prj['webwidth'] = 80;
	}
	public function Index(){

		$this->prj['title']='行政部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$this->prj['left'][] = array('name'=>'通讯录','url'=>URL."/$_GET[c]/PhoneBook");
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		
		//print_r($this->prj['left']);
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function PhoneBook(){
		$this->prj['title']='行政部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$this->prj['left'][] = array('name'=>'通讯录','url'=>URL."/$_GET[c]/PhoneBook");
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		if(empty($_GET[uid])){
			$user = M('User');
			$myusers = $user->select();
			$this->prj['users'] = $myusers;
		}else{
			$user = M('User');
			$id = $_GET['uid'];
			$myusers = $user->where("id=$id")->select();
			$this->prj['users'] = $myusers;
		}
		
		
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function PhoneBookEdit(){
		$this->prj['title']='行政部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$this->prj['left'][] = array('name'=>'通讯录','url'=>URL."/$_GET[c]/PhoneBook");
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		
		if($_GET['uid']){
			$uid = $_GET['uid'];
			$myuser = M('User');
			$user = $myuser->where("id=$uid")->find();
			$this->prj['user'] = $user;
			if(isset($_POST['submit'])){
				if($_POST['urename'] != null){
					if($_POST['uphone'] != null){
						if($_POST['uemail'] != null){
							$myuser->where("id=$uid")->update("umail='$_POST[uemail]',uphone=$_POST[uphone],urename='$_POST[urename]'");
							$this->url('编辑成功!');
						}else{
							exit('邮箱不能为空!');
						}
					}else{
						exit('电话不能为空!');
					}
				}else{
					exit('姓名不能为空!');
				}
				/*if(md5($_POST['oldupass']) == $user['upass']){
					if($_POST['newupass'] == $_POST['newreupass']){
						if($_POST['newupass'] != $_POST['oldupass']){
							$myuser->where("id=$uid")->update("upass='".md5($_POST['newupass'])."',umail='$_POST[uemail]',uphone=$_POST[uphone],urename='$_POST[urename]'");
							$this->url('修改成功！','/Admin/User');
						}else{
							$this->url('新旧密码不能一样!');
						}
					}else{
						$this->url('两次密码不一致！');
					}
				}else{
					$this->url('密码错误!');
				}*/
			}
		}else{
			exit('非法访问!');
		}
		$this->prj['title']='用户管理-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->assign('prj',$this->prj);
		$this->display();
		
	}
	public function PhoneBookDell(){
		$userinfo = $_SESSION['uinfo'];
		if($userinfo['id'] !=1){
			exit('非法访问!');
		}else{
			if($_GET['uid']){
				$myuser = M('User');
				$myuser->where("id=$_GET[uid]")->delete();
				$this->url('操作成功!');
			}else{
				exit('参数非法');
			}
		}
	}
}
?>