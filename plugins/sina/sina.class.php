<?php
/**
 * index.php     ZCMS 新浪微博操作类
 *
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2011-2-18
 * @author       zhuayi
 * @QQ			 2179942
 */
class sina extends http
{
	/* app key */
	public $wb_key;
	
	/* app 密钥 */
	public $wb_skey;
	
	/* 版本 */
	public $version = '1.0a';
	
	public  $oauth_token;
	
	public  $oauth_token_secret;
	
	/*----构造函数 */
	function __construct()
	{
		parent::__construct();
	}
	
	/* 默认参数 */
	function _default()
	{
		$array['oauth_consumer_key'] = $this->wb_key;
		$array['oauth_nonce'] = $this->nonce();
		$array['oauth_signature_method'] = 'HMAC-SHA1';
		$array['oauth_timestamp'] = time();
		$array['oauth_token'] = $this->oauth_token;
		$array['oauth_version'] = $this->version;
		return $array;
	}
	
	function nonce()
	{
		
		return md5(mt_rand().time());
	}
	
	/* http 操作 */
	function http($url , $array = array(), $method='GET',$token='',$file='')
	{
		$default = $this->_default();
		
		$array['source'] = $this->wb_key;
		
		if (!empty($array))
		$array = array_merge($default,$array);
		else
		$array = $default;
		
		/* 排序数组 */
		$keys = array_keys($array);
		$values = array_values($array);
		//$array = array_combine($keys, $values); 
		uksort($array, 'strcmp');
		
		$array['oauth_signature'] = $this->singn($url,$array,$method,$token);
		
		if ($method == 'GET')
		{
			$this->get($url,$array);
		}
		else
		{
			$array['oauth_signature'] = $this->urlencode_rfc3986($array['oauth_signature']);

			if (!empty($file[1]))
			{
				$formfiles[$file[0]] = $file[1];
				$this->_submit_type = "multipart/form-data"; 
			}

			$this->post($url,$array);
		}

		if ($this->status  > 0 )
		{
			return array('code_en'=>'-1','code_cn'=>$this->error);
		}
		else
		{
			
			$reset =  json_decode($this->results,true);	
			if (is_array($reset))
			{
				return $reset;
			}
			else
			{
				return $this->results;
			}
		}

	}
	
	/* HMAC 签名算法 */
	function singn($url,$array,$method='GET',$token)
	{
		foreach ($array as $key=>$val)
		{
			$base_string[] = urldecode($key).'%3D'.$this->urlencode_rfc3986($this->urlencode_rfc3986(trim($val)));
		}
		
		$base_string = implode('%26',$base_string);
		$base_string =  $method.'&'.rawurlencode($url).'&'.$base_string;

		return  base64_encode(hash_hmac('SHA1', $base_string, $this->wb_skey.'&'.$token, true));
		return  $this->urlencode_rfc3986(base64_encode(hash_hmac('SHA1', $base_string, $this->wb_skey.'&'.$token, true)));
	}
	
	/* 获取request token */
	function request_token()
	{
		return $this->http('http://api.t.sina.com.cn/oauth/request_token');
	}
	
	/* 获取access token 和 授权码*/
	function access_token($verifier)
	{
		$array['oauth_verifier'] = $verifier;
		return $this->http('http://api.t.sina.com.cn/oauth/access_token',$array,'GET',$this->oauth_token_secret);
	}
	
	/* 返回用户信息 */
	function verify_credentials()
	{
		return $this->http('http://api.t.sina.com.cn/account/verify_credentials.json','','GET',$this->oauth_token_secret);
	}
	
	/* 更改资料 */
	function update_profile($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/account/update_profile.json',$array,'POST',$this->oauth_token_secret);
		//$this->test($reset);
		return $reset;
	}
	/* 更改头像 */
	function update_profile_image($file)
	{
		$array['source'] = $this->wb_key;
		$reset =  $this->http('http://api.t.sina.com.cn/account/update_profile_image.json',$array,'POST',$this->oauth_token_secret,$file);
		return $reset;
	}
	/* 获 取 微 博 */
	function weibo_list($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/friends_timeline.json',$array,'GET',$this->oauth_token_secret);
		
		return $reset;
	}
	
	/* 发布一条微博 */
	function weibo_info($status,$file)
	{
		
		$status = str_replace('+','',$status);
		$array['source'] = $this->wb_key;
		$array['status'] = $status;
		
		if (!empty($file))
			$reset =  $this->http('http://api.t.sina.com.cn/statuses/upload.json',$array,'POST',$this->oauth_token_secret,array('pic',$file));
		else
			$reset =  $this->http('http://api.t.sina.com.cn/statuses/update.json',$array,'POST',$this->oauth_token_secret);
		
		if ($reset['code_en'] != '-1')
		{
			$reset2['code_en'] = '1';
			//$reset2['code_cn']['id'] = $reset['code_cn']['data']['id'];
			$reset2['code_cn']['source'] = $reset['source'];
			$reset2['code_cn']['body'] = $reset['text'];
			$reset2['code_cn']['md5'] = md5($reset2['body']);
			$reset2['code_cn']['aid'] = $reset['user']['id'];
			$reset2['code_cn']['dtime'] = strtotime($reset['created_at']);
			$reset2['code_cn']['app'] = 'sina';
			$reset2['code_cn']['face'] = $reset['user']['profile_image_url'];
			$reset2['code_cn']['name'] = $reset['user']['name'];
			$reset2['code_cn']['litpic'] = $reset['thumbnail_pic'];
			$reset = $reset2;
		}
		
		return $reset;
	}
	
	/* 根据ID 获取单挑微博 */
	function weibo($id)
	{
		$array['source'] = $this->wb_key;
		
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/show/'.$id.'.json',$array,'GET',$this->oauth_token_secret,$file);
		
		return $reset;
	}
	
	/* 转发一条微博 */
	function weibo_repost($id,$status,$is_comment)
	{
		$status = str_replace('+','',$status);
		$array['source'] = $this->wb_key;
		$array['id'] = $id;
		$array['status'] = $status;
		$array['is_comment'] = $is_comment;
		//$this->test($array);
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/repost.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回系统推荐用户 */
	function hot()
	{
		$array['source'] = $this->wb_key;
		$reset =  $this->http('http://api.t.sina.com.cn/users/hot.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回周话题榜 */
	function trends()
	{
		$array['source'] = $this->wb_key;
		$array['base_app'] = 0;
		$reset =  $this->http('http://api.t.sina.com.cn/trends/weekly.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回话题下的微博 */
	function trends_statuses($trend_name)
	{
		$array['trend_name'] = $trend_name;
		$reset =  $this->http('http://api.t.sina.com.cn/trends/statuses.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回当前用户可能感兴趣的用户 */
	function suggestions()
	{
		$array['with_reason'] = 1;
		$reset =  $this->http('http://api.t.sina.com.cn/users/suggestions.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回指定用户的标签列表 */
	function tags($user_id)
	{
		$array['user_id'] = $user_id;
		$reset =  $this->http('http://api.t.sina.com.cn/tags.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 添加一个用户标签 */
	function tags_save($tags)
	{
		$array['tags'] = $tags;
		$reset =  $this->http('http://api.t.sina.com.cn/tags/create.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 删除用户标签 */
	function tags_del($ids)
	{
		$array['ids'] = $ids;
		
		$reset =  $this->http('http://api.t.sina.com.cn/tags/destroy_batch.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取关注列表 */
	function friends($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/friends.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	
	
	/* 取消关注 */
	function friends_del($id)
	{
		$array['user_id'] = $id;
		$reset =  $this->http('http://api.t.sina.com.cn/friendships/destroy.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取粉丝 */
	function follow($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/followers.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获 取 优 质 粉 丝 */
	function follow_active($array)
	{
		$reset =  $this->http('https://api.weibo.com/2/friendships/followers/active.json',$array,'GET',$this->oauth_token_secret);
		
		return $reset;
	}
	
	/* 获取评论数和转发数 */
	function status_counts($ids)
	{
		$array['ids'] = $ids;
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/counts.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回用户最新发表的微博消息列表 */
	function user_timeline($array)
	{
		$reset =  $this->http('https://api.weibo.com/2/statuses/user_timeline.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	/* 删除微博 */
	function statuses_destroy($id)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/destroy/'.$id.'.json',$array,'POST',$this->oauth_token_secret);

		return $reset;
	}
	
	/* @我的 */
	function atme($array)
	{

		$reset =  $this->http('http://api.t.sina.com.cn/statuses/mentions.json',$array,'GET',$this->oauth_token_secret);

		return $reset;
	}
	
	/* 获取全部评论 */
	function comments_timeline()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/comments_timeline.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取收到评论 */
	function comments_to_me($array)
	{
		$array['count'] = 200;
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/comments_to_me.json',$array,'GET',$this->oauth_token_secret);

		return $reset;
	}
	
	/* 获取发出评论 */
	function comments_by_me($array)
	{
		$array['count'] = 200;
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/comments_by_me.json',$array,'GET',$this->oauth_token_secret);

		return $reset;
	}
	
	/* 评论一条信息 */
	function comment($id,$comment,$cid)
	{
		$array['id'] = $id;
		$array['comment'] = $comment;
		$array['cid'] = $cid;
		$array['comment_ori'] = 1;
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/comment.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取收到的私信 */
	function messages($array)
	{
		$array['count'] = 200;
		$reset =  $this->http('http://api.t.sina.com.cn/direct_messages.json',$array,'GET',$this->oauth_token_secret);

		return $reset;
	}
	
	/* 获取发出私信 */
	function messages_sent($array)
	{
		$array['count'] = 200;
		$reset =  $this->http('http://api.t.sina.com.cn/direct_messages/sent.json',$array,'GET',$this->oauth_token_secret);

		return $reset;
	}
	/* 删除私信 */
	function messages_del($id)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/direct_messages/destroy/'.$id.'.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 发布一条私信 */
	function messages_save($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/direct_messages/new.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 关注一个人 */
	function friends_create($ids)
	{
		//$array['source'] = $this->wb_key;
		$array['id'] = $ids;
		$reset =  $this->http('http://api.t.sina.com.cn/friendships/create.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取城镇表 */
	function provinces()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/provinces.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取未读消息 */
	function unread()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/unread.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 清除未读消息 */
	function reset_count($type)
	{
		$array['type'] = $type;
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/reset_count.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取当前微博评论列表 */
	function status_comments($array)
	{

		//$array['count'] = $array['count'];
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/comments.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取MID type 必选参数， id的类型：1=微博，2=评论；3=私信*/
	function queryid($id,$type)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/queryid.json?mid='.$id.'&isBase62=1&type='.$type,$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回一条原创微博消息的最新n条转发微博消息。本接口无法对非原创微博进行查询 */
	function repost_timeline($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/repost_timeline.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 获取用户最新转发的n条微博消息 */
	function repost_by_me($array)
	{
		$this->test($array);
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/repost_by_me.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 按用户ID或昵称返回用户资料以及用户的最新发布的一条微博消息。*/
	function user_show($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/users/show.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回调用限制 */
	function rate_limit_status()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/account/rate_limit_status.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 返回最新公共微博 */
	function public_timeline()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/public_timeline.json',array('count'=>200),'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 删除评论 */
	function comment_del($id)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/comment_destroy/'.$id.'.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
		
	}
	
	/* 回复一条评论 */
	function comment_reply($array)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/statuses/reply.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 我的收藏 */
	function favorites()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/favorites.json',$array,'GET',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 添加一个收藏 */
	function add_favorites($id)
	{
		$array['id'] = $id;
		$reset =  $this->http('http://api.t.sina.com.cn/favorites/create.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	/* 删除一个收藏 */
	function del_favorites($id)
	{
		$reset =  $this->http('http://api.t.sina.com.cn/favorites/destroy/'.$id.'.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	function ip()
	{
		$reset =  $this->http('http://api.t.sina.com.cn/location/geocode/ip_to_geo.json',$array,'POST',$this->oauth_token_secret);
		return $reset;
	}
	
	function test($array)
	{
		
		echo '<pre>';
		echo '<br>===================================================================<br>';
		print_r($array);
		echo '<br>===================================================================<br>';
		
	}
		
	
	function urlencode_rfc3986($input) { 
        if (is_array($input)) { 
            return array_map(array('outh', 'urlencode_rfc3986'), $input); 
        } else if (is_scalar($input)) { 
            return str_replace( 
                '+', 
                ' ', 
                str_replace('%7E', '~', rawurlencode($input)) 
            ); 
        } else { 
            return ''; 
        } 
    }
	
	/* 转换TOKEN */
	function token($token)
	{
		$token = explode('&',$token);
		foreach ($token as $key=>$val)
		{
			$val = explode('=',$val);
			$list[$val[0]] = $val[1];
		}
		$this->oauth_token = $list['oauth_token'];
		$this->oauth_token_secret = $list['oauth_token_secret'];
	}
	
	/* 帐号登录 */
	function login($callback)
	{
		$token = $this->request_token();

		$token = explode('&',$token);
		foreach ($token as $key=>$val)
		{
			$val = explode('=',$val);
			$list[$val[0]] = $val[1];
		}
		
		/* 记录获取来的token */
		cookie::set_cookie('sina_oauth_token',$list['oauth_token']);
		cookie::set_cookie('sina_oauth_token_secret',$list['oauth_token_secret']);
	
		$url = 'http://api.t.sina.com.cn/oauth/authorize?';
		$url .= 'oauth_token='.$list['oauth_token'];
		$url .= '&oauth_callback='.$callback;
		$url .= '&display=page';

		header("Location:".$url);
	}
	
	/* 得到了access 换取access_token*/
	function access()
	{
		$this->oauth_token = cookie::ret_cookie('sina_oauth_token');
		$this->oauth_token_secret = cookie::ret_cookie('sina_oauth_token_secret');

		$token = $this->access_token($_GET['oauth_verifier']);

		$token = explode('&',$token);
		foreach ($token as $key=>$val)
		{
			$val = explode('=',$val);
			$list[$val[0]] = $val[1];
		}
		$this->oauth_token = $list['oauth_token'];
		$this->oauth_token_secret = $list['oauth_token_secret'];
		
		$reset = $this->verify_credentials();
		$reset['token'] = $token;
		return $this->format($reset);
	}
	
	/* 格式化用户资料 */
	function format($reset)
	{
		$user['aid'] = $reset['id'];
		$user['name'] = $reset['name'];
		$user['address'] = $reset['location'];
		$user['description'] = $reset['description'];
		$user['face'] = $reset['profile_image_url'];
		$gender = array('m'=>1,'f'=>0);
		$user['sex'] = $gender[$reset['gender']];
		$user['token'] = implode('&',$reset['token']);
		$user['app'] = 'sina';
		return $user;
		
	}

}
?>