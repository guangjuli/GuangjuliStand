<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-07
 * Time: 9:49
 */

namespace Addons\Model;


class Userinfo
{
    public function updateUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $insert = server('Db')->autoExecute('user_info', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function isExistUserInfoById($id)
    {
        if(!is_int($id))return false;
        $id = server('Db')->getOne("select `userId` from user_info where `userId`=$id");
        return $id?true:false;
    }

    public function insertUserInfo(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $array['userId'] = $userId;
        $insert = server('Db')->autoExecute('user_info', $array, 'INSERT');
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
    public function getUsrInfoDetailByUserId($userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        $userInfoDetail = server('Db')->getRow("select * from user_info where `userId`={$userId}");
        return $userInfoDetail?:[];
    }

    //分割用户信息,将用户信息划分为，基础，社会，生活方式等部分
    public function getCutUserInfo($userId){
        $info = $this->getUsrInfoDetailByUserId($userId);
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
    //relation是user_relationship的字段值由id串组成，用‘，’分隔开
    public function getUserListByUserId($relation)
    {
        //并未对$relation进行过多验证，非用户输入项
        $patientList = array();
        if(!empty($relation)){
            $sql = 'select `userId`, `trueName`,`age`,`gender` from user_info where `userId`in'.'('.$relation.')';
            $list = server('Db')->getAll($sql,'userId');
            if($list){
                //计算人数
                $num = count($list);
                //计算平均年龄
                $total = 0;
                for($i=0;$i<$num;$i++){
                  $total+=$list[$i]['age'];
                }
                $avgAge = $total/$num;
                $patientList['number']=$num;
                $patientList['averageAge']=$avgAge;
                $patientList['patientList'] = $list;
            }
        }
        return $patientList;
    }






}