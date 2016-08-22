<?php
namespace Widget\Controller;


class ApiSim extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {

        return WidgetView('', [
        ]);


    }


}
