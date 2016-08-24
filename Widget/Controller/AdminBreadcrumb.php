<?php
namespace Widget\Controller;


class AdminBreadcrumb extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {
        $html = '';
        if(application('data')->get('AdminGuiConfig')['Breadcrumb']){
            $adminBreadcrumb = Model('menu')->adminBreadcrumb();
            $html = WidgetView('',[
                'adminBreadcrumb' => $adminBreadcrumb,          //所有
            ]);
        }
        return $html;
    }


}

