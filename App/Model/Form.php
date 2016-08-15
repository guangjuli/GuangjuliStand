<?php

namespace App\Model;

class Form implements  \Grace\Base\ModelInterface
{

    public function __construct()
    {
    }

    public function run()
    {
       echo 'model : form modl run';
    }

    public function depend()
    {
        return [
            "Model::RouterAdd"
        ];
    }

}


