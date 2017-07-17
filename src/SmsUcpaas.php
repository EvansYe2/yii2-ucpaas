<?php
/**
 * Created by PhpStorm.
 * User: Evans
 * Date: 2017/7/14
 * Time: 13:52
 */

namespace evans\ucpaas;
use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

class SmsUcpaas extends Component
{
    public $accountsid;//Account Sid
    public $token;//Auth Token
    public $appId;//应用id
    public $templateId;//模板ID
	public $verifyCode;//语音验证码

    //初始化参数判断
    public function init(){
        if ($this->accountsid === null) {
            throw new InvalidConfigException('accountsid 未设置');
        } elseif ($this->token === null) {
            throw new InvalidConfigException('token未设置');
        }elseif ($this->appId === null) {
            throw new InvalidConfigException('appId未设置');
        }
    }


    /**
     * 短信发送
     * @param $to
     * @param null $param
     */
    public function sendSMS($to,$param=null){
        $options['accountsid'] = $this->accountsid;
        $options['token'] = $this->token;
        $appId = $this->appId;
        $templateId = $this->templateId;
        //初始化 $options必填
        if(!empty($to)){
            $ucpass = new Ucpaas($options);
            $send = $ucpass->templateSMS($appId, $to, $templateId, $param);
            return json_decode($send);
        }
    }
	
	/**
     * @param string $type
     * @return mixed|string
     * @throws Exception
     */
    public function sendVoiceCode($to,$type = 'json'){

        $options['accountsid'] = $this->accountsid;
        $options['token'] = $this->token;
        $appId = $this->appId;
        $verifyCode = $this->verifyCode;
        //初始化 $options必填
        if(!empty($to)){
            $ucpass = new Ucpaas($options);
            $send = $ucpass->voiceCode($appId,$verifyCode,$to,$type);
            return json_decode($send);
        }
    }
}