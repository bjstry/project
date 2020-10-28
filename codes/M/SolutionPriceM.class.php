<?php
class SolutionPriceM extends M{
	public $city;
	public $name;
	public $devtype;
	public $cityprice = 0;
	public $devcount = 0;
	public $allprice;
	public $allpartprice = 0;
	public $allpartarr;
	public $allpartinfo;
	public $mysolution;
	public function GetSolution(){
		echo '获取到了方案';
	}
	
	/*public function GetPrice(SolutionPartM $slp){
		$this->allpartprice = 0;     //初始化所有配件价格
		foreach($slp->parts as $key=>$val){
			$myprice = D('part',$key);
			$this->allpartprice += $myprice->price*$val; //获取实际所有配件价格
		}
		$this->name = $slp->name;
		$this->devtype = $slp->devtype;
		$this->allpartarr = $slp->parts;
		$this->counts = $slp->counts;
		$this->allprice = $this->allpartprice*$slp->tax*$slp->scale*$slp->counts+$slp->city;  //获取总价格
	}*/
	
	public function GetPrice(SolutionM $slt){
		$newslpdm = D('SolutionPart');
		$this->city = $slt->city;
		$this->devtype = count($slt->parts);
		foreach($slt->parts as $slp){
			//print_r($slp->name);
			$this->devcount += $slp->counts;
			foreach($slp->parts as $key=>$val){
				$myprice = D('part',$key);
				$this->allpartprice += $myprice->price*$val; //获取实际所有配件价格
			}
		}
		//$jinslt = $this->mysolution->parts;
		//print_r($jinslt);
		//print_r($jinslp['name']);
		//print_r($jinslp);
		$this->getCityPrice();
		$this->allprice = $this->allpartprice*$slt->tax*$slt->scale+$this->cityprice;
		
		//echo $slp->rtNub();
	}
	private function getCityPrice(){
		if($this->city == 1){
			if($this->devcount < 3){
				$this->cityprice = 5100;
			}else{
				$this->cityprice = ($this->devcount - 2)*3000+5100;
			}
		}else if($this->city == 2){
			if($this->devcount < 2){
				$this->cityprice = 8000;
			}else{
				$this->cityprice = ($this->devcount - 1)*3000+8000;
			}
		}
	}
	/*public function GetAllPartInfo($slp){
		$allpartinfo = array();
		foreach($slp->parts as $key=>$val){
			$part = D('Part',$key);
			//print_r($part->result);
			array_push($allpartinfo,$part->result);
		}
		$this->allpartinfo = $allpartinfo;
	}*/
}
?>