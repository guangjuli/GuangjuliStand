<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-10-13
 * Time: 11:28
 */

namespace Addons\Model;


class Question
{
    public function insertQuestion($req)
    {
        $req = saddslashes($req);
        $insert = ['nervous'=>$req['nervous'],'drinkwine'=>$req['drinkwine'],'userId'=>$req['userId']];
        $check = server('Db')->autoExecute('question', $insert, 'INSERT');
        return $check?true:false;
    }

    public function updateQuestion($req)
    {
        $req = saddslashes($req);
        $userId = $req['userId'];
        $insert = ['nervous'=>$req['nervous'],'drinkwine'=>$req['drinkwine'],'userId'=>$req['userId']];
        $check = server('Db')->autoExecute('question', $insert, 'UPDATE',"userId={$userId}");
        return $check?true:false;
    }
}