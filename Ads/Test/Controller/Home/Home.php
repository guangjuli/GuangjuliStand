<?php
namespace Ads\Test\Controller\Home;

class Home extends BaseController {

    use \Ads\Traits\Data;
    use \Ads\Traits\Arr;
    use \Ads\Traits\Str;
    use \Ads\Traits\AjaxReturnHtml;
    use \Ads\Traits\PostRequest;

    public function __construct(){
        parent::__construct();
    }

    public function doIndex(){
$res =       $this->cut('56','56','123456789123456789');
D($res);
        return 123;
    }


    public function docutcutof(){
        $res =       $this->cut('56','56','123456789123456789');
        D($res);
        $res =       $this->cutof('56','56','123456789123456789');
        D($res);
        return 123;
    }

    public function dodemo($params = '')
    {

        $res = "ads:test/home/demo"."\n";
        $res .= "params:".$params;
        return $res;

    }
}
