<?php
return array(
	//'配置项'=>'配置值'
    'TMPL_PARSE_STRING' =>  array(
        '__PUBLIC__' => __ROOT__.'/public/admin',
        '__COMMON__'=>__ROOT__.'/public/common',
        /*Memcache*/
        'DATA_CACHE_TYPE' => 'Memcache',
        'MEMCACHE_HOST'   => 'tcp://127.0.0.1:11211',
        'DATA_CACHE_TIME' => '3600',
    ),
    'URL_MODEL'=>'0',
    'DEFAULT_ADMIN'=> 'admin',

    'QINIU_BUCKET' => '',
    'QINIU_SECRET' => '',
    'QINIU_ACCESS' => '',
);