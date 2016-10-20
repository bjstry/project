<?php
class SaleC extends C{
	public function Index(){
		$prj['title']='业务部-硕星信息，西安硕星信息技术有限公司';
		$prj['mycss'] = "<link rel='stylesheet' type='text/css' href='".ROOT."/Public/main.css'>";
		$prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$prj['left'][] = array('name'=>'方案价格','url'=>URL."/Solution");
		$prj['left'][] = array('name'=>'项目进度','url'=>URL."/Technology/ProjectManager");
		$prj['left'][] = array('name'=>'返回首页','url'=>URL);
		
		
		//print_r($prj['left']);
		$this->assign('prj',$prj);
		$this->display();
	}
}
?>