<?php
function getDepartment($cid,$key){
	$depart = M('departs');
	$return;
	$row;
	if($cid==0){
		$row = $depart->select();
	}else{
		$where = "id=$cid or fid=$cid";
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
function getRename($id){
	$user = M('user');
	$uinfo = $user->where("id=$id")->find();
	return $uinfo['urename'];
}
function getProject($pid){
	$return;
	if($pid==0){
		$return = '未分配';
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
?>
