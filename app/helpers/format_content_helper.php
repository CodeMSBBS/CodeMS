<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('format_content'))
{
	function format_content($text)
	{

		//if(preg_match($img_url, $text)){
		//	$text = preg_replace($img_url, '<img src="\1" alt="" />', $text);
	   //	}
	   	//preg_match_all($img_url, $text,$arr);
   		
   		
   		//$text= $arr[0][0];

    	// 视频地址识别。
	    // youku
		if(strpos($text, 'player.youku.com')){
		    $text = preg_replace('/http:\/\/player.youku.com\/player.php\/sid\/([a-zA-Z0-9\=]+)\/v.swf/', '<div class="embed-responsive embed-responsive-16by9"><embed src="http://player.youku.com/player.php/sid/\1/v.swf" quality="high" width="100%" height="auto" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></div>', $text);
		}
		
	    if(strpos($text, 'v.youku.com')){
	        $text = preg_replace('/http:\/\/v.youku.com\/v_show\/id_([a-zA-Z0-9\=]+)(\/|.html?)?/', '<div class="embed-responsive embed-responsive-16by9"><embed src="http://player.youku.com/player.php/sid/\1/v.swf" quality="high" width="100%" height="auto" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></div>', $text);
	    }

	    // tudou
	    if(strpos($text, 'www.tudou.com')){
	        if(strpos($text, 'programs/view')){
	            $text = preg_replace('/http:\/\/www.tudou.com\/(programs\/view|listplay)\/([a-zA-Z0-9\=\_\-]+)(\/|.html?)?/', '<div class="embed-responsive embed-responsive-16by9"><embed src="http://www.tudou.com/v/\2/" quality="high" width="100%" height="auto" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></div>', $text);
	        }elseif(strpos($text, 'albumplay')){
	            $text = preg_replace('/http:\/\/www.tudou.com\/(albumplay)\/([a-zA-Z0-9\=\_\-]+)\/([a-zA-Z0-9\=\_\-]+)(\/|.html?)?/', '<embed src="http://www.tudou.com/a/\2/" quality="high" width="100%" height="auto" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed>', $text);
	        }else{
	            $text = preg_replace('/http:\/\/www.tudou.com\/(programs\/view|listplay)\/([a-zA-Z0-9\=\_\-]+)(\/|.html?)?/', '<div class="embed-responsive embed-responsive-16by9"><embed src="http://www.tudou.com/l/\2/" quality="high" width="100%" height="auto" align="middle" allowScriptAccess="sameDomain" type="application/x-shockwave-flash"></embed></div>', $text);
	        }
	    }


		// 搜狐视频 //http://share.vrs.sohu.com/my/v.swf&topBar=1&id=83024513&autoplay=false&from=page
	    if(strpos($text, 'share.vrs.sohu.com')){
		    $text = preg_replace('/http:\/\/share.vrs.sohu.com\/my\/v.swf(.+)/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://share.vrs.sohu.com/my/v.swf\1"/>', $text);
		}

	    // 微博视频 //http://video.weibo.com/player/1034:8dd3ca1d599297c0e3d6b35ba3ad435e/v.swf
	    if(strpos($text, 'video.weibo.com')){
		    $text = preg_replace('/http:\/\/video.weibo.com\/player\/([a-zA-Z0-9\:\=]+)\/v.swf/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://video.weibo.com/player/\1/v.swf"/>', $text);
		}

		// 新浪视频 //http://video.sina.com.cn/share/video/250494288.swf
		if(strpos($text, 'video.sina.com.cn')){
		    $text = preg_replace('/http:\/\/video.sina.com.cn\/share\/video\/([a-zA-Z0-9\:\=]+).swf/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://video.sina.com.cn/share/video/\1.swf"/>', $text);
		}

		// 酷6视频  //http://player.ku6.com/refer/6n_hlPxYlJshtmK2-Yam0w../v.swf
	    if(strpos($text, 'player.ku6.com')){
		    $text = preg_replace('/http:\/\/player.ku6.com\/refer\/(.+)\/v.swf/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://player.ku6.com/refer/\1/v.swf"/>', $text);
		}

		// 爱奇艺 //http://player.video.qiyi.com/20cfe2e6e1a03aa0811bd36345162fb1/0/0/v_19rrkftw84.swf-albumId=434081800-tvId=434081800-isPurchase=0-cnId=25
		if(strpos($text, 'player.video.qiyi.com')){
		    $text = preg_replace('/http:\/\/player.video.qiyi.com\/(.+)/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://player.video.qiyi.com/\1"/>', $text);
		}

		// 凤凰视频 //http://v.ifeng.com/include/exterior.swf?guid=01ff9b9f-fd0c-468a-8447-5c8ea44270f6&AutoPlay=false
		if(strpos($text, 'v.ifeng.com')){
		    $text = preg_replace('/http:\/\/v.ifeng.com\/include\/exterior.swf\?guid=(.+)/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://v.ifeng.com/include/exterior.swf?guid=/\1"/>', $text);
		}

		// 乐视视频 //http://i7.imgs.letv.com/player/swfPlayer.swf?autoPlay=0&id=24633685
		if(strpos($text, 'i7.imgs.letv.com')){
		    $text = preg_replace('/http:\/\/i7.imgs.letv.com\/player\/swfPlayer.swf\?autoPlay\=0(.+)/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://i7.imgs.letv.com/player/swfPlayer.swf?autoPlay=0\1"/>', $text);
		}

		// 秒拍 //http://www.miaopai.com/show/zx0HvBoq1s5cs4IwW7ZLKg__.swf
		if(strpos($text, 'www.miaopai.com/show')){
		    $text = preg_replace('/http:\/\/www.miaopai.com\/show\/(.+).swf/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://www.miaopai.com/show/\1.swf"/>', $text);
		}

		// 淘宝视频 //http://cloud.video.taobao.com/play/u/105888000/e/1/t/1/p/2/11225099.swf
		if(strpos($text, 'cloud.video.taobao.com')){
		    $text = preg_replace('/http:\/\/cloud.video.taobao.com\/play\/u\/(.+).swf/', '<embed type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" wmode="transparent" quality="high" height="480" width="480" src="http://cloud.video.taobao.com/play/u/\1.swf"/>', $text);
		}

	    $CI =& get_instance();
		$CI->load->helper('typography');
		$text = auto_link_pic($text, 'url', TRUE);
		//$text = auto_link($text, 'url', TRUE);
	   	//url
	    if(strpos(' '.$text, 'http')){
	        $text = ' '.$text;
	        $text = preg_replace(
	        	'`([^"=\'>])((http|https|ftp)://[^\s<]+[^\s<\.)])`i',
	        	'$1<a href="$2" target="_blank" rel="nofollow">$2</a>',
	        	$text
	        );
	        $text = substr($text, 1);
	    }
	   	
		$text=str_replace('&lt;pre&gt;','<pre>',$text);
		$text=str_replace('&lt;/pre&gt;','</pre>',$text);
	   	$text=nl2br_except_pre($text);
		return $text;
	}


}

/* End of file format_content_helper.php */
/* Location: ./system/helpers/format_content_helper.php */