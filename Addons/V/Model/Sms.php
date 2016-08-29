<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-22
 * Time: 11:29
 */

namespace Addons\Model;


use Grace\Base\ModelInterface;

//SMS 短信息
class Sms implements ModelInterface
{
    private $config = array();
    private $apikey = '';     //dingdongcloud用户密匙
    private $messageContent = '';
    private $curlopt_url = ''; //请求dingdongcloud接口
    public function depend()
    {
        // TODO: Implement depend() method.
    }

    public function __construct($configHandle)
    {
        //读取短信配置信息  apikey   ,messageContent
        $this->config = server()->Config('V')['SMS'];
        $this->apikey = $this->config['apikey'];
        $this->messageContent = $this->config[$configHandle]['messageContent'];
        $this->curlopt_url = $this->config[$configHandle]['curlopt_url'];
    }

    /**
     * 发送短信
     * @return int
     */
    public function sendMessage($mobile)
    {
        $array_data = $this->useThreeApiSend($mobile);
        return $array_data['code']==1?$array_data['authCode']:null;
    }

    //验证码
    private function useThreeApiSend($mobile){
        $code = rand(100000,999999);
        $content = $this->messageContent.$code;
        $data=array('content'=>urlencode($content),'apikey'=>$this->apikey,'mobile'=>$mobile);
        $ch = curl_init();
        /* 设置验证方式 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept:text/plain;charset=utf-8', 'Content-Type:application/x-www-form-urlencoded','charset=utf-8'));
        /* 设置返回结果为流 */
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        /* 设置超时时间*/
        curl_setopt($ch, CURLOPT_TIMEOUT, 10);
        /* 设置通信方式 */
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt ($ch, CURLOPT_URL, $this->curlopt_url);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        $json_data = curl_exec($ch);
        $array_data = json_decode($json_data,true);
        $array_data['authCode']=$code;
        return $array_data;
    }


//dingdongcloud返回值
/*-1 	用户账户名与密码不匹配
0 	用户短信发送失败
1 	用户短信发送成功，或查询数据成功
2 	用户余额不足
3 	用户扣费失败
4 	用户输入账户名错误，无效号码
5 	用户输入短信内容错误，内容为空或者格式错误非utf-8编码
6 	用户无相关权限,开通请联系管理员（一般情况下未开通营销权限）
7 	ip错误(账户设置的ip白名单中不包含该ip地址)
8 	同一号码提交次数过多(半小时超过5条)
9 	签名为空(必须带有【】格式的签名)
10 	营销内容错误(请添加'退订回T'作为结尾)
11 	签名为空(签名未审核,请联系客服)
12 	maxSize值不正确(请保证在1-1024之间)
13 	内容匹配模板失败,请先创建验证码模板
14 	语音验证码内容错误(只能是4-6位数字)
15 	语音验证码内容错误只能是4-6位数字(号码中含有错误号码,请确认后提交)
16 	模板中未含有【#验证码#】
17 	该签名已经存在,请不要重复添加
18 	短信内容为空
90 	参数错误(请确认参数名是否正确)
99 	系统内部异常(请联系管理员)*/


}