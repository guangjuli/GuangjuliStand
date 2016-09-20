<?php
namespace Ads\Queue\Controller\Html;

class Html  {

    use \App\Traits\AjaxReturnHtml;

    public function __construct(){
    }

    public function doIndex()
    {
    }

    /**
     * @param int $channel
     * 任务频道
     */
    public function doChannel($data)
    {
        return $data;
    }

    public function doTimerePost()
    {
/*
channel : 1,        //任务频道
begin   : 1,        //开始标记
pressstop : 0,
pressid : 0,
width   : 0,
num     : 0,
total   : 0,
msg     : '',
*/

        //==============================================
        //执行
        $data = $this->doChannel(req('Post'));

        //==============================================
        //$data['pressstop'] = 1;
        $data['msg'] = "执行完成";
        $data['delay'] = 1000;
        $data['num']++;
        $data['width'] = '60%';

        echo json_encode($data);
        exit;
    }

    public function doTimere()
    {
        return  server('Smarty')->ads('queue/html/Timere')->fetch('',[
        ]);
    }

    public function doList(){
        return  server('Smarty')->ads('queue/html/list')->fetch('',[
        ]);
    }



}
