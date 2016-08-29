<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-29
 * Time: 9:20
 */

namespace Addons\Controller;


class Token
{
    public function doTest()
    {
        view('',[
                'verify'=>md5('dsaffsd1cda067b175ab0e9e1fdfe8dcd7d71ff188104876121471276800')
            ]
        );
    }
}