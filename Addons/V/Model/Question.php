<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-23
 * Time: 16:43
 */

namespace Addons\Model;

use Grace\Base\ModelInterface;
class Question implements ModelInterface
{
    public function depend()
    {
        return[

        ];
    }

    public function insertQuestion(Array $array)
    {
        $insert = server('Db')->autoExecute('question', $array, 'INSERT');
        return $insert?true:false;
    }

    public function updateQuestion(Array $array,$userId)
    {
        $userId = intval($userId);
        $insert = server('Db')->autoExecute('question', $array, 'UPDATE',"userId='{$userId}'");
        return $insert?true:false;
    }

    public function isExistQuestion($userId)
    {
        $userId = intval($userId);
        $questionId = server('Db')->getOne("select questionId from question where userId='{$userId}'");
        return $questionId?true:false;
    }
    public function questionSubmit(Array $array,$userId)
    {
        $check = false;
        if($this->isExistQuestion($userId)){
            if($this->updateQuestion($array,$userId))$check=true;
        }else{
            if($this->insertQuestion($array))$check=true;
        }
        return $check;
    }
}