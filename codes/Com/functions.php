<?php
//  gid  fid    name     url
//|  1 |   0 | 管理员 | Index      |
//|  2 |   1 | 业务部 | Sale       |
//|  3 |   1 | 市场部 | Market     |
//|  4 |   1 | 技术部 | Technology |
//|  5 |   1 | 行政部 | Office     |
//|  6 |   4 | 采购部 | Purchase   |
//|  7 |   4 | 方案部 | Solution   |
//|  9 |   1 | 财务部 | Finance 
//|  8 |   1 | 未入库 | Finance 
function getDepartment($cid=null,$key=null,$field=null){
	if(empty($field)){
		$field = 'departs';
	}
	$depart = M("$field");
	$return;
	$row;
	if($cid==0){
		$row = $depart->select();
	}else{
		if($_SESSION['uinfo']['gid']==0){
			$where = "id=$cid or fid=$cid";
		}else{
			$where = "id=$cid";
		}
		$row = $depart->where($where)->select();
	}
	if(empty($key)){
		$return = $row;
	}else{
		if($cid!=0){
			$result=$depart->where("id=$cid")->find();
			if(!empty($result[$key])){
				$return = $result[$key];
			}
		}
	}
	if(!$return){
		$return = '无';
	}
	return $return;
}

//全局获取菜单
function GetLeft($departurl,$a=null){
	$gid = $a;
	$depart = $_GET['c'];
	 if($departurl == 'Technology'){
		$left_arr[] = array('name'=>'主页','url'=>URL."/Technology");
		$left_arr[] = array('name'=>'提交售后','url'=>URL."/$_GET[c]/TechAdd");
		$left_arr[] = array('name'=>'售后进度','url'=>URL."/$_GET[c]/CustomerService");
		$left_arr[] = array('name'=>'新增项目','url'=>URL."/$_GET[c]/Add");
		$left_arr[] = array('name'=>'项目管理','url'=>URL."/$_GET[c]/ProjectManager");
		$left_arr[] = array('name'=>'档案管理','url'=>URL."/$_GET[c]/DocManager");
		if($gid == 0){
			$left_arr[] = array('name'=>'操作日志','url'=>URL."/$_GET[c]/Logs");
		}
		$left_arr[] = array('name'=>'返回首页','url'=>URL);
	 }else if($departurl == 'Sale'){
	 	$left_arr[] = array('name'=>'主页','url'=>URL."/Sale");
	 	$left_arr[] = array('name'=>'方案价格','url'=>URL."/Solution");
		$left_arr[] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
		$left_arr[] = array('name'=>'提交售后','url'=>URL."/Technology/CustAdd");
		$left_arr[] = array('name'=>'售后进度','url'=>URL."/Technology/CustomerService");
		$left_arr[] = array('name'=>'返回首页','url'=>URL);
	 }else if($departurl == 'Purchase'){
	 	$left_arr[] = array('name'=>'主页','url'=>URL."/Purchase");
		$left_arr[] = array('name'=>'出库','url'=>URL."/$_GET[c]/Outgo");
		$left_arr[] = array('name'=>'入库','url'=>URL."/$_GET[c]/Add");
		if($gid == 0){
			$left_arr[] = array('name'=>'操作日志','url'=>URL."/$_GET[c]/Logs");
		}
		$left_arr[] = array('name'=>'部门报销','url'=>URL."/$_GET[c]/Expense");
		$left_arr[] = array('name'=>'返回首页','url'=>URL);
	 	
	 }else if($departurl == 'Solution'){
	 	$left_arr[] = array('name'=>'主页','url'=>URL."/Solution");
		$left_arr[] = array('name'=>'价格管理','url'=>URL."/$_GET[c]/PartPrice");
		$left_arr[] = array('name'=>'新增报价','url'=>URL."/$_GET[c]/AddPrice");
		if($gid == 0){
			$left_arr[] = array('name'=>'操作日志','url'=>URL."/$_GET[c]/Logs");
		}
		$left_arr[] = array('name'=>'测试项目','url'=>URL."/$_GET[c]/Generate");
		$left_arr[] = array('name'=>'返回首页','url'=>URL);
	 }
	 return $left_arr;
}
	

//全局初始化函数
function globeinit(){
	if($_GET['m'] == 'Login' or $_GET['m'] == 'LoginCheck'){
	}else{
		if(empty($_SESSION['jspjuid'])){
		//	$this->url('请登录','/index/login');
			echo "<script>alert('请登录')</script>";
			echo "<script>location.href='".URL."/Index/Login'</script>";
		}else{
			if($_GET['c'] == 'Admin'){
				if($_SESSION['jspjuid'] != 1 and $_SESSION['jspjuid'] != 2){
					exit('你没有此权限！');
				}
			}
		}
	}
	
	if(session('dttheme') == 'new'){
		C('DT_THEME','new');
	}
}


	function prj_up(){
	    $date = date("Y-m-d");//当前凌晨时间
	    $dir =$_SERVER['DOCUMENT_ROOT'] ."Public/Uploads/".$date;//保存的路径

	    if (!file_exists($dir)) {//创建文件夹
	        mkdir($dir, 0777, true);

	    }

	    if ($_FILES["file"]["error"]) {
	        return $_FILES["file"]["error"];
	    }else{
	            //图片上传
	            //echo $_FILES["file"]["size"];
	            if (($_FILES["file"]["type"] == "image/png" || $_FILES["file"]["type"] == "image/jpeg" || $_FILES["file"]["type"] == "image/gif" || $_FILES["file"]["type"] == "image/jpg") && $_FILES["file"]["size"] < 50000) {
	  
	                $images = $_FILES['file']['name'];
	                $savePath = "/Public/Uploads/" .$date ."/";
	                $saveName = $images;//savename
	                //存入文件夹中
	                $res = move_uploaded_file($_FILES["file"]["tmp_name"], $_SERVER['DOCUMENT_ROOT'] . $savePath . $saveName);

	                if ($res === false) {
	                    return (array('code' => 300, 'msg' => '文件添加失败'));
	                }else{
	                        //图片保存成功
	                        $where['savepath'] = $date . "/";
	                        $where['savename'] = $saveName;
	                        $where['time'] = time();
	                        $where['type'] = $_FILES["file"]["type"];
	                        $fileList_id = M('file')->add($where);
	                    return $fileList_id;
	                }
	            } else {
	                return (array('code' => 400, 'msg' => '文件过大或文件格式不正确'));
	            }
	    }

	}


	/*function url($a=null,$b=null){
        if(is_null($b)){
            echo "<script>alert('$a')</script>";
            echo "<script>history.go(-1)</script>";
        }else{
            echo "<script>alert('$a')</script>";
            echo "<script>location.href='$_SERVER[SCRIPT_NAME]$b'</script>";
        }
    }*/


/*function getFieldValue($table,$key,$rekey){
	$tablerow = M($table);
	$return = $tablerow->where("$key[0]='$key[1]'")->find($rekey);
	return $return[$rekey];
}*/
function getClass($cid,$key){
	//echo $cid.'--'.$key.'<br>';
	$myclass = M('class');
	$myparts = M('partprice');
	$return;
	$mypart = $myparts->where("id=$cid")->find();
	$row = $myclass->where("cid=$mypart[cid]")->find();
	if(empty($key)){
		$return = $row;
	}else{
		$return = $row[$key];
	}
	return $return;
}
function getRename($id){
	$user = M('user');
	$uinfo = $user->where("id=$id")->find();
	if(!empty($uinfo)){
		return $uinfo['urename'];
	}else{
		return '已删除用户';
		//echo $id."<br>";
		//exit('未检测到该用户! from getRename');
	}
}
function getUid($name){
	$user = M('user');
	$uinfo = $user->where("urename='$name'")->find();
	if(!empty($uinfo)){
		return $uinfo['id'];
	}else{
		return 0;
		//exit('未检测到该用户! from getUid');
	}
	
}
function getInfo($id,$val){
	$user = M('user');
	$uinfo = $user->where("id='$id'")->find();
	if(!empty($uinfo)){
		return $uinfo["$val"];
	}else{
		exit('未检测到该用户! from getInfo');
	}
	
}
function getServstat($id){
	if($id == 0){
		$return = '等待';
	}else if($id == 1){
		$return = '进行';
	}else{
		$return = '完成';
	}
	
	return $return;
}
function getProject($pid){
	$return;
	if($pid==0){
		$return = '领用';
	}else{
		$prjs = M('projects');
		$row = $prjs->where("id=$pid")->find();
		$return = $row['prjname1'].$row['prjcustomer'];
	}
	return $return;
}
function getPjstatus($id){
	$return;
	switch($id){
		case 1:
			$return = '缺配件';
			break;
		case 2:
			$return = '组装中';
			break;
		case 3:
			$return = '系统软件安装';
			break;
		case 4:
			$return = '测试';
			break;
		case 5:
			$return = '待发货';
			break;
		case 6:
			$return = '物流运输中';
			break;
		case 7:
			$return = '已签收';
			break;
	}
	return $return;
}
function getSN($pid){
	$part = M('parts');
	$project = M('projects');
	$myproject = $project->where("id=$pid")->find();
	if(empty($myproject['sn'])){
		$parts = $part->where("project=$pid")->select();
		$title = 'SX';
		for($i=0;$i<count($parts);$i++){
			if($parts[$i]['cid']==1){
				$cpuname=$parts[$i]['name'];
				$cpuinfo=$parts[$i]['model'];
				if(strstr($cpuinfo,'I')){
					$type='P';
				}else{
					if(strstr($cpuinfo,'16')){
						$type='W';
					}else{
						$type='S';
					}
				}
			}	
			
			if($parts[$i]['cid']==11){
			
				if($parts[$i]['name']=='NVIDIA'){
					$graphics = 'N';
				}else{
					$graphics = 'A';
				}
			}
			if($parts[$i]['cid']==32){
				$ssd='S';
			}
		}
		$key1 = $type;
		if($type=='P'){
			$cpuinfo = $cpuinfo[3].$cpuinfo[4];
		}else{
			$cpuinfo = $cpuinfo[5].$cpuinfo[6];
		}
		$prodate = date('ynd');
		$ssd;
		$pronumber;
		if($cpuname=='Intel'){
			$key2 = 'I';
		}else{
			$key2 = 'A';
		}
		$key3 = $cpuinfo;
		if(empty($ssd)){
			$key4 = 0;
		}else{
			$key4 = 'S';
		}
		if(empty($key1)){
			$key1 = 'S';
		}
		if(empty($key3)){
			$key3 = '00';
		}
		$key5 = $graphics;
		$key6 = $prodate;
		$key7 = $pid;
		$sn = $title.$key1.$key2.$key3.$key4.$key5.$key6.$key7;
	}else{
		$sn = $myproject['sn'];
	}
	return $sn;
}
function getArr($key){
	if(is_array($key)){
		$array = M("$key[0]");
		$return = $array->where("$key[1] = '$key[2]'")->find();
		if($key[3]){
			return $return["$key[3]"];
		}else{
			return $return;
		}
	}else{
		die('参数错误！ --function getArr');
	}
	
}
?>
