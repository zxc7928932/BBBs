<?php
return array(
	'DB_TYPE'               => 'mysql',     // 数据库类型
    'DB_HOST'               => 'localhost', // 服务器地址
    'DB_NAME'               => 'test',          // 数据库名
    'DB_USER'               => 'syslab',      // 用户名
    'DB_PWD'                => 'syslab',          // 密码
    'DB_PORT'               => '',        // 端口
    'DB_PREFIX'             => '',    // 数据库表前缀
    'TMPL_PARSE_STRING'  =>array(
     '__PUBLIC__' => '/bookfun/Public', // 更改默认的__PUBLIC__ 替换规则
		),
    'DEFAULT_MODULE'        => 'Login', // 默认模块名称
    'DEFAULT_ACTION'        => 'index', // 默认操作名称
    'SHOW_PAGE_TRACE' =>false,
);
?>