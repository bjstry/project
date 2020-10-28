<?php
class DepartmentM extends M{
	public $id;
	public $name;
	public $url;
	public $fid;
	public function __construct($id){
		$departs = M('departs');
		$mydepart = $departs->where("id=$id")->find();
		$this->id = $mydepart['id'];
		$this->name = $mydepart['name'];
		$this->fid = $mydepart['fid'];
		$this->url = $mydepart['url'];
	}
}
?>