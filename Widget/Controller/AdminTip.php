<?php
namespace Widget\Controller;


class AdminTip extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {

        $html = '';
        if(application('data')->get('AdminGuiConfig')['Tip']) {
            $html = WidgetView('', [
            ]);
        }
        return $html;

    }


}
