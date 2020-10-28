<?php
class IndexC extends C{
	public function Speekinit(){
		$this->prj['webwidth'] = 70;
	}
	public function Index(){
		if(!file_exists(PATH.'/install.sock')){
			$this->url('尚未安装','/Install/Index');
		}else{
			if(empty($_SESSION['jspjuid'])){
				$this->url('请登陆','/index/login');
			}else{
				$user = $_SESSION['uinfo'];
				$this->prj['title'] = "硕星系统，西安硕星信息技术有限公司";
				$this->prj['user'] = $user;
				$this->prj['departs'] = getDepartment($user[cid]);
				if($user[gid]==0 && $user[cid]==0){
					$this->prj['manager'] = "<a class='button primary small' href='".URL."/Admin/Index'>管理</a>";
				}
				
				
				
				$this->assign('prj',$this->prj);
				$this->display();
			}
		}
	}
	public function SetTheme(){
		//print_r(C(''));
		session('dttheme','new');
		$this->url('成功!');
	}
	public function SetThemedt(){
		//print_r(C(''));
		session('dttheme','default');
		$this->url('成功!');
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
		$this->prj['title'] = "登陆，硕星系统，西安硕星信息技术有限公司";
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function LoginOut(){
		session('jspjuid','null');
		session('dttheme','null');
		$this->url('注销成功！','/Index/Login');
	}
	public function LoginCheck(){
		if(isset($_POST[logincheck])){
			$user = M('user');
			$return = $user->where("uname='$_POST[uname]'")->find();
			if(empty($return)){
				print_r(md5($_POST['upass']));
				$this->url('用户名不存在!','/Index/Login');
				session('jspjuid','null');
				session('key','null');
				session('uinfo','null');
			}else{
				if($return['upass'] == md5($_POST['upass'])){
					session('jspjuid',$return['id']);
					session('key',$return['upass']);
					session('uinfo',$return);
					$this->url('登录成功！','/Index/Index');
				}else{
					print_r(md5($_POST['upass']));
					$this->url('密码错误!','/Index/Login');
					session('jspjuid','null');
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