<?php
class IndexC extends C{
	public function Index(){
		if(!file_exists(PATH.'/install.sock')){
			$this->url('尚未安装','/Install/Index');
		}else{
			if(empty($_SESSION['uid'])){
				$this->url('请登陆','/index/login');
			}else{
				$user = $_SESSION['uinfo'];
				$prj['title'] = "硕星系统，西安硕星信息技术有限公司";
				$prj['user'] = $user;
				$prj['departs'] = getDepartment($user[cid]);
				if($user[gid]==0 && $user[cid]==0){
					$prj['manager'] = "<a class='button primary small' href='".URL."/Admin/Index'>管理</a>";
				}
				$this->assign('prj',$prj);
				$this->display();
			}
		}
	}
	//public function getbox($id,$level){
		//$v_arr;
		//$class = M('class');
		//if($id!=0){
		//	$level = $level."---";
		//}
		//$count=0;
		//$myclass = $class->where("fid=$id")->select();
		//foreach($myclass as $val){
			//echo $level;
			//$v_arr[] = "$level.$val['cname'].' 数量'.$val['count'].'<br>'";
			//$count = $count+$val['count'];
			//$this->getbox($val['cid'],$level);
			//$level = $level."==";
			//$level++;
		//}
		//echo $id;
		//echo $count;
		//echo $level;
		//$level = $level."==";
		//$level++;
		//return $v_arr;
	//}
	//public function showbox(){
		
		//$key = $this->getbox(0,'');
		//print_r($Key);
	//}
	public function Login(){
		$prj['title'] = "登陆，硕星系统，西安硕星信息技术有限公司";
		$this->assign('prj',$prj);
		$this->display();
	}
	public function LoginOut(){
		session('clean','all');
		$this->url('注销成功！','/Index/Login');
	}
	public function LoginCheck(){
		if(isset($_POST[logincheck])){
			$user = M('user');
			$return = $user->where("uname='$_POST[uname]'")->find();
			if(empty($return)){
				print_r(md5($_POST['upass']));
				$this->url('用户名不存在!','/Index/Login');
				session('uid','null');
				session('key','null');
				session('uinfo','null');
			}else{
				if($return['upass'] == md5($_POST['upass'])){
					session('uid',$return['id']);
					session('key',$return['upass']);
					session('uinfo',$return);
					$this->url('登录成功！','/Index/Index');
				}else{
					print_r(md5($_POST['upass']));
					$this->url('密码错误!','/Index/Login');
					session('uid','null');
					session('key','null');
					session('uinfo','null');
				}
			}
		}else{
			print_r($_POST);
			echo '<br>非法访问!';
			//$this->url('非法访问2!');
		}
	}
}