# yii2-ucpaas

Yii2 SMS extension （云之讯短信扩展）


## Installation

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

To install, either run

```
$ php composer.phar require evans/yii2-ucpaas
```

or add

```
"evans/yii2-ucpaas": "*"
```

to the ```require``` section of your `composer.json` file.

## Usage

```php
return [
    'components' => [
        'tongzhi' =>[
            'class' => 'evans\ucpaas\SmsUcpaas',
            'accountsid' => '这里填写您的Account Sid',
            'token' => '这里填写您的Auth Token',
            'appId' => '这里请填写您的应用id',
            'templateId' => '填写短信模板id',
        ],
		
		'yanzhma' =>[
            'class' => 'evans\ucpaas\SmsUcpaas',
            'accountsid' => '这里填写您的Account Sid',
            'token' => '这里填写您的Auth Token',
            'appId' => '这里请填写您的应用id',
            'templateId' => '填写短信模板id',
        ],
    ],
];
```
支持多配置


```php
调用方式：
$sms = Yii::$app->tongzhi;
$param = "Evans,123123,jiangsu,china";//短信发送内容，以逗号分隔，具体多少个参数取决于短信模板里面
var_dump($sms->sendSMS('15298745787',$param));//调用短信发送
```

## License

**yii2-ucpaas** is released under the MIT License.
