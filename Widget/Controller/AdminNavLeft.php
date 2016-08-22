<?php
namespace Widget\Controller;


class AdminNavLeft extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {
        return WidgetView('',[
            'menuleft' => Model('menu')->menuMainsub(),          //所有
        ]);
    }


}
