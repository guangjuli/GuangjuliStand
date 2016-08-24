<?php
namespace Application\Model;

class ApiLog implements  \Grace\Base\ModelInterface
{


    public function sniffer($ajax = [])
    {
        $res = [
            'api'    => trim(req('Env')['path'],'/'),
            'code'   => $ajax['code'],
            'msg'    => $ajax['msg'],
            'data'   => json_encode($ajax['data']),
            '_GET'    => json_encode(req('Get')),
            '_POST'   => json_encode(req('Post')),
            '_FILE'   => json_encode($_FILES),
        ];
        //insert 数据
        $res = saddslashes($res);
        app('db')->autoExecute('api_log',$res,'INSERT');

    }

    public function depend()
    {
        return [
            'Server::Req'
        ];
    }



}

