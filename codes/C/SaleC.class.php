<?php
class SaleC extends C{
	public function Speekinit(){
		$this->prj['webwidth'] = 80;
	}
	public function Index(){
		$uinfo = $_SESSION[uinfo];
		$this->prj['title']='业务部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		if($uinfo[id]!='28'){
			$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
			$this->prj['left'][] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
			$this->prj['left'][] = array('name'=>'提交售后','url'=>URL."/Technology/CustAdd");
			$this->prj['left'][] = array('name'=>'售后进度','url'=>URL."/Technology/CustomerService");
		}else{
			$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");	
		}
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		
		//print_r($this->prj['left']);
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function CustomerService(){
		$this->prj['title']='业务部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
		$this->prj['left'][] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
		$this->prj['left'][] = array('name'=>'售后进度','url'=>URL."/Sale/CustomerService");
		$this->prj['left'][] = array('name'=>'完成售后','url'=>URL."/Sale/CustOk");
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		$custserv = M('custserv');
		$mycustserv = $custserv->where("servstat!='0' and servstat = '处理中'")->order('id')->select();
		$this->prj['myserv'] = $mycustserv;
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
	
	public function CustOk(){
		$this->prj['title']='业务部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$this->prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
		$this->prj['left'][] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
		$this->prj['left'][] = array('name'=>'售后进度','url'=>URL."/Sale/CustomerService");
		$this->prj['left'][] = array('name'=>'完成售后','url'=>URL."/Sale/CustOk");
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		$custserv = M('custserv');
		$mycustserv = $custserv->where("servstat!='0' and servstat = '完成'")->order('id')->select();
		$this->prj['myserv'] = $mycustserv;
		
		$this->assign('prj',$this->prj);
		$this->display();
	}
}
?>