<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-07
 * Time: 9:49
 */

namespace Addons\Model;

//患者
class Patient
{
    public function updatePatient(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $insert = server('Db')->autoExecute('patient', $array, 'UPDATE',"`userId`=$userId");
        return $insert?true:false;
    }

    public function isExistUserInfoById($id)
    {
        $id = intval($id);
        $id = server('Db')->getOne("select `userId` from patient where `userId`=$id");
        return $id?true:false;
    }

    public function insertPatient(Array $array,$userId=null)
    {
        $userId = $userId?:bus('tokenInfo')['userId'];
        if(!$userId) return false;
        $array['userId'] = $userId;
        $insert = server('Db')->autoExecute('patient', $array, 'INSERT');
        return $insert?true:false;
    }

    public function insertInvalidPatient(Array $array)
    {
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

    //用户信息表，userId，也是唯一的
    public function getUsrInfoDetailByUserId($userId)
    {
        $userId = intval($userId);
        $sql = "select u.userId, login,trueName,gender,age,addr,hipline,weight,height,bmi,waist,smoke,nervous,
        drinkWine,SBP,DBP,bpm from user u, patient p ,question q where u.userId={$userId} and u.userId=p.userId and p.userId=q.userId and u.active=1";
        $detail = server('Db')->getRow($sql);
        if($detail){
            //数据格式转换
            foreach($detail as $k=>$v){
                if($k!='login'&&$k!='trueName'&&$k!='addr'&&$k!='sportType')$detail[$k]=intval($v);
            }
        }
        return $detail?:[];
    }

    //获取患者所有的信息
    private function getPatientInfo($userId){
        $userId = intval($userId);
        $sql = "select u.userId, login,trueName,gender,age,addr,hipline,weight,height,bmi,waist,smoke,nervous,sportType
                ,sportTime,drinkWine,SBP,DBP,bpm,weightTrends from user u, patient p ,question q where u.userId={$userId} and u.userId=p.userId and p.userId=q.userId and u.active=1";
        $detail = server('Db')->getRow($sql);
        return $detail?:[];
    }
    //分割患者信息,将用户信息划分为，基础，社会，生活方式等部分
    public function getCutUserInfo($userId){
        $info = $this->getPatientInfo($userId);
        if(!empty($info)){
            return [
                'information' => [
                    'trueName'=>$info['trueName'],
                    'phone'=>$info['login'],
                    'gender'=>intval($info['gender']),
                    'age'=>intval($info['age']),
                    'addr'=>$info['addr']
                ],
                'basic'=>[
                    'hipline'=>intval($info['hipline']),
                    'weight'=>intval($info['weight']),
                    'height'=>intval($info['height']),
                    'bmi'=>intval($info['bmi']),
                    'waist'=>intval($info['waist'])
                ],
                'relevantSocial'=>[
                    'workEnv'=>$info['workEnv'],
                    'familyStates'=>$info['familyStates'],
                    'psychosis'=>$info['psychosis'],
                    'education'=>$info['education']
                ],
                'lifeStyle'=>[
                    'smoke'=>intval($info['smoke']),
                    'nervous'=>intval($info['nervous']),
                    'sportType'=>$info['sportType'],
                    'sportTime'=>intval($info['sportTime']),
                    'drinkWine'=>intval($info['drinkWine']),
                    'weightTrends'=>$info['weightTrends']
                ],
                'family'=>[
                    'SBP'=>intval($info['SBP']),
                    'DBP'=>intval($info['DBP']),
                    'bpm'=>$info['bpm']
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
            $sql = 'select `age` from patient where `userId`in'.'('.$list.')';
            $userList = server('Db')->getCol($sql);
            if($userList){
                //计算人数
                $num = count($userList);
                //计算平均年龄
                $total = 0;
                foreach($userList as $v){
                    $total+=$v;
                }
                $patientList['number']=$num;
                $patientList['averageAge']=round($total/$num);
            }
        }
        return $patientList;
    }

    //获取检查报告时显示的用户信息
    public function getFinalReportUserInfo($userId)
    {
        $userId = intval($userId);
        $row = server('Db')->getRow("select trueName,hipline,waist,height,weight,bmi, orgId from user u,patient p  where u.userId = p.userId and u.userId={$userId} ");
        $row = $row?:[];
        if($row['orgId']){
            $row['orgName']=model('Organization')->getOrgNameByOrgId($row['orgId']);
            unset($row['orgId']);
        }
        return $row;
    }

    //获取数据页面显示的用户信息
    public function getDataShowPageUserInfo($userId)
    {
        $userId = intval($userId);
        $row = server('Db')->getRow("select trueName,age,height,weight,bmi,gender,gravatar from patient where userId = {$userId}");
        $row= $row?:[];
        if($row){
            //数据格式转换
            $row['age']=intval($row['age']);
            $row['height']=intval($row['height']);
            $row['weight']=intval($row['weight']);
            $row['bmi']=intval($row['bmi']);
            $row['gender']=intval($row['gender']);
            if($row['gravatar'])$row['gravatar'] =  model('Upload')->isAbsolutePath($row['gravatar']);
        }
        return $row;
    }
}