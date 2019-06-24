
CREATE TABLE IF NOT EXISTS `test_log_operate` (
 `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '自增ID',
 `type` VARCHAR (32) NOT NULL DEFAULT '' COMMENT '操作类型-用字符串描述',
 `keyword` VARCHAR (100) NOT NULL DEFAULT '' COMMENT '关键字，用于后期筛选',
 `message` VARCHAR (255) NOT NULL DEFAULT '' COMMENT '操作消息',
 `data` text COMMENT '操作的具体内容',
 `is_success` tinyint(1) NOT NULL DEFAULT '1' COMMENT '是否执行成功',
 `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户ID',
 `username` varchar(50) NOT NULL DEFAULT '' COMMENT '用户名',
 `ip` varchar(15) NOT NULL DEFAULT '' COMMENT '登录IP',
 `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
 PRIMARY KEY `pk_id`(`id`),
 KEY `idx_type`(`type`),
 KEY `idx_uid`(`uid`),
 KEY `idx_create_at`(`created_at`),
 KEY `idx_keyword`(`keyword`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='test 操作日志表';
