# pf-abstracts-operate-log
## 描述
抽象——数据库业务日志记录

## 注意事项
- 该小部件基于"qingbing/php-database"，"qingbing/php-web"，"qingbing/pf-abstracts-web-user"开发
- "qingbing/php-web" 提供项目入口
- "qingbing/php-database" 提供数据库支持
- "qingbing/pf-abstracts-web-user" 提供登录用户支持
- 该部件开发一个抽象类"\Abstracts\OperateLog"
    - user ：登录的用户组件， 建议在子类的init()方法中赋值指定
    - tableName ：数据表名，需要在子类中自行指定

## 使用方法
### 1. 实例化
```php
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
```
### 2. 手动调用
```php
\Test\TestOperateLog::getInstance()->operate(true, 'type', 'message', 'key', ['content' => 'xx']);
```

## ====== 异常代码集合 ======

异常代码格式：1032 - XXX - XX （组件编号 - 文件编号 - 代码内异常）
```
 - 无
```