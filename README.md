# 百度站长推送Api

## 示例
```bash
    composer requier 19js/push-api
```
```php
    require_once 'vendor/autoload.php';
    $site="要推送的站点";
    $token="百度站长工具里面的token";
    $urls=[];//要推送的网址数组
    $res=\Tom\PushApi\PushApi::handler($site,$token,$urls);
    var_dump($res);
```