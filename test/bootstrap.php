<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2018-11-26
 * Version      :   1.0
 */
require("../vendor/autoload.php");

// 执行应用命令
PF::createApplication('\Web\Application');
\Test\TestOperateLog::getInstance()->operate(true, 'type', 'message', 'key', ['content' => 'xx']);