<?php
namespace Widget\Controller;


class AdminFooter extends BaseController {

    public function __construct(){
        parent::__construct();
    }

    function __invoke()
    {
        return WidgetView();
    }


}
