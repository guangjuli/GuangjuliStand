<?php
namespace Application\Model;


class Gate implements  \Grace\Base\ModelInterface
{
    //Model('Gate')->isAddons();
    /*
    |--------------------------------------------------------------------------
    | 判断是否addons
    |--------------------------------------------------------------------------
    */
    public function isAddons()
    {
        return Model('RouterAdd')->isAddons();      //是否addons
    }

    public function depend()
    {
        return [

        ];
    }



}


