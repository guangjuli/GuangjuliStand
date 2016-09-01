<?php
namespace Ads\Config\Controller\Html;

class Html {

    public function doIndex(){
    }

    public function doEdit()
    {
        return '管理修改';
    }


    public function doAdd()
    {
        return '管理添加';
    }

    /**
     * 对配置数据的管理
     */
    public function doMan()
    {
        return '管理主界面';
    }

    /**
     * ====================================================
     * 系统数据设置
     * ====================================================
     */

    public function doListPost()
    {
        $group = intval(req('Post')['group']);

        $rc = req('Post')['rc'];
        foreach($rc as $key=>$value){
            $where = "name = '$key'";
            $res['value'] = $value;
            $res = saddslashes($res);
            server('db')->autoExecute('system_config',$res,'UPDATE',$where);
        }

        R("/man/?config/html/list&group=$group");
//        D(req('Post'));
    }

    public function doList(){

        $group = intval(req('Get')['group']);
        $list = server('db')->getall("SELECT * FROM `system_config` where `group` = $group order by sort");

        foreach($list as $key=>$value){
            $_list[] = $this->gethtml($value);
        }

        //分组设置
        $group = adsdata('config/data/config','CONFIG_GROUP_LIST');
        $groupar = explode("\n",$group);
        $_g = [];
        foreach($groupar as $key=>$value){
            if(!empty($value)){
                $_ar = explode(":",trim($value,"\r"));
                $_g[$_ar[0]] = $_ar[1];
            }
        }


        //D($_list);
        return  server('Smarty')->ads('Config/html/list')->fetch('',[
            'list' => $list,
            '_list'=>$_list,
            '_g'=>$_g,
        ]);
    }

    private function gethtml($value = [])
    {
        if($value['type'] == 0 || $value['type'] == 1){
            return $this->gethtmlinput($value);
        }elseif($value['type'] == 2 || $value['type'] == 3){    //3 对option选项进行定义
            return $this->gethtmltextarea($value);
        }elseif($value['type'] == 4){
            return $this->gethtmloption($value);
        }
    }

    /**
     * @param array $value
     * input
     */
    private function gethtmlinput($value = [])
    {

$html = "
<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">##title##</label>
    <div class=\"col-sm-6\">
        <input name='rc[##name##]' value='##value##' type=\"text\" class=\"form-control\"  placeholder=\"##title##\">
    </div>
    <div class=\"col-sm-4\">
        <small>##remark##</small>
    </div>
</div>
";
        $html = str_replace('##title##',$value['title'],$html);
        $html = str_replace('##value##',$value['value'],$html);
        $html = str_replace('##name##',$value['name'],$html);
        $value['remark'] = $value['remark'].'<br>Name : <span class="red">'. $value['name'].'<span>';
        $html = str_replace('##remark##',$value['remark'],$html);
        return $html;
    }

    /**
     * @param array $value
     * textarea
     *
     */
    private function gethtmltextarea($value = [])
    {
        $html = "
<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">##title##</label>
    <div class=\"col-sm-6\">
        <textarea name='rc[##name##]' row=\"5\" class=\"form-control\">##value##</textarea>
    </div>
    <div class=\"col-sm-4\">
        <small>##remark##</small>
    </div>
</div>
";
        $html = str_replace('##title##',$value['title'],$html);
        $html = str_replace('##value##',$value['value'],$html);
        $html = str_replace('##name##',$value['name'],$html);
        $value['remark'] = $value['remark'].'<br>Name : <span class="red">'. $value['name'].'<span>';
        $html = str_replace('##remark##',$value['remark'],$html);
        return $html;
    }

    /**
     * @param array $value
     * option 格式
     */
    private function gethtmloption($value = [])
    {
        $option = "<option value=\"##key##\" ##selected##>##item##</option>";
        $selecte = "selected=\"selected\"";
        $html = "
<div class=\"form-group\">
    <label class=\"col-sm-2 control-label\">##title##</label>
    <div class=\"col-sm-6\">
    <select class=\"form-control\" name=\"rc[##name##]\">
    ##option##
    </select>
    </div>
    <div class=\"col-sm-4\">
        <small>##remark##</small>
    </div>
</div>
";
//D($value);
        //首先根据extra
        $htmloption = '';
        $optionlist = explode("\n",$value['extra']);        //value['value'] 是选中的值
        foreach($optionlist as $key=>$v){
            $v = trim($v,"\r");
            if(!empty($v)){
                $_v = explode(":",$v);
                $v1 = $_v[0];
                $v2 = $_v[1];
                $vselect = ($value['value'] == $v1)?$selecte:'';
                $_option = str_replace('##key##',$v1,$option);
                $_option = str_replace('##item##',$v2,$_option);
                $_option = str_replace('##selected##',$vselect,$_option);
                $htmloption .= $_option;
            }
        }
        $html = str_replace('##option##',$htmloption,$html);
        $html = str_replace('##title##',$value['title'],$html);
        $html = str_replace('##value##',$value['value'],$html);
        $html = str_replace('##name##',$value['name'],$html);
        $value['remark'] = $value['remark'].'<br>Name : <span class="red">'. $value['name'].'<span>';
        $html = str_replace('##remark##',$value['remark'],$html);
        return $html;

    }


}
