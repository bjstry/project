<?php
class InstallC extends C{
	public function Index(){
		if(file_exists(PATH.'/install.sock')){
			echo 'you already installed system...';
		}else{
			$this->assign('title','硕星库存系统-使用协议');
			$this->assign('myjs',"<script type='text/javascript' src='"._P_."/main.js'></script>");
			$this->display();
			//echo 'Well come to Install system...';	
		}
	}
	public function Check(){
		if(!empty($_GET['type'])){
			if($_GET['type'] == 'steep1'){
				$this->url('下一步','/Install/process');
			}
			if($_GET['type'] == 'steep2'){
				if(empty($_POST['submit'])){
					$this->url('参数错误，请返回！');
				}else{
					print_r($_POST);
					//mysql_connect('localhost','root','SFbjs56233one') or die('some things wrong...');
					mysql_connect("$_POST[dbhost]","$_POST[dbuser]","$_POST[dbpass]") or die ('some things wrong ..');
					$cdb = "create database if not exists $_POST[dbname]";
					$cuser = "create table if not exists $_POST[dbname].$_POST[dbprefix]user(`id` int(5) not null auto_increment primary key,`cid` int(1) not null comment '部门id',`gid` int(1) not null comment '权限id',`uname` varchar(24) not null unique comment '用户名',`upass` varchar(60) not null comment '密码',`umail` varchar(60) not null comment '邮箱',`uphone` int(20) not null comment '联系方式',`urename` varchar(60) not null comment '真实姓名') engine=myisam default charset=utf8";
					$cdeparts = "create table if not exists $_POST[dbname].$_POST[dbprefix]departs(`id` int(5) not null auto_increment primary key,`fid` int(1) not null comment '父部门id',`name` varchar(24) not null unique comment '部门名称',`url` varchar(30) not null comment '部门链接') engine=myisam default charset=utf8";
					$cclass = "create table if not exists $_POST[dbname].$_POST[dbprefix]class(`cid` int(5) not null auto_increment primary key,`fid` int(1) not null comment '父类id',`gid` int(1) not null comment '部门id',`cname` varchar(30) not null unique comment '类名',count int(5) not null default 0 comment '统计数量')engine=myisam default charset=utf8";
					$cparts = "create table if not exists $_POST[dbname].$_POST[dbprefix]parts(id int(5) not null auto_increment primary key,cid int(1) not null comment '类别',name varchar(30) not null comment '名字',model varchar(300) not null comment '型号',sn varchar(300) not null unique comment '序列号',cap int(5) not null comment '容量',cap_type varchar(30) not null comment '容量单位',supplier varchar(60) not null comment '供应商',price int(7) not null comment '单价',indate varchar(60) not null comment '入库时间',count int(5) not null comment '数量',remark varchar(300) not null comment '备注',location int(1) not null comment '目前所在部门',project int(5) not null default '0' comment '用于项目',incharge int(3) not null default 0 comment '负责人')engine=myisam default charset=utf8";
					$clogs = "create table if not exists $_POST[dbname].$_POST[dbprefix]logs(id int(5) not null auto_increment primary key,type varchar(60) not null comment '操作类型',count int(9) not null comment '操作数量',date varchar(60) not null comment '操作时间',uid int(5) not null comment '用户id',content varchar(300) not null comment '详细信息',remark varchar(300) not null comment '备注')engine=myisam default charset=utf8";
					$cprj = "create table if not exists $_POST[dbname].$_POST[dbprefix]projects(id int(5) not null auto_increment primary key,uid int(5) not null default 1 comment '负责人',prjname1 varchar(150) not null comment '学校/单位名称',prjname2 varchar(50) not null comment '院系/部门名称',prjcustomer varchar(60) not null comment '客户姓名',prjsaleman varchar(60) not null comment '销售',prjsalephone bigint(20) not null comment '业务电话',prjstatus int(1) not null default 1 comment '项目状态',prjstart int(20) not null comment '项目开始时间',prjfinish int(20) not null comment '项目完成时间')engine=myisam default charset=utf8";
					$cpartprice = "create table if not exists $_POST[dbname].$_POST[dbprefix]partprice(id int(5) not null auto_increment primary key,cid int(1) not null default 0 comment '分类',name varchar(60) not null comment '配件名',price int(8) not null comment '价格')engine=myisam default charset=utf8";
					$query = mysql_query($cdb);
					if($query){
						session('dbhost',$_POST[dbhost]);
						session('dbuser',$_POST[dbuser]);
						session('dbpass',$_POST[dbpass]);
						session('dbtable',$_POST[dbname].'.'.$_POST[dbprefix].'user');
						echo 'success !';
						//sleep(2);
						$cuserquery = mysql_query($cuser);
						if($cuserquery){
							echo 'success 2 !';
							//sleep(2);
						}else{
							echo $cuser."<br>";
							exit('some things wrong at create user table');
						}
						if($departsquery = mysql_query($cdeparts)){
							echo 'success 3 !';
							//sleep(2);
						}else{
							echo $cdeparts."<br>";
							exit('some things wrong at create departs table');
						}
						if($classquery = mysql_query($cclass)){
							echo 'success 4 !';
							//sleep(2);
						}else{
							echo $cclass."<br>";
							exit('some things wrong at create class table');
						}
						if($logsquery = mysql_query($clogs)){
							echo 'success 5 !';
							//sleep(2);
						}else{
							echo $clogs."<br>";
							exit('some things wrong at create logs table');
						}
						if($cpartsquery = mysql_query($cparts)){
							$initsql = array("insert into $_POST[dbname].$_POST[dbprefix]departs values('',0,'总经理','#')",
							"insert into $_POST[dbname].$_POST[dbprefix]departs values('',1,'业务部','Sale')",
							"insert into $_POST[dbname].$_POST[dbprefix]departs values('',1,'市场部','#')",
							"insert into $_POST[dbname].$_POST[dbprefix]departs values('',1,'技术部','Technology')",
							"insert into $_POST[dbname].$_POST[dbprefix]departs values('',1,'行政部','#')",
							"insert into $_POST[dbname].$_POST[dbprefix]departs values('',4,'采购部','Purchase')");
							foreach($initsql as $val){
								if(!mysql_query($val)){
									exit('some things wrong at '.$val);
								}
							}
							$file = fopen(C('PRJ_CONF').'Config.php','w') or die('error');
							$conf = "<?php\nreturn array(\n\t'db_host'=>'$_POST[dbhost]',\n\t'db_name'=>'$_POST[dbname]',\n\t'db_user'=>'$_POST[dbuser]',\n\t'db_pass'=>'$_POST[dbpass]',\n\t'db_prefix'=>'$_POST[dbprefix]',\n);\n?>";
							fwrite($file,$conf);
							fclose($file);
							echo 'success 6!<br>';
							//sleep(2);
							mysql_close();
							echo "<script type='text/javascript'>location.href='".URL."/$_GET[c]/finsh'</script>";
						}else{
							echo $cparts."<br>";
							exit('some things wrong at create parts table');
						}
						
					}else{
						exit('some things wrong...');
					}

				}
			}
			if($_GET['type']=='steep3'){
				mysql_connect(session('dbhost'),session('dbuser'),session('dbpass'));
				if($query = mysql_query("insert into ".session('dbtable')." (id,cid,gid,uname,upass,umail,uphone,urename) values ('',0,0,'$_POST[uname]','".md5($_POST[upass])."','$_POST[umail]',$_POST[uphone],'$_POST[urename]')")){
					echo 'create administrator done.';
					$lockfile = fopen(PATH.'/install.sock','w');
					fwrite($lockfile,'1');
					fclose($lockfile);
					session('clean',null);
					echo "<script type='text/javascript'>location.href='".URL."'</script>";
				}else{
					echo 'some things wrong at create administrator ...';
					exit();
				}
			}
		}else{
			$this->url('非法访问!','/Index/Index');
		}
	//	C('db_host')="'$_POST[dbhost]'",
	//	C('db_name')="$_POST[dbname]",
	//	C('db_user')="$_POST[dbuser]",
	//	C('db_pass')="$_POST[dbpass]",
	//	C('db_prefix')="$_POST[dbprefix]",
	}
	public function test(){
		$test = C();
		print_r($test);
	}
	public function Process(){
		$this->assign('title','硕星库存系统-安装过程');
		$this->display();
	}
	public function Finsh(){
		$this->assign('title','硕星库存系统-完成安装');
		$this->display();
	}
}