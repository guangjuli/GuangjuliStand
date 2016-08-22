<?php
namespace Widget\Controller;


class AdminNav extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {
        return WidgetView('',[
            'menuhead' => Model('menu')->menuMain(),          //所有
        ]);
    }


}
