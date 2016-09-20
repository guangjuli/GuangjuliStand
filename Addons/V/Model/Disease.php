<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016-09-19
 * Time: 17:06
 */

namespace Addons\Model;

//问卷调查疾病
class Disease
{
    public function disease()
    {
        $map = server('Db')->getMap("select diseaseId,diseaseName from disease_list");
        return $map?:[];
    }
}