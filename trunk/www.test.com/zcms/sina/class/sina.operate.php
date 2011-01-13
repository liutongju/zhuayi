<?php
/**
 * index.php     ZCMS ����ļ�
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-10-27
 * @author       zhuayi
 * @QQ			 2179942
 */


 class sina
 {

	public $username;
	public $password;
	public $cookies;
	/* ��ʱʱ�� */
	private $timeout = 1;
	/* ��¼��ַ */
	private $login_url= 'http://login.sina.com.cn/sso/login.php?client=ssologin.js(v1.3.9)';
	/* ���캯�� */
	function __construct()
	{
		/* ʵ���� http������ */
		$this->snoopy = new Snoopy();

		/* ģ�������ͷ*/
		$http = array(
					'Mozilla/5.0 (iPhone; U; CPU iPhone OS 4_1 like Mac OS X; zh-cn) AppleWebKit/532.9 (KHTML, like Gecko) Version/4.0.5 Mobile/8B117 Safari/6531.22.7',//Iphone
					'Mozilla/5.0 (Windows; U; Windows NT 6.1; en-US) AppleWebKit/534.11 (KHTML, like Gecko) Chrome/9.0.570.0 Safari/534.11',//�����
					);
		$this->_http_key = 1;
		$this->snoopy->agent = $http[$this->_http_key];

		//$this->snoopy->_fp_timeout = $this->timeout;


	}

	/* login ��¼ */
	function login()
	{
		/* ������Դҳ */
		$this->snoopy->referer = 'http://t.sina.com.cn/';
		/* ���ñ� */
		$form['service'] = 'miniblog';
		$form['client'] = 'ssologin.js(v1.3.9)';
		$form['entry'] = 'miniblog';
		$form['encoding'] = 'utf-8';
		$form['gateway'] = '1';
		$form['savestate'] = '7';
		$form['from'] = '';
		$form['useticket'] = '0';
		$form['username'] = $this->username;
		$form['password'] = $this->password;
		$form['url'] = 'http://t.sina.com.cn/ajaxlogin.php?framelogin=1';
		$form['callback'] = 'parent.sinaSSOController.feedBackUrlCallBack';
		$form['returntype'] = 'META';
		/* �ύ�� */
		$this->snoopy->submit($this->login_url,$form);
		$cookie = $this->cookies($this->snoopy->cookies);

		/* ��ȡcookie */
		foreach ($this->snoopy->cookies as $key=>$val)
		{
			$cookie .= $key.'='.$val.';';
		}
		/* ����cookie */
		$this->snoopy->cookies["Set-Cookie"] = $cookie;

		/* �����ύ */
		$this->snoopy->submit('http://t.sina.com.cn/ajaxlogin.php?framelogin=1',$form);

		//echo '<pre>';
		//print_r($this->snoopy->headers);
		/* ��ȡCOOKIE ��� WEIBOALC */
		foreach ($this->snoopy->headers as $val)
		{
			if (strpos('%%'.$val,'WEIBOALC')>0)
			{
				$cookies = explode(';',trim(str_replace('Set-Cookie:','',$val)));
				break;
			}
		}
		$uid = explode('uid=',$cookie);
		$uid = explode('&',$uid[1]);

		if (!empty($cookies[0]))
		{
			/* ��¼�ɹ�*/
			return array('uid'=>$uid[0],'cookie'=>$cookie .= $cookies[0]);
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;

		$this->snoopy->fetch('http://t.sina.com.cn/');
		$reset = $this->snoopy->headers;

		/* ��ȡҪ��ת�ĵ�ַ */
		foreach ($reset as $val)
		{
			if (strpos('%%'.$val,'Location')>0)
			{
				$url =  str_replace('Location: /','',$val);
				break;
			}
		}

		/* �ж��Ƿ���http */
		if (substr($url,0,7) != 'http://')
		{
			$url = 'http://t.sina.com.cn/'.trim($url);
		}

		$this->snoopy->fetch($url);
		$reset = siconv($this->snoopy->results);

		if (strpos($reset,'�ҵ���ҳ')>0)
		{
			/* ��¼�ɹ�*/
			return '1';
		}
		elseif (strpos($reset,'��Щ��������΢��')>0)
		{
			/* �ʺŻ�������� */
			return '-1';
		}
		elseif (trim($headers[0]) == 'HTTP/1.1 302 Found')
		{
			return '-2';
		}
		else
		{
			/* δ֪ */
			return $reset;
		}
	}

	/* ����ֵ */
	function error($num)
	{
		/* ����ֵ */
		switch ($num)
		{
			case '1';
			return '<font color=#336aaf>���ʺ��Ѿ��Ǽ����ʺ�</font>';
			break;

			case '-1';
			return '<font color=red>�ʺŻ��������</font>';
			break;

			case '-2';
			return '<font color=red>δ������ʺ�</font>';
			break;

			case '-3';
			return '<font color=red>δ֪ԭ��</font>';
			break;

			case '-999';
			return '<font color=red>δ֪ԭ��</font>';
			break;

			case '2';
			return '<font color=#009900>����ɹ�</font>';
			break;

			default:
			return $num;
			break;
		}
	}

	/* ��ȡtoken */
	function token()
	{
		/* ��¼һ�� ��ȡtoken */

		$this->snoopy->rawheaders["COOKIE"] = $this->cookies;

		$this->snoopy->proxy_host = ret_cookie('agent_ip');
		$this->snoopy->proxy_port = ret_cookie('agent_port');

		$this->snoopy->fetch('http://t.sina.com.cn/person/full_info.php');

		$reset = iconv('utf-8','gbk',$this->snoopy->results);

		if (empty($reset))
		{
			return '-3';
		}
		if (strpos($reset,'������������Ϣ��ͨ���΢��')==0)
		{
			/* ��¼�ɹ�*/
			return '1';
		}
		else
		{
			$reset = explode('$token',$reset);
			$reset = explode('",',$reset[1]);
			$token = str_replace(': "','',trim($reset[0]));
		}
		//echo $token;
		set_cookie('token',$token);
		$this->snoopy->referer = 'http://t.sina.com.cn/person/full_info.php';

		$this->snoopy->fetch('http://t.sina.com.cn/pincode/pin1.php?r=1294800814658&lang=zh');
		//echo '<pre>';
		//print_r($this->snoopy->headers);
		$cookie = str_replace('Set-Cookie: ','',$this->snoopy->headers[3]);
		$cookie = explode(';',$cookie);
		$cookie = explode('=',$cookie[0]);
		set_cookie('ULOGIN_IMG',$cookie[1]);
		//echo $cookie[1];
		$cookie = str_replace('Set-Cookie: ','',$this->snoopy->headers[11]);
		$cookie = explode(';',$cookie);
		$cookie = explode('=',$cookie[0]);
		set_cookie('NSC_wjq_eqppm2_xfc1',$cookie[1]);;
		return $this->snoopy->results;
	}
	/* �����ʺ� */
	function activation($info,$sina_code,$code)
	{
		$this->snoopy->rawheaders["COOKIE"] = $this->cookies;
		$this->snoopy->referer = 'http://t.sina.com.cn/person/full_info.php';
		$info['province'] = explode(',',$info['province']);
		$info['city'] = $info['province'][1];
		$info['province'] = $info['province'][0];
		$form['nickname'] = iconv('gbk','utf-8',$info['nick']);
		$form['expand'] = '1';
		$form['token'] = ret_cookie('token');
		$form['lang'] = 'zh';
		$form['invitecode'] = '812hg8A';
		$form['province'] = $info['province'];
		$form['city'] = $info['city'];
		$form['gender'] = $info['gender'];
		$form['mobile'] = $info['mobile'];
		$form['card_type'] = '1';
		$form['card_num'] = $info['card_num'];
		$form['basedoor'] = $code;

		/* ת��cookie */
		$cookie =  explode(';',$this->cookies);

		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = trim($val[1]);
		}
		$this->snoopy->cookies["ULOGIN_IMG"] = trim(ret_cookie('ULOGIN_IMG'));
		$this->snoopy->cookies["NSC_wjq_eqppm2_xfc1"] = trim(ret_cookie('NSC_wjq_eqppm2_xfc1'));

		//echo '<pre>';
		//exit;

		//exit;
		$this->snoopy->proxy_host = ret_cookie('agent_ip');
		$this->snoopy->proxy_port = ret_cookie('agent_port');
		//return '2';
		/* �ύ������Ϣ */
		$this->snoopy->submit('http://t.sina.com.cn/person/aj_full_info.php?rnd=0.5932313893841667',$form);

		if ( $this->snoopy->results == '{"code":"A00006","data":"expand=1"}')
		{
			return '2';
		}
		elseif (trim($this->snoopy->results) == '{"code":"R01438"}')
		{
			return '-999';
		}
		else
		{
			return $this->snoopy->results;
		}


	}

	/* �ж��ǳƣ���������ڷ���ԭʼ�����ڷ������һ�� */
	function nickname($username)
	{
		$this->snoopy->fetch('http://t.sina.com.cn/person/aj_checknick.php?nickname='.iconv('gbk','utf-8',$username).'&rnd=0.4850884689949453');
		if ($this->snoopy->results != '{"code":"A00006"}')
		{
			$reset = json_decode($this->snoopy->results,true);
			$reset = array_filter($reset['data']);
			return iconv('utf-8','gbk',$reset[array_rand($reset)]);
		}
		else
		{
			return $username;
		}
	}
	/* �ϴ�ͷ�� */
	function face_upload($litpic)
	{
		$this->snoopy->referer = 'http://t.sina.com.cn/setting/myface#';
		/* ת��cookie */
		$cookie =  explode(';',$this->cookies);

		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}
		//$this->snoopy->rawheaders["COOKIE"] = $this->cookies;
		$form['filename'] = basename($litpic);
		$form['name'] = 'Filedata';
		$formfiles['Filedata'] = $litpic;
		$this->snoopy->set_submit_multipart();
		$this->snoopy->submit('http://t.sina.com.cn/person/myface_postjs.php',$form,$formfiles);
		$this->snoopy->results = str_replace('<html><script>var json=','',$this->snoopy->results);
		$this->snoopy->results = str_replace(';window.parent.scope.addImgSuccess(json);</script></html>','',$this->snoopy->results);
		if (strpos('%%'.$this->snoopy->results,'{"code":"A00006"') > 0)
		{
			/* �����ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;

	}

	/* ����ģ�� */
	function skin($skin)
	{
		$this->snoopy->referer = 'http://t.sina.com.cn/person/myskin.php';
		$cookie =  explode(';',$this->cookies);
		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}
		$form['skin'] = $skin;//'skin_234';
		$this->snoopy->submit('http://t.sina.com.cn/person/skin_post.php?rnd=0.3924641423077948',$form);
		if (trim($this->snoopy->results) == '{"code":"A00006"}')
		{
			/* ��¼�ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;
	}

	/* ��ע */
	function attention($uid,$myid)
	{
		//$this->snoopy->proxy_host = '211.137.73.116';//;ret_cookie('agent_ip');
		//$this->snoopy->proxy_port = '80';//ret_cookie('agent_port');

		$this->snoopy->referer = 'http://t.sina.com.cn/'.$uid;
		$this->ret_cookie();
		$form['atnId'] = 'profile';
		$form['refer_sort'] = 'profile';
		$form['fromuid'] = $myid;
		$form['uid'] = $uid;

		$this->snoopy->submit('http://t.sina.com.cn/attention/aj_addfollow.php?refer_sort=profile&atnId=profile&rnd=0.11307472009183605',$form);

		if (strpos('%%'.$this->snoopy->results,'{"code":"A00006"') > 0)
		{
			/* ��ע�ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;
	}

	/* �������� */
	function myinfo($info)
	{
		$this->snoopy->referer = 'http://t.sina.com.cn/setting/user';
		$cookie =  explode(';',$this->cookies);
		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}
		$info['birthday'] = explode('-',$info['birthday']);
		$form['nickname'] = iconv('gbk','utf-8',$info['nick']);
		$form['oldnick'] = $form['nickname'];
		$form['realname'] = '';
		$form['oldrealname'] = '';
		$form['gender'] = $info['gender'];

		$form['blog'] = '';
		$form['cmail'] = $info['username'];
		$form['qq'] = $info['qq'];
		$form['msn'] = '';
		$form['card_code'] = '';
		$form['mydesc'] = iconv('gbk','utf-8',strlens($info['sign'],0,70));

		$form['pub_name'] = 0;
		$form['province'] = $info['province'];

		$form['city'] = $info['city'];
		$form['Date_Year'] = $info['birthday'][0];
		$form['birthday_m'] = $info['birthday'][1];
		$form['birthday_d'] = $info['birthday'][2];
		$form['pub_birthday'] = 0;
		$form['pub_blog'] = 0;
		$form['pub_email'] = 0;
		$form['pub_qq'] = 0;
		$form['pub_msn'] = 0;
		$form['card_type'] = 0;
		$this->snoopy->submit('http://t.sina.com.cn/person/myinfo_post.php',$form);

		//echo $this->snoopy->results;
		if (strpos('%%'.$this->snoopy->results,'{"code":"A00006"') > 0)
		{
			/* ��ע�ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;
	}

	/* ���±�ǩ */
	function tags($tags)
	{
		$this->snoopy->referer = 'http://t.sina.com.cn/person/tag.php';
		$cookie =  explode(';',$this->cookies);
		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}
		$form['tag'] = $this->siconv($tags);
		$this->snoopy->submit('http://t.sina.com.cn/person/aj_addusertag.php',$form);
		if (strpos('%%'.$this->snoopy->results,'{"code":"A00006"') > 0)
		{
			/* ���±�ǩ�ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;

	}

	/* ת�� */
	function forward($url)
	{
		/* ���� */
		//$this->snoopy->proxy_host = ret_cookie('agent_ip');
		//$this->snoopy->proxy_port = ret_cookie('agent_port');

		$this->snoopy->referer = 'http://t.sina.com.cn/';
		$cookie =  explode(';',$this->cookies);
		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}
		/* ��ȡת��ID */
		$this->snoopy->fetch(urldecode($url));

		//echo $mid = $this->str_substr('$resourceId = "','"',$this->snoopy->results);
		$retcode = urldecode($this->str_substr('<div class="rt">','">',$this->snoopy->results));

		preg_match("/<a href=\"javascript:void\(0\);\"  lastforwarder=\"(.*)\" lastforwardername=\"(.*)\" initbloger=\"(.*)\"  initblogername=\"(.*)\" onclick=\"App.ModForward\('(.*)','(.*)',0,this,'(.*)','(.*)',''\)/",$retcode,$retcodes);
		//$retcode = str_replace("','",'',$retcode[1]);
		//if (!empty($retcode))
		//{
		//	$retcode = '//@'.$retcode;
		//}
		$mid = $retcodes[5];
		//echo '<br>'.$mid;
		//echo '<pre>';
		//print_r(siconv($retcodes[8]));
		//print_r($retcodes);
		//exit;

		if (empty($mid))
		{
			return array('code'=>'-1','error'=>'��ȡת��IDʧ��');
		}
		$form['reason'] = $retcodes[8];
		$form['mid'] = $mid;
		$form['retcode'] = '';
		/* �ύת����ַ */
		$this->snoopy->submit('http://t.sina.com.cn/mblog/forward.php?rnd=0.9509237033949843',$form);
		//echo $this->snoopy->results;
		if (strpos('%%'.$this->snoopy->results,'{"code":"A00006"') > 0)
		{
			/* ����ת���ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
		exit;
	}

	/* ����΢�� */
	function t_info($body,$litpic,$uid)
	{
		$this->snoopy->referer = 'http://t.sina.com.cn/'.$uid;
		/* ת��cookie */
		$cookie =  explode(';',$this->cookies);

		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}
		//echo '<pre>';
		//print_r($this->snoopy->cookies);
		/* �ϴ�ͼƬ*/
		if (!empty($litpic))
		{
			/*
			$this->snoopy->fetch('http://t.sina.com.cn/'.$uid);
			//print_r($this->snoopy->cookies);
			//exit;
			$cookie =  explode(';',$this->cookies);

			foreach ($cookie as $val)
			{
				$val = explode('=',$val,2);
				$this->snoopy->cookies[$val[0]] = $val[1];
			}

			//$form['app'] = 'miniblog';
			//$form['token'] = '739bbcdec9826e399e1cb717c3559e40';
			//$formfiles['s'] = 'json';
			////$formfiles['cb'] = '';
			//$formfiles['markstr'] = '';
			$form['filename'] = basename($litpic);
			$form['name'] = 'pic1';
			$formfiles['pic1'] = $litpic;
			//$this->snoopy->set_submit_multipart();
			$this->snoopy->submit('http://picupload.t.sina.com.cn/interface/pic_upload.php?marks=1&markstr=t.sina.com.cn%2F'.$uid.'&s=json&app=miniblog&cb=http://t.sina.com.cn/upimgback.html',$form,$formfiles);
			echo '<pre>';
			print_r($this->snoopy);
			exit;
			*/

		}

		$form['content'] = $this->siconv($body);
		$form['pic'] = $litpic;
		$form['styleid'] = 1;
		$form['retcode'] ='';
		$this->snoopy->submit('http://t.sina.com.cn/mblog/publish.php?rnd=0.20888335562638238',$form);
		if (strpos('%%'.$this->snoopy->results,'{"code":"A00006"') > 0)
		{
			/* ����ת���ɹ�*/
			return '1';
		}
		else
		{
			return array('code'=>'-1','error'=>$this->snoopy->results);
		}
	}
	/* �ж��Ƿ����� */
	function dead($uid)
	{
		$this->snoopy->referer = 'http://t.sina.com.cn/'.$uid;
		$this->ret_cookie();
		$this->snoopy->fetch('http://t.sina.com.cn/'.$uid);
		if (trim($this->snoopy->lastredirectaddr) == 'http://t.sina.com.cn/defr.php?s=1&lang=zh-cn')
		{
			return array('code'=>'-1','error'=>'�˺��ѱ�����');
		}
		else
		{
			return '1';
		}
		exit;
	}
	/* ����uid��ȡ�û��ǳ� */
	function ret_nickname($uid)
	{
		$this->snoopy->fetch('http://t.sina.com.cn/reg.php?inviteCode='.$uid);
		$nickname = trim($this->str_substr('hi ����','<br />',iconv('utf-8','gbk',$this->snoopy->results)));
		if (!empty($nickname))
		{
			return array('code'=>'1','error'=>$nickname);
		}
		else
		{
			return array('code'=>'-1','error'=>'δ֪ԭ��');
		}
		exit;
	}
	/* ��ȡ */
	function str_substr($start, $end, $str)
	{
		$temp = explode($start, $str, 2);
		$content = explode($end, $temp[1], 2);
		return $content[0];
	}

	function siconv($str)
	{
		return iconv('GBK','utf-8',$str);
	}
	function cookies($array)
	{
		/* ��ȡcookie */
		$cookie .= 'ALF='.$array['ALF'].';';
		$cookie .= 'SUR='.$array['SUR'].';';
		$cookie .= 'un='.$this->username;

		return $cookie;
	}

	/* ����cookie */
	function ret_cookie()
	{
		//$this->cookies =  preg_replace('/et=\d{10}/','et='.(time()+86400),$this->cookies);
		//$this->cookies =  str_replace('&lt=1','&lt=365',$this->cookies);

		$cookie =  explode(';',$this->cookies);
		foreach ($cookie as $val)
		{
			$val = explode('=',$val,2);
			$this->snoopy->cookies[$val[0]] = $val[1];
		}

	}

	function test()
	{
		$this->snoopy->proxy_host = '123.120.45.56';//;ret_cookie('agent_ip');
		$this->snoopy->proxy_port = '80';//ret_cookie('agent_port');
		$this->snoopy->fetch('http://zhongkun888.gicp.net/test.php');
		return $this->snoopy;

	}

 }



 ?>