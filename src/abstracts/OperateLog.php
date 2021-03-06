<?php
/**
 * Link         :   http://www.phpcorner.net
 * User         :   qingbing<780042175@qq.com>
 * Date         :   2019-02-13
 * Version      :   1.0
 */

namespace Abstracts;


abstract class OperateLog extends SingleTon
{
    /* @var WebUser 登录的用户组件， todo 建议在子类的init()方法中赋值指定 */
    protected $user;
    /* @var string 数据表名，todo 需要在子类中自行指定 */
    protected $tableName;
    /* @var \Components\Db */
    protected $db;
    /* @var \Components\HttpRequest */
    protected $request;

    /**
     * 必要的初始化操作
     * @throws \Helper\Exception
     */
    protected function init()
    {
        $this->db = \PF::app()->getComponent('database');
        $this->request = \Components\Request::httpRequest();
    }

    /**
     * 记录操作日志
     * @param boolean $isSuccess
     * @param string $type
     * @param string $message
     * @param string $keyword
     * @param mixed $data
     * @param string|null $uid
     * @param string|null $username
     * @return int
     * @throws \Exception
     */
    public function operate($isSuccess, $type, $message, $keyword = '', $data = '', $uid = null, $username = null)
    {
        $data = [
            'type' => $type,
            'is_success' => $isSuccess ? 1 : 0,
            'message' => $message,
            'keyword' => $keyword,
            'data' => json_encode($data),
            'op_ip' => $this->request->getUserHostAddress(),
        ];
        if (null !== $uid) {
            $data['op_uid'] = $uid;
            $data['op_username'] = $username;
        } else if ($this->user instanceof WebUser && $this->user->getUid() && $this->user->getUsername()) {
            $data['op_uid'] = $this->user->getUid();
            $data['op_username'] = $this->user->getUsername();
        }
        return $this->db->insert($this->tableName, $data);
    }
}