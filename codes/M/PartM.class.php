<?php
class PartM extends M{
	public $result;  //所有信息
	public $id;      //配件价格
	public $cid;     //配件分类
	public $cname;   //配件分类名称
	public $name;    //配件名称
	public $price;   //配件价格
	public $info;    //配件信息
	public $desc;    //配件详细介绍
	public $visible; //配件显示优先级别
	public $level;   //配件级别
	public function test(){
		echo '配件名称是: '.$this->name;
	}
	public function __construct($id){
		$prices = M('partprice');
		$class = M('class');
		$result = $prices->where("id=$id")->find();
		$this->result = $result;
		$this->id = $result['id'];
		$this->cid = $result['cid'];
		$class_arr = $class->where("cid=$result[cid]")->find();
		$this->cname = $class_arr['rname'];
		$this->name = $result['name'];
		$this->price = $result['price'];
		$this->info = $result['info'];
		$this->desc = $result['desc'];
		$this->visible = $result['visible'];
		$this->level = $result['level'];
		$this->result['cname'] = $this->cname;
	}
}
?>