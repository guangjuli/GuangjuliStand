<?php
namespace Application\Model;

class Test implements  \Grace\Base\ModelInterface
{

    /*
    |--------------------------------------------------------------------------
    | 执行
    |--------------------------------------------------------------------------
    */
    public static function Run()
    {
        echo 123123123;
    }

    public function depend()
    {
        return [
            "Model::Gate"
        ];
    }



}


