<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><document>
<webSite><?php echo $weburl; ?></webSite>
<webMaster>zhuayi@zcms.cc</webMaster>
<updatePeri><?php echo $updatePeri; ?></updatePeri>
<?php
$atts = array();
$atts['tagname'] = 'article_list';
$atts['page'] = $_REQUEST['page'];
$atts['limit'] = $_REQUEST['num'];
$blockValue = MakePublicTag($atts,$this->refObj,$fields); 
if(is_array($blockValue) && count($blockValue) > 0){
foreach( $blockValue as $key=>$fields )
{
 	if (substr($fields['url'],0,1) == '/')
	{
		$fields['url'] = $weburl.$fields['url'];
	}
?>
<item>
	<title><?php echo $fields['title']; ?></title>
	<link><?php echo $fields['url']; ?></link>
	<description><?php echo htmlspecialchars($fields['abstract']); ?></description>
	<text><?php echo htmlspecialchars(strip_tags($fields['body'])); ?></text>
	<image><?php echo $fields['litpic']; ?></image>
	<keywords><?php echo $fields['tags']; ?></keywords>
	<category></category>
	<author></author>
	<source><?php echo $fields['source']; ?></source>
	<pubDate><?php echo dtime($fields['dtime']); ?></pubDate>
</item>
<?php
}
}
?>
</document>