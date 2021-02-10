<?php
namespace Tom\PushApi;
Class PushApi
{
    protected $url='http://data.zz.baidu.com/urls';
    protected $site='';
    protected $token='';
    protected $api='';

    public static function handler($site,$token,$urls)
    {
        $self=new self();
        $self->token=$token;
        $self->site=$site;
        $self->api=$self->url."?site=".$site."&token=".$token;
        return $self->curl($urls);
    }

    protected function curl(array $urls)
    {
        $ch = curl_init();
        $options =  array(
            CURLOPT_URL => $this->api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => implode("\n", $urls),
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain'),
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        return json_decode($result,true);
    }
}