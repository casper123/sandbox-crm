<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


function get_footer_stores($country = "GB")
{
    $CI =& get_instance();
    $CI->load->model('Storeoffersmodel');

    return $CI->Storesmodel->getTopRatedStores($country);
}

function get_footer_offers()
{
    $CI =& get_instance();
    $CI->load->model('Storeoffersmodel');

    return $CI->Storeoffersmodel->getHomePageOffers();
}

function get_footer_categories()
{
    $CI =& get_instance();
    $CI->load->model('Categorymodel');

    return $CI->Categorymodel->getAllActive();
}

function get_about_content()
{
    $CI =& get_instance();
    $CI->load->model('Siteconfigmodel');

    return $CI->Siteconfigmodel->getConfig();
}

function rewrite_url($text, $id, $type = "store", $siteId = 2)
{
    if ($type == "store" && $siteId == 2)
        $text .= " discount codes";
        
    $text = trim($text); 
    $text = strtolower($text);
    $text = str_replace("/"," ",$text);
    $text = preg_replace("/[^A-Za-z0-9- ]/", '', $text);
    $text = str_replace("&","",$text);
    $text = str_replace("?","",$text);
    $text = str_replace(":","",$text);
    $text = str_replace(";","",$text);
    $text = str_replace(".","",$text);
    $text = str_replace("!","",$text);
    $text = preg_replace('/\s+/', ' ',$text);
    $text = strtolower($text);
    $text = trim($text);
    $text = str_replace(" ","-",$text);

    return $text."_".$id;
}

function clean_url($text)
{   
    $text = trim($text); 
    $text = strtolower($text);
    $text = str_replace("/"," ",$text);
    $text = preg_replace("/[^A-Za-z0-9- ]/", '', $text);
    $text = str_replace("&","",$text);
    $text = str_replace("?","",$text);
    $text = str_replace(":","",$text);
    $text = str_replace(";","",$text);
    $text = str_replace(".","",$text);
    $text = str_replace("!","",$text);
    $text = preg_replace('/\s+/', ' ',$text);
    $text = strtolower($text);
    $text = trim($text);
    $text = str_replace(" ","-",$text);
    return $text;
}

function lastDay($month = '', $year = '') {
    if (empty($month)) {
        $month = date('m');
    }
    if (empty($year)) {
        $year = date('Y');
    }
    $result = strtotime("{$year}-{$month}-01");
    $result = strtotime('-1 second', strtotime('+1 month', $result));
    return date('Y-m-d 23:59:59', $result);
}

function firstDay($month = '', $year = '')
{
    if (empty($month)) {
        $month = date('m');
    }
    if (empty($year)) {
        $year = date('Y');
    }
    $result = strtotime("{$year}-{$month}-01");
    return date('Y-m-d 00:00:00', $result);
}

function number_format_short( $n, $precision = 1 ) {
	if ($n < 900) {
		// 0 - 900
		$n_format = number_format($n, $precision);
		$suffix = '';
	} else if ($n < 900000) {
		// 0.9k-850k
		$n_format = number_format($n / 1000, $precision);
		$suffix = 'K';
	} else if ($n < 900000000) {
		// 0.9m-850m
		$n_format = number_format($n / 1000000, $precision);
		$suffix = 'M';
	} else if ($n < 900000000000) {
		// 0.9b-850b
		$n_format = number_format($n / 1000000000, $precision);
		$suffix = 'B';
	} else {
		// 0.9t+
		$n_format = number_format($n / 1000000000000, $precision);
		$suffix = 'T';
	}

  // Remove unecessary zeroes after decimal. "1.0" -> "1"; "1.00" -> "1"
  // Intentionally does not affect partials, eg "1.50" -> "1.50"
	if ( $precision > 0 ) {
		$dotzero = '.' . str_repeat( '0', $precision );
		$n_format = str_replace( $dotzero, '', $n_format );
	}

	return $n_format . $suffix;
}

function isBotDetected() {

    if ( !empty($_SERVER['HTTP_USER_AGENT']) and preg_match('/abacho|accona|AddThis|AdsBot|ahoy|AhrefsBot|AISearchBot|alexa|altavista|anthill|appie|applebot|arale|araneo|AraybOt|ariadne|arks|aspseek|ATN_Worldwide|Atomz|baiduspider|baidu|bbot|bingbot|bing|Bjaaland|BlackWidow|BotLink|bot|boxseabot|bspider|calif|CCBot|ChinaClaw|christcrawler|CMC\/0\.01|combine|confuzzledbot|contaxe|CoolBot|cosmos|crawler|crawlpaper|crawl|curl|cusco|cyberspyder|cydralspider|dataprovider|digger|DIIbot|DotBot|downloadexpress|DragonBot|DuckDuckBot|dwcp|EasouSpider|ebiness|ecollector|elfinbot|esculapio|ESI|esther|eStyle|Ezooms|facebookexternalhit|facebook|facebot|fastcrawler|FatBot|FDSE|FELIX IDE|fetch|fido|find|Firefly|fouineur|Freecrawl|froogle|gammaSpider|gazz|gcreep|geona|Getterrobo-Plus|get|girafabot|golem|googlebot|\-google|grabber|GrabNet|griffon|Gromit|gulliver|gulper|hambot|havIndex|hotwired|htdig|HTTrack|ia_archiver|iajabot|IDBot|Informant|InfoSeek|InfoSpiders|INGRID\/0\.1|inktomi|inspectorwww|Internet Cruiser Robot|irobot|Iron33|JBot|jcrawler|Jeeves|jobo|KDD\-Explorer|KIT\-Fireball|ko_yappo_robot|label\-grabber|larbin|legs|libwww-perl|linkedin|Linkidator|linkwalker|Lockon|logo_gif_crawler|Lycos|m2e|majesticsEO|marvin|mattie|mediafox|mediapartners|MerzScope|MindCrawler|MJ12bot|mod_pagespeed|moget|Motor|msnbot|muncher|muninn|MuscatFerret|MwdSearch|NationalDirectory|naverbot|NEC\-MeshExplorer|NetcraftSurveyAgent|NetScoop|NetSeer|newscan\-online|nil|none|Nutch|ObjectsSearch|Occam|openstat.ru\/Bot|packrat|pageboy|ParaSite|patric|pegasus|perlcrawler|phpdig|piltdownman|Pimptrain|pingdom|pinterest|pjspider|PlumtreeWebAccessor|PortalBSpider|psbot|rambler|Raven|RHCS|RixBot|roadrunner|Robbie|robi|RoboCrawl|robofox|Scooter|Scrubby|Search\-AU|searchprocess|search|SemrushBot|Senrigan|seznambot|Shagseeker|sharp\-info\-agent|sift|SimBot|Site Valet|SiteSucker|skymob|SLCrawler\/2\.0|slurp|snooper|solbot|speedy|spider_monkey|SpiderBot\/1\.0|spiderline|spider|suke|tach_bw|TechBOT|TechnoratiSnoop|templeton|teoma|titin|topiclink|twitterbot|twitter|UdmSearch|Ukonline|UnwindFetchor|URL_Spider_SQL|urlck|urlresolver|Valkyrie libwww\-perl|verticrawl|Victoria|void\-bot|Voyager|VWbot_K|wapspider|WebBandit\/1\.0|webcatcher|WebCopier|WebFindBot|WebLeacher|WebMechanic|WebMoose|webquest|webreaper|webspider|webs|WebWalker|WebZip|wget|whowhere|winona|wlm|WOLP|woriobot|WWWC|XGET|xing|yahoo|YandexBot|YandexMobileBot|yandex|yeti|Zeus/i', $_SERVER['HTTP_USER_AGENT'])
    ) {
        return true; // 'Above given bots detected'
    }

    return false;

} // End :: 

function count_($array) {
    return is_array($array) ? count($array) : 0;
}
