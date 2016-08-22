<?php
namespace Widget\Controller;


class ApiView extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {

        return WidgetView('', [
        ]);


    }


}
