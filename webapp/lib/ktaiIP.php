<?php

// 許可するIP帯域のリスト
// 'IP Adress/BitMask' の形式で入力してください
$GLOBALS['_OPENPNE_KTAI_IP_LIST'] = array(

// DoCoMo (2008/09/17更新)
// http://www.nttdocomo.co.jp/service/imode/make/content/ip/index.html
'210.153.84.0/24',
'210.136.161.0/24',
'210.153.86.0/24',
'124.146.174.0/24',
'124.146.175.0/24',

// au (2010/01/19更新)
// http://www.au.kddi.com/ezfactory/tec/spec/ezsava_ip.html
'210.230.128.224/28',
'121.111.227.160/27',
'61.117.1.0/28',
'219.108.158.0/27',
'219.125.146.0/28',
'61.117.2.32/29',
'61.117.2.40/29',
'219.108.158.40/29',
'219.125.148.0/25',
'222.5.63.0/25',
'222.5.63.128/25',
'222.5.62.128/25',
'59.135.38.128/25',
'219.108.157.0/25',
'219.125.145.0/25',
'121.111.231.0/25',
'121.111.227.0/25',
'118.152.214.192/26',
'118.159.131.0/25',
'118.159.133.0/25',
'118.159.132.160/27',
'118.159.133.192/26',

// SoftBank (2009/8/10更新)
// http://creation.mb.softbank.jp/web/web_ip.html
'123.108.236.0/24',
'123.108.237.0/27',
'202.179.204.0/24',
'202.253.96.224/27',
'210.146.7.192/26',
'210.146.60.192/26',
'210.151.9.128/26',
'210.175.1.128/25',
'211.8.159.128/25',

// WILLCOM (2009/4/2更新)
// http://www.willcom-inc.com/ja/service/contents_service/club_air_edge/for_phone/ip/
'61.198.128.0/24',    '61.198.129.0/24',    '61.198.130.0/24',    '61.198.131.0/24',
'61.198.132.0/24',    '61.198.133.0/24',    '61.198.134.0/24',    '61.198.135.0/24',
'61.198.136.0/24',    '61.198.137.0/24',    '61.198.138.100/32',  '61.198.138.101/32',
'61.198.138.102/32',  '61.198.138.103/32',  '61.198.139.0/29',    '61.198.139.128/27',
'61.198.139.160/28',  '61.198.140.0/24',    '61.198.141.0/24',    '61.198.142.0/24',
'61.198.143.0/24',    '61.198.160.0/24',    '61.198.161.0/24',    '61.198.162.0/24',
'61.198.163.0/24',    '61.198.164.0/24',    '61.198.165.0/24',    '61.198.166.0/24',
'61.198.168.0/24',    '61.198.169.0/24',    '61.198.170.0/24',    '61.198.171.0/24',
'61.198.172.0/24',    '61.198.173.0/24',    '61.198.174.0/24',    '61.198.175.0/24',
'61.198.248.0/24',    '61.198.249.0/24',    '61.198.250.0/24',    '61.198.251.0/24',
'61.198.252.0/24',    '61.198.253.0/24',    '61.198.254.0/24',    '61.198.255.0/24',
'61.204.0.0/24',      '61.204.2.0/24',      '61.204.3.0/25',      '61.204.3.128/25',
'61.204.4.0/24',      '61.204.5.0/24',      '61.204.6.0/25',      '61.204.6.128/25',
'61.204.7.0/25',      '61.204.92.0/24',     '61.204.93.0/24',     '61.204.94.0/24',
'61.204.95.0/24',     '125.28.0.0/24',      '125.28.1.0/24',      '125.28.11.0/24',
'125.28.12.0/24',     '125.28.13.0/24',     '125.28.14.0/24',     '125.28.15.0/24',
'125.28.16.0/24',     '125.28.17.0/24',     '125.28.2.0/24',      '125.28.3.0/24',
'125.28.4.0/24',      '125.28.5.0/24',      '125.28.6.0/24',      '125.28.7.0/24',
'125.28.8.0/24',      '210.168.246.0/24',   '210.168.247.0/24',   '210.169.92.0/24',
'210.169.93.0/24',    '210.169.94.0/24',    '210.169.95.0/24',    '210.169.96.0/24',
'210.169.97.0/24',    '210.169.98.0/24',    '210.169.99.0/24',    '211.126.192.128/25',
'211.18.232.0/24',    '211.18.233.0/24',    '211.18.234.0/24',    '211.18.235.0/24',
'211.18.236.0/24',    '211.18.237.0/24',    '211.18.238.0/24',    '211.18.239.0/24',
'219.108.10.0/24',    '219.108.11.0/24',    '219.108.12.0/24',    '219.108.13.0/24',
'219.108.14.0/24',    '219.108.15.0/24',    '219.108.4.0/24',     '219.108.5.0/24',
'219.108.6.0/24',     '219.108.7.0/24',     '219.108.8.0/24',     '219.108.9.0/24',
'221.119.0.0/24',     '221.119.1.0/24',     '221.119.2.0/24',     '221.119.3.0/24',
'221.119.4.0/24',     '221.119.5.0/24',     '221.119.6.0/24',     '221.119.7.0/24',
'221.119.8.0/24',     '221.119.9.0/24',

// EMOBILE (2008/09/05更新)
// http://developer.emnet.ne.jp/ipaddress.html
'117.55.1.224/27',
);

?>
