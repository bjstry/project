<?php

/*
	方案类，根据方案的设备计算出最终价格等功能
*/

class SolutionM extends M{
	public $name;
	public $devtype;
	public $allpartarr;
	public $tax = 1.1;    //默认税率
	public $scale = 1.5;  //默认价格系数
	public $dfserver = 297; //默认本地区域
	public $outserver = 298;  //外地区域区域
	public $city;
	public $counts;
	public $allpartprice;
	public $parts = array();
	public $sltdoc = array(
		"<p style='text-indent:2em'>西安硕星信息技术有限公司致力于为科研领域提供专业的计算模拟解决方案，公司始终本着“以信为本，以质取胜”的宗旨，着眼于市场需求，守信经营。客户在这里可以得到售前技术咨询，售中合理化方案和售后标准化服务等一整套完善的技术支持，从而最大限度的满足用户的需求。</p>",
		"<p style='text-indent:2em'>秉承精细工艺，严把品质检测， 提供满意服务，争创一流企业</p><p style='text-indent:2em'>硕星完善的服务制度，为产品保驾护航，保障客户享受高品质的产品体验与服务。优良的品质和卓越的服务也是硕星争创行业一流企业的信心来源。硕星始终秉承严谨、务实、高效率的工作态度服务于每一位客户。</p><p style='text-indent:2em'>硕星专业的服务体现在和用户沟通中更多是沟通用户软件使用方面的工作，硕星始终相信用户购买硬件不是目的，基于硬件使用自身的软件程序出理想的成果才是最终目的，所以在客户调研前期结合用户现用的软件、规模、环境、要求等制作出最合理解决方案，供用户参考选择。</p><p style='text-indent:2em'>硕星有着行业领先的服务体系，在行业中硬件成熟的前提下，将大量的精力致力于软件服务，硕星产品在送到客户手上后，实现开机直接使用的效果，操作系统、数据库、编译工具、相关领域科研软件等在交付客户前完成，并可根据客户的需求提供远程任务提交、多用户管理、作业调度系统等系统服务（含集群管理系统服务），后期提供专业技术支持，确保用户整套计算系统的正常使用。</p><p style='text-indent:2em'>硕星相信设备交付到客户手上后服务只是起点而非终点</p>",
		"<p>星蕴S系列</p><p style='text-indent:2em'>星蕴S系列产品属于硕星核心产品，定位于需要大量计算资源，做大规模及超大规模计算的客户，S系列产品能带来超强的能耗比，超高的计算性能让它成为新老用户的首选。</p><p>星蕴W系列</p><p style='text-indent:2em'>定位为入门级产品，主要服务于各大高校的老师，对做计算有一定需求，但规模不大的客户，提供够用的性能、优质的产品，性价比极高。</p><p>星蕴P系列</p><p>主要为计算规模较小的客户定制，满足轻量级、小规模计算需求。</p><p>星蕴B系列</p><p style='text-indent:2em'>主要为存储系列，支持RAID0、1、5、10等。可提高传输速率，大幅提高存储系统的数据吞吐量。</p>",
		"<p style='text-indent:2em'>星蕴系列基于高效能的散热系统以及静音技术，结合散热通道的合理分配，达到低噪音乃至静音的效果。 </p><p style='text-indent:2em'>根据不同用户的实际需求，基于高效散热以及低噪音的前提硕星提供塔式、4UU机架式、2UU机架式等机型以供选择。</p><p style='text-indent:2em'>星蕴系列产品基于和客户前期深入的沟通，在后期使用中高性能的计算能力将会使用户的计算结果更精确，并且减少计算时间，可以让用户有更多的时间对参数及模型本身进行更细致的工作，并且根据用户的程序以及软件情况，推荐更合适的专业显卡将会具有更真实的模拟过程，结合实验结果进行省事省力的验证。</p><p style='text-indent:2em'>星蕴系列产品在出厂前都要进行72U小时二次极限检测，确保硬件稳定性、系统稳定性、相关专业软件及环境的正常工作，降低客户使用中故障发生几率。</p>",
		"<p>提供计算领域3款专业软件的安装服务及有限后期技术支持服务（商业软件由用户提供)。</p>",
		"<p>科学计算库BLAS、ATLAS、LAPACK、ScaLAPACK、FFTW等。</p>",
		"<p>含有的软件开发环境支持 C、C++、Fortran,还包括了并行编译,以及基于GNU 软件含常用的科学作图与LATEX 文档写作软件。GCC、G77、Gfortran、Intel Fortran 编译器、并行编译 MPICH2U。</p>",
		"<p>可为用户完成数据处理、存储及并行计算Linux操作系统的安装（Windows系统安装需客户自己激活）和调试及系统优化；</p><p>可提供多任务多用户管理系统、远程作业系统、局域网搭建(3台及3台以下PC机免费搭建）；</p><p>可为用户完成MPI 并行计算环境的搭建 ，包含浮点计算数学库和相关编译工具；</p><p>可为用户提供所需的并行集群搭建及 Linux 系统管理，并提供相关培训 ，包含：系统使用、系统管理、系统维护等；</p><p>可为用户现有设备提供系统升级、硬件扩容及网络搭建服务；</p><p>可为用户安装所需其他软件，并提供相应的技术支持及必要的编译服务；</p><p>可为用户设置网络文件系统和并行计算系统、保证网络  安全并提供后期维护；</p><p>提供三年硬件质量保证及一年免费技术支持服务，2U4U 小时内响应，7 个工作日内解决问题。</p>",
		"<p>人民币捌万贰仟圆整  (¥82000)</p>",
		"价格有效期:2019年4月8日—2019年4月11日",
		"专注品质 用心服务",
		"西安硕星信息技术有限公司",
		"https://www.shuoxing.info 400-693-3112  西安雁塔南方星座",
	);
	
	
	public function GetPrice(SolutionPartM $slp){
		$this->allpartprice = 0;     //初始化所有配件价格
		foreach($slp->parts as $key=>$val){
			$myprice = D('part',$key);
			$this->allpartprice += $myprice->price*$val; //获取实际所有配件价格
		}
		$this->name = $slp->name;
		$this->devtype = $slp->devtype;
		$this->allpartarr = $slp->parts;
		$this->counts = $slp->counts;
	}
	
	public function addSlp(SolutionPartM $slp){
		array_push($this->parts,$slp);
		$this->city = $slp->city;
	}
	public function rtNub(){
		return count($this->parts);
	}
}
?>