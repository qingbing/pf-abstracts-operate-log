<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-02-13
 * Version      :   1.0
 */

namespace Test;


use Abstracts\OperateLog;

class TestOperateLog extends OperateLog
{
    /* @var string 数据表名，todo 需要在子类中自行指定 */
    protected $tableName = 'log_operate_template';

    public function init()
    {
        parent::init();
        // todo,如果有登录用户，建议在该方法中赋值指定
//        $this->user = '';
    }
}