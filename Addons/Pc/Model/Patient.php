<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-07
 * Time: 9:49
 */

namespace Addons\Model;

//患者
class Userinfo
{
    public function updateUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $insert = server('Db')->autoExecute('patient', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function isExistUserInfoById($id)
    {
        if(!is_int($id))return false;
        $id = server('Db')->getOne("select `userId` from patient where `userId`=$id");
        return $id?true:false;
    }

    public function insertUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $array['userId'] = $userId;
        $insert = server('Db')->autoExecute('patient', $array, 'INSERT');
        return $insert?true:false;
    }

    public function submitUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(empty($userId)) return false;
        if($this->isExistUserInfoById($userId)){
            $check = $this->updateUserInfo($array,$userId);
        }else{
           $check = $this->insertUserInfo($array,$userId);
        }
        return $check;
    }

    //TODO:待指定获取用户信息的具体参数,目前调试阶段返回全部信息,
    //用户信息表，userId，也是唯一的
    public function getUsrInfoDetailByUserId($userId,$orgId)
    {
        $userId = intval($userId);
        $orgId = intval($orgId);
        $userInfoDetail = server('Db')->getRow("select * from patient where `userId`={$userId} and `orgId`={$orgId}");
        return $userInfoDetail?:[];
    }

    //分割患者信息,将用户信息划分为，基础，社会，生活方式等部分
    public function getCutUserInfo($userId,$orgId){
        $info = $this->getUsrInfoDetailByUserId($userId,$orgId);
        if(!empty($info)){
            return [
                'information' => [
                    'trueName'=>$info['trueName'],
                    'phone'=>$info['login'],
                    'gender'=>$info['gender'],
                    'age'=>$info['age'],
                    'address'=>$info['addr']
                ],
                'basic'=>[
                    'hipline'=>$info['hipline'],
                    'weight'=>$info['weight'],
                    'height'=>$info['height'],
                    'bmi'=>$info['bmi'],
                    'waist'=>$info['waist']
                ],
                'relevantSocial'=>[
                    'workEnv'=>$info['workEnv'],
                    'familyStates'=>$info['familyStates'],
                    'psychosis'=>$info['psychosis'],
                    'education'=>$info['education']
                ],
                'lifeStyle'=>[
                    'smoke'=>$info['smoke'],
                    'nervous'=>$info['nervous'],
                    'sportType'=>$info['sportType'],
                    'sportTime'=>$info['sportTime'],
                    'drinkwine'=>$info['drinkwine'],
                    'weightTrends'=>$info['weightTrends']
                ],
            ];
        }
        return[];
    }

    //获取患者列表,包含平均年龄，人数
    //由机构划分
    public function getUserList(array $userIdList)
    {
        $patientList = array();
        if(!empty($userIdList)){
            $list = implode(',',$userIdList);
            $sql = 'select `userId`, `trueName`,`age`,`gender` from patient where `userId`in'.'('.$list.')';
            $userList = server('Db')->getAll($sql,'userId');
            if($userList){
                //计算人数
                $num = count($userList);
                //计算平均年龄
                $total = 0;
                for($i=0;$i<$num;$i++){
                    $total+=$$userList[$i]['age'];
                }
                $avgAge = $total/$num;
                $patientList['number']=$num;
                $patientList['averageAge']=$avgAge;
                $patientList['patientList'] = $userList;
            }
        }
        return $patientList;
    }

}