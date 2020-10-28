<?php
class FinanceC extends C{
	public function Speekinit(){
		if(empty($_SESSION['jspjuid'])){
			$this->url('请登录','/index/login');
		}
		$this->prj['webwidth'] = 80;
	}
	public function Index(){
		$departid=9;
		$this->prj['title']='财务部-硕星信息，西安硕星信息技术有限公司';
		$this->prj['mycss'] = "<link rel='stylesheet' type='text/css' href='"._P_."/main.css'>";
		$this->prj['left'][] = array('name'=>'主页','url'=>URL."/$_GET[c]");
		$this->prj['left'][] = array('name'=>'报销审批','url'=>URL."/Solution");
		$this->prj['left'][] = array('name'=>'返回首页','url'=>URL);
		$this->assign('prj',$this->prj);
		$this->display();
	}
	public function Email(){
		//$server = "jinsong.f3322.net"; //邮件服务器  
		//$mailLink = "{{$server}:143}inbox";
		$mailLink = "{jinsong.f3322.net:143/ssl}";
		$mailaccount="baijinsong";//用户名  
		$mailpasswd="bjs56233one"; //密码  
		$mbox =  imap_open($mailLink,$mailaccount,$mailpasswd);//打开IMAP 连结  
		$totalrows = imap_num_msg($mbox);//信件的个数  
		echo "steep 1<br>";
		$mailboxes = imap_list($mbox, $mailLink, '*');
		$mailboxes = str_replace($mailLink, '', $mailboxes);
		print_r($mailboxes);
		//echo $totalrows;
		//for ($i=1;$i<$totalrows;$i++){
		 //   echo $headers = imap_fetchheader($mbox, $i); //获取信件标头
		//    echo $headArr = matchMailHead($headers); //匹配信件标头
		//    echo $mailBody = imap_fetchbody($mbox, $i, 1); //获取信件正文
		//}
		echo "steep 2<br>";
		/*if($mail_number < 1) { echo "No Message for $email"; }//如果信件数为0,显示信息  
		  
		  echo 'steep 2';
		for($i=$mail_number;$i>=$mail_number;$i--)  
		{  
		   $headers = @imap_header($stream, $i);  
		   $mail_header= imap_headerinfo($stream, $i);//邮件头部  
		   //var_dump ($mail_header);  
		   $subject = $mail_header->subject;//邮件标题  
		   $subject=decode_mime($subject);  
		   echo $subject;  
		  
		
		  echo $from = $mail_header->fromaddress;//发件人  
		  echo $date = $mail_header->date;//日期     
		  
		  
		        $body = imap_fetchbody($stream, $i, 1);  
		        $body = imap_base64($body);  
		$body = nl2br($body);  
		        echo $body;  
		  
		  
		}  
		  
		  echo 'steep 3';
		function decode_mime($string)  
		{  
		    $pos = strpos($string,'=?');  
		    if (!is_int($pos)) {  
		       return $string;  
		    }  
		    $preceding = substr($string, 0, $pos); // save any preceding text  
		    $search = substr($string, $pos+2); // the mime header spec says this is the longest a single encoded Word can be 
		    $d1 = strpos($search, '?');  
		    if (!is_int($d1)) {  
		      return $string;  
		    }  
		    $charset = substr($string, $pos+2, $d1); //取出字符集的定义部分  
		    $search = substr($search, $d1+1); //字符集定义以后的部分＝>$search;  
		    $d2 = strpos($search, '?');  
		    if (!is_int($d2)) {  
		        return $string;  
		    }  
		    $encoding = substr($search, 0, $d2); ////两个?　之间的部分编码方式　：ｑ　或　ｂ　  
		    $search = substr($search, $d2+1);  
		    $end = strpos($search, '?='); //$d2+1 与 $end 之间是编码了　的内容：=> $endcoded_text;  
		    if (!is_int($end)) {  
		      return $string;  
		    }  
		    $encoded_text = substr($search, 0, $end);  
		    $rest = substr($string, (strlen($preceding . $charset . $encoding . $encoded_text)+6)); //+6 是前面去掉的　=????=　六个字符  
		    switch ($encoding) {  
		    case 'Q':  
		    case 'q':  
		     $decoded=quoted_printable_decode($encoded_text);  
		     if (strtolower($charset) == 'windows-1251') {  
		     $decoded = convert_cyr_string($decoded, 'w', 'k');  
		     }  
		    break;  
		    case 'B':  
		    case 'b':  
		    $decoded = base64_decode($encoded_text);  
		    if (strtolower($charset) == 'windows-1251') {  
		     $decoded = convert_cyr_string($decoded, 'w', 'k');  
		    }  
		    break;  
		    default:  
		    $decoded = '=?' . $charset . '?' . $encoding . '?' . $encoded_text . '?=';  
		    break;  
		    }  
		    return $preceding . $decoded .decode_mime($rest);  
			}
				echo 'steep 4';*/
	}
	
}
?>