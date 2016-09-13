<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-08-29
 * Time: 9:20
 */

namespace Addons\Controller;


class Bloodpress
{
    public function doTest()
    {
        view('',[
            'v'=>'["type": "1","createDay": "20160812","time": "1471276800","shrink": "102.5","diastole": "19.6","bpm": "103.4","day": "0"]'
        ]);
    }
}