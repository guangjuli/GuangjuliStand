<?php
namespace Addons\Controller;


class Set extends BaseController
{

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * 后台首页
     */
    public function doIndex()
    {
        view();
    }

    public function doGui_Post()
    {
        $res = [
            'Breadcrumb' => intval(req('Post')['Breadcrumb']),
            'Tip' => intval(req('Post')['Tip']),
            'Footer' => intval(req('Post')['Footer']),
        ];
        //保存
        application('data')->set('AdminGuiConfig', $res);
        R('/Set/gui');
    }

    public function doGui()
    {
        view('', application('data')->get('AdminGuiConfig'));
    }


}
