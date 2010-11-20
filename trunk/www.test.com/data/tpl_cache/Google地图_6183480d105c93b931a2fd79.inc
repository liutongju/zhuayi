<?php
if(!isset($GLOBALS['_vars'])) $GLOBALS['_vars'] = array(); 
$fields = array();
?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
		<url>
			<loc><?php echo $weburl; ?></loc>
			<lastmod><?php echo date("Y-m-d"); ?></lastmod>
			<changefreq>daily</changefreq>
			<priority>1.0</priority>

		</url>
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
		<url>
			<loc><?php echo $fields['url']; ?></loc>
			<lastmod><?php echo dtime($fields['dtime']); ?></lastmod>
			<changefreq><?php echo $_REQUEST['content_changefreq']; ?></changefreq>
			<priority><?php echo $_REQUEST['content_priority']; ?></priority>
		</url>
<?php
}
}
?>
	</urlset>