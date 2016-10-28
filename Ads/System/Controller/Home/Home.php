<?php
namespace Ads\System\Controller\Home;

class Home extends BaseController {

    use \Ads\Traits\Data;
    use \Ads\Traits\Arr;
    use \Ads\Traits\Str;
    use \Ads\Traits\AjaxReturnHtml;
    use \Ads\Traits\PostRequest;

    public function __construct(){
        parent::__construct();
    }

}
