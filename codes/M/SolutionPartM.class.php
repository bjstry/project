<?php
class SolutionPartM extends M{
	public $city;      // 区域
	public $name = '默认名称';
	public $devtype = '默认节点';
	public $counts = 1;    //默认1台
	public $dfpd = 4;     //双路单路设备临界点
	public $dfct = 1;     //默认单路
	public $dfbct = 2;    //默认多路为双路
	public $powercount = 1; //默认单电源
	public $discount = 1; //默认单显示器
	public $pcsrq = 249; //默认PC散热器
	public $maxpcsrq = 250; //高端PC散热器
	public $osrsrq = 251; //2011散热器
	public $nsrsrq = 252; //新服务器散热器
	public $dfwboard = 242; //默认单路主板
	public $dfwnboard = 241; //默认单路新主板
	public $dfawboard = 243; //默认AMD单路主板
	public $dfpboard = 235; //默认PC主板
	public $dfpbboard = 236; //默认PC高端主板
	public $dfpsboard = 237; //默认PC超级主板
	public $dfboard = 239; //默认双路小主板
	public $dfbboard = 244; //默认双路大主板
	public $dfnboard = 245; //默认新双路小主板
	public $dfnbboard = 246; //默认新双路大主板
	public $dfaboard = 247;  //默认amd主板
	public $dfabboard = 248; //默认amd大主板
	public $dfmouse = 70; //默认键鼠
	public $dfroute = 296; //默认千兆交换机
	public $ts01 = 67; //塔式小机箱
	public $ts02 = 92; //塔式大机箱
	public $rs01 = 93; //普通机架式
	public $rs02 = 112; //热插拔机架式
	public $parts;
	public $slttype;
	public function SetCount($counts){
		$this->counts = $counts;
	}
	public function Settax($tax){
		$this->tax = $tax;
	}
	public function SetScale($scale){
		$this->scale = $scale;
	}
	public function Testecho(){
		echo 'Test echo !';
	}
	public function SetParts($parts){
		//echo 1;
		$newparts = array();
		$this->counts = $parts['count'];
		if($parts['devtype'] == 1){
			$this->devtype = '计算节点';
		}else if($parts['devtype'] == 2){
			$this->devtype = '管理节点';
		}else if($parts['devtype'] == 3){
			$this->devtype = '存储节点';
		}else if($parts['devtype'] == 4){
			$this->devtype = '管理+存储节点';
		}else if($parts['devtype'] == 5){
			$this->devtype = '管理+计算节点';
		}else if($parts['devtype'] == 6){
			$this->devtype = '计算+存储节点';
		}
		if($parts['product_type'] == 'XYP'){
			$this->name='星蕴P系列';
			//echo $this->name;
		}else if($parts['product_type'] == 'XYW'){
			$this->name='星蕴W系列';
			//echo $this->name;
		}else if($parts['product_type'] == 'XYAW'){
			$this->name='星蕴AW系列';
			//echo $this->name;
		}else if($parts['product_type'] == 'XYS'){
			$this->name='星蕴S系列';
			//echo $this->name;
		}else if($parts['product_type'] == 'XYAS'){
			$this->name='星蕴AS系列';
			//echo $this->name;
		}else if($parts['product_type'] == 'XYNS'){
			$this->name='星蕴NS系列';
			//echo $this->name;
		}
		
		// 获取cpu个数
		if($parts['product_type'] == 'XYP' or $parts['product_type'] == 'XYW' or $parts['product_type'] == 'XYAW'){

			$parts['cpucount'] = $this->dfct;
			$parts['srqcount'] = $this->dfct;
		}else{
			if($parts['cpucount'] == null){
				$parts['cpucount'] = $this->dfbct;
				$parts['srqcount'] = $this->dfbct;
			}
		}
		
		
		//print_r($parts);
		if(!empty($parts['cputype'])){
			$newparts[$parts['cputype']] = $parts['cpucount'];
		}
		/*if(!empty($parts['cputype'])){
			//echo 1;
			if(!empty($parts['cpucount'])){
				$newparts[$parts['cputype']] = $parts['cpucount'];
			}else{
				if($parts['product_type'] == 'XYS' or $parts['product_type'] == 'XYAS'){
					$newparts[$parts['cputype']] = $this->dfbct;
				}
			}
		}else{
			//echo -1;
		}*/
		//获取主板信息
		if($parts['product_type'] == 'XYS'){
			if($parts['memcount']>8 or ($parts['gamecount']+$parts['gcount']) > 1 or $parts['boardtype']==3){
				$newparts[$this->ts02] = 1;
				$cpuinfo = D('Part',$parts['cputype']);
				if($cpuinfo->level == 2){
					$newparts[$this->dfnbboard] = 1;
				}else{
					$newparts[$this->dfbboard] = 1;
				}
			}else{
	
					$cpuinfo = D('Part',$parts['cputype']);
					if($cpuinfo->level == 2){
						$newparts[$this->dfnboard] = 1;
					}else{
						$newparts[$this->dfboard] = 1;
					}
	
				$newparts[$this->ts01] = 1;
			}
		}else if($parts['product_type'] == 'XYW'){
			$newparts[$this->ts01] = $this->dfct;
			$cpuinfo = D('Part',$parts['cputype']);
			if($cpuinfo->level == 2){
				$newparts[$this->dfwnboard] = $this->dfct;
			}else{
				$newparts[$this->dfwboard] = $this->dfct;
			}
		}else if($parts['product_type'] == 'XYP'){
			$newparts[$this->ts01] = $this->dfct;
			$cpuinfo = D('Part',$parts['cputype']);
			if($cpuinfo->level == 2){
				$newparts[$this->dfpbboard] = $this->dfct;
			}else if($cpuinfo->level == 3){
				$newparts[$this->dfpsboard] = $this->dfct;
			}else{
				$newparts[$this->dfpboard] = $this->dfct;
			}
		}else if($parts['product_type'] == 'XYAW'){
			$newparts[$this->ts01] = 1;
			$newparts[$this->dfawboard] = $this->dfct;
		}else if($parts['product_type'] == 'XYAS'){
			if($parts['memcount']>8 or ($parts['gamecount']+$parts['gcount']) > 1 or $parts['boardtype']==3){
				$newparts[$this->ts02] = $this->dfct;
				$newparts[$this->dfabboard] = $this->dfct;
			}else{
				$newparts[$this->dfaboard] = $this->dfct;
				$newparts[$this->ts01] = $this->dfct;
			}
		}
		
		
		//获取服务器散热器信息
		if($parts['product_type'] == 'XYS' or $parts['product_type'] == 'XYAS'){
			if($parts['cpucount'] == 1){
				$cpuinfo = D('Part',$parts['cputype']);
				if($cpuinfo->level == 2){
					$newparts[$this->nsrsrq] = 1;
				}else{
					$newparts[$this->osrsrq] = 1;
				}
			}else{
				$cpuinfo = D('Part',$parts['cputype']);
				if($cpuinfo->level == 2){
					$newparts[$this->nsrsrq] = 2;
				}else{
					$newparts[$this->osrsrq] = 2;
				}
			}
		}else{
			if($parts['product_type'] == 'XYP'){
				$cpuinfo = D('Part',$parts['cputype']);
				if($cpuinfo->level == 2){
					$newparts[$this->maxpcsrq] = 1;
				}else{
					$newparts[$this->pcsrq] = 1;
				}
				
			}else{
				$newparts[$this->nsrsrq] = 1;
			}
		}
		
		if(!empty($parts['memsize'])){
			//echo 2;
			$newparts[$parts['memsize']] = $parts['memcount'];
		}else{
			//echo -2;
		}
		if(!empty($parts['ssdsize'])){
			//echo 3;
			$newparts[$parts['ssdsize']] = $parts['ssdcount'];
		}else{
			//echo -3;
		}
		if(!empty($parts['hddsize'])){
			//echo 4;
			$newparts[$parts['hddsize']] = $parts['hddcount'];
		}else{
			//echo -4;
		}
		if(!empty($parts['gamecard'])){
			//echo 5;
			$newparts[$parts['gamecard']] = $parts['gamecount'];
		}else{
			//echo -5;
		}
		if(!empty($parts['gcard'])){
			//echo 6;
			$newparts[$parts['gcard']] = $parts['gcount'];
		}else{
			//echo -6;
		}
		if(!empty($parts['powerprice'])){
			//echo 7;
			$newparts[$parts['powerprice']] = $this->powercount;
		}else{
			//echo -7;
		}
		if(!empty($parts['disprice'])){
			//echo 8;
			$newparts[$parts['disprice']] = $this->discount;
		}else{
			//echo -8;
		}
		$newparts[$this->dfmouse] = 1;
		$newparts[$this->dfroute] = 1;
		/*$newparts = array(
			"$parts[cputype]"=>"$parts[cpucount]",
			"$parts[memsize]"=>"$parts[memcount]",
			"$parts[ssdsize]"=>"$parts[ssdcount]",
			"$parts[hddsize]"=>"$parts[hddcount]",
			"$parts[gamecard]"=>"$parts[gamecount]",
			"$parts[gcard]"=>"$parts[gcount]",
			"$parts[powerprice]"=>"$this->powercount",
			"$parts[disprice]"=>"$this->discount",
		);*/
		//print_r($newparts);
		
		/*if($parts['city'] == 1){
			$newparts[$this->dfserver] = 1;
		}else if($parts['city'] == 2){
			$newparts[$this->outserver] = 1;
		}
		*/
		$this->city = $parts['city'];
		$this->parts = $newparts;
	}
	public function PushDoc($doc){
		array_push($this->sltdoc,$doc);
	}
}
?>