<?php
function getDepartment($cid,$key,$field){
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
	return $uinfo['urename'];
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
/*(function getArr($key){
	if(is_array($key)){
		$array = M("$key[0]")1;
		$return = $array->where("$key[1] = '$key[2]'")->find();
		if($key[3]){
			return $return["$key[3]"];
		}else{
			return $return;
		}
	}else{
		die('参数错误！ --function getArr');
	}
	
}*/
?>
