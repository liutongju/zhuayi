<?php
/**
 * admin_menu.php     ZCMS Baibu/Google��ͼ
 * 
 * @copyright    (C) 2005 - 2010  ZCMS
 * @licenes      http://www.zcms.cc
 * @lastmodify   2010-11-20
 * @author       zhuayi  
 * @QQ			 2179942
 */

//-------��֤��¼
verify_admin('admin_username');
//-------����ҳ���ڲ��˵� 
$tips = '<br><b>Sitemaps</b><br>
Sitemaps ����ּ��ʹ�� Feed �ļ� sitemap.xml ֪ͨ Google��Yahoo! �Լ� Microsoft �� <br>Crawler(����)��վ����Щ�ļ���Ҫ��������Щ�ļ�������޶�ʱ�䡢����Ƶ�ȡ��ļ�λ�á������������Ȩ����Щ��Ϣ���������ǽ���������Χ����������Ϊϰ�ߡ���ϸ��Ϣ��鿴 sitemaps.org ��վ�ϵ�˵����<br>
ͨ��Sitemaps�������Ի�ã� <br>
1�������ץȡ��Χ�����µ�������� �C ���������ҵ�����������ҳ��<br>
2����Ϊ���ܵ�ץȡ �C ��Ϊ���ǿ��Ե�֪����ҳ�������޸�ʱ�����ҳ�ĸ���Ƶ�ʡ�<br>
3����ϸ�ı��� �C ��ϸ˵�� Google ��ν����ѵĵ��ָ��������վ�� Googlebot ��ο���������ҳ��<br>
<b>���������ſ���Э�飺</b> <br>
1�����������ſ���Э�顷�ǰٶ����������ƶ���������������Դ��¼��׼����վ�ɽ�����������������������ѭ�˿���Э���XML��ʽ����ҳ��������ԭ�е����ŷ�����ʽ������������������ ZCMS���Զ�������վ��Sitemaps������������Ҫ��google����baidu�ύSitemaps�ķ��ʵ�ַ��<br>
������վ��Sitemaps ���ʵ�ַΪ��sitemaps.xml<br>
ZCMS���Զ�������վ��<<���������ſ���Э��>>������������Ҫ��baidu�ύ���ʵ�ַ��<br>
������վ��Sitemaps ���ʵ�ַΪ��baidunews.xml<br>
�������Google Sitemaps����Ϣ��https://www.google.com/webmasters/sitemaps/login?hl=zh_CN<br>
�������<<���������ſ���Э��>>����Ϣ��http://news.baidu.com/newsop.html#kg<br>';

//-------����ҳ���ڲ��˵� 
$menu = array(
			'0'=>array('���ɵ�ͼ','index'),
			'1'=>array('��������Դ','edit&height=200','ajax'),
			);
include_once ZCMS_ROOT.'/zcms/sitemaps/include/sitemaps_config.php';


?>