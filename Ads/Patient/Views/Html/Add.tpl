<div class="row">
    <form class="form-horizontal" method="post" action="/man/?patient/html/add" id="addForm" enctype="multipart/form-data">
        <div class="col-md-7">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">登录名</label>
                <div class="col-sm-7">
                    <input name="login" id="login" value="{$row['login']}" class="form-control"  placeholder="登录名即手机号">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-7">
                    <input name="password" id="password" value="{$row['password']}" class="form-control"  placeholder="密码：首字母+字母数字下划线">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-7">
                    <input name="confirm_password" value="{$row['confirm_password']}"  class="form-control"  placeholder="确认密码：首字母+字母数字下划线">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="groupId" class="col-sm-2 control-label">用户类型</label>
                <div class="col-sm-7">
                    <div class="radio">
                        {foreach from=$patientGroupId key=key item=item}
                            <label><input type="radio" name="groupId"  value="{$key}" {if $item eq 'Android'}checked{/if}>{$item}</label>
                        {/foreach}
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label for="orgId" class="col-sm-2 control-label">医院</label>
                <div class="col-sm-7">
                    <select class="form-control" name="orgId">
                        {foreach from=$org key=key item=item}
                            <option value="{$key}" {if $key eq $row['orgId']}selected="selected"{/if}>{$item}</option>
                        {/foreach}
                    </select>
                </div>
            </div>
            <hr class="hr4 col-sm-10">
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">基本信息</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="row form-group">
                    <div class="col-sm-2 control-label">头像</div>
                    <div class="col-sm-2">
                        {widget ads='patient/crop/Uploadimage'}
                    </div>
                    <div style="color: #8e8b8b; margin-top: 10px;">
                        提示：上传头像后会自动创建用户,之后仍需编辑其他信息，请根据提示前往编辑页面
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">真实姓名</div>
                    <div class="col-sm-7">
                        <input name="trueName" value="{$row['trueName']}" class="form-control"  placeholder="真实姓名">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">性别</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="gender"  value="1">
                                男
                            </label>
                            <label>
                                <input type="radio" name="gender"  value="0">
                                女
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <div  class="col-sm-2 control-label">出生日期</div>
                    <div class='col-sm-3'>
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="text" class="form-control" name="birthday" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">身高</div>
                    <div class="col-sm-7">
                        <input name="height" value="{$row['height']}" class="form-control"  placeholder="身高,单位cm">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">体重</div>
                    <div class="col-sm-7">
                        <input name="weight" value="{$row['weight']}" class="form-control"  placeholder="体重，单位kg">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">邮箱</div>
                    <div class="col-sm-7">
                        <input name="email" value="{$row['email']}" class="form-control"  placeholder="邮箱">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">QQ</div>
                    <div class="col-sm-7">
                        <input name="qq" value="{$row['qq']}" class="form-control"  placeholder="QQ">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">微信</div>
                    <div class="col-sm-7">
                        <input name="weixin" value="{$row['weixin']}" class="form-control"  placeholder="微信">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">是否婚配</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="signer"  value="1">
                                已婚
                            </label>
                            <label>
                                <input type="radio" name="signer"  value="0">
                                未婚
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">地址</div>
                    <div class="col-sm-7">
                        <input name="addr" id="addr" value="{$row['addr']}" class="form-control"  placeholder="地址">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
            </div>
            <hr class="hr4 col-sm-10">
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">详细信息</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="form-group">
                    <div class="col-sm-2 control-label">身份证</div>
                    <div class="col-sm-7">
                        <input name="identityCard" value="{$row['identityCard']}" class="form-control"  placeholder="身份证">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">饮食习惯</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="eatHabits"  value="0" {if $row['eatHabits'] eq '0'}checked{/if}>
                                偏淡
                            </label>
                            <label>
                                <input type="radio" name="eatHabits"  value="1" {if $row['eatHabits'] eq '1'}checked{/if}>
                                适中
                            </label>
                            <label>
                                <input type="radio" name="eatHabits"  value="2" {if $row['eatHabits'] eq '2'}checked{/if}>
                                偏咸
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">是否饮酒</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="drinkwine"  value="0" {if $row['drinkwine'] eq '0'}checked{/if}>
                                从不
                            </label>
                            <label>
                                <input type="radio" name="drinkwine"  value="1" {if $row['drinkwine'] eq '1'}checked{/if}>
                                偶尔
                            </label>
                            <label>
                                <input type="radio" name="drinkwine"  value="2" {if $row['drinkwine'] eq '2'}checked{/if}>
                                经常
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">精神紧张</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="nervous"  value="0" {if $row['nervous'] eq '0'}checked{/if}>
                                从不
                            </label>
                            <label>
                                <input type="radio" name="nervous"  value="1" {if $row['nervous'] eq '1'}checked{/if}>
                                偶尔
                            </label>
                            <label>
                                <input type="radio" name="nervous"  value="2" {if $row['nervous'] eq '2'}checked{/if}>
                                经常
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">疾病</div>
                    <div class="col-sm-7">
                        <div class="checkbox">
                            {foreach from=$disease key=key item=item}
                                <label class="col-sm-3"><input  type="checkbox" name="diseaseList"  value="{$key}">{$item}</label>
                            {/foreach}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">臀围</div>
                    <div class="col-sm-7">
                        <input name="hipline" value="{$row['hipline']}" class="form-control"  placeholder="臀围">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">腰围</div>
                    <div class="col-sm-7">
                        <input name="waist" value="{$row['waist']}" class="form-control"  placeholder="腰围">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">工作环境</div>
                    <div class="col-sm-7">
                        <input name="workEnv" value="{$row['workEnv']}" class="form-control"  placeholder="工作环境">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
                <div class="form-group">
                    <div  class="col-sm-2 control-label">收缩压</div>
                    <div class="col-sm-7">
                        <input name="SBP" value="{$row['SBP']}" class="form-control"  placeholder="收缩压">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>

                <div class="form-group">
                    <div  class="col-sm-2 control-label">舒张压</div>
                    <div class="col-sm-7">
                        <input name="DBP" value="{$row['DBP']}" class="form-control"  placeholder="舒张压">
                    </div>
                    <div class="col-sm-3 error"></div>
                </div>
            </div>
            <hr class="hr4 col-sm-10">
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-11" style="font-weight: bold; color: #2c2c29">使用设备</div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="form-group">
                    <div class="col-sm-2 control-label">血压</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="bloodpress"  value="1" {if $row['bloodpress'] eq 1}checked{/if}>
                                使用
                            </label>
                            <label>
                                <input type="radio" name="bloodpress"  value="0" {if $row['bloodpress'] neq 1}checked{/if}>
                                未使用
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">心电</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="ecg"  value="1" {if $row['ecg'] eq 1}checked{/if}>
                                使用
                            </label>
                            <label>
                                <input type="radio" name="ecg"  value="0" {if $row['ecg'] neq 1}checked{/if}>
                                未使用
                            </label>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-2 control-label">腕表</div>
                    <div class="col-sm-7">
                        <div class="radio">
                            <label>
                                <input type="radio" name="watch"  value="1" {if $row['watch'] eq 1}checked{/if}>
                                使用
                            </label>
                            <label>
                                <input type="radio" name="watch"  value="0" {if $row['watch'] neq 1}checked{/if}>
                                未使用
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hr4 col-sm-10">
            <div class="row form-group">
                <div class="col-sm-1">&nbsp;</div>
                <div class="col-sm-2" style="font-weight: bold; color: #2c2c29">联系人</div>
                <div class="col-sm-2" style="position: relative; right: 60px;">
                    <span class="glyphicon glyphicon-plus col-sm-4 btn btn-default" onclick="addContacts()"></span>
                </div>
            </div>
            <div style="margin-left: 50px; color: #0f0f0f">
                <div class="form-group" id="addContacts1">
                    <div class="col-sm-2 control-label num" id="num1">联系人1</div>
                    <div class="col-sm-7">
                        <div class="form-group">
                            <label for="contact_trueName" class="col-sm-2 control-label">姓名</label>
                            <div class="col-sm-9">
                                <input name="contact[1][trueName]" value="" class="form-control"  placeholder="联系人姓名">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_relationship" class="col-sm-2 control-label">关系</label>
                            <div class="col-sm-9">
                                <input name="contact[1][relationship]" value="" class="form-control"  placeholder="与患者亲属关系">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact_phone" class="col-sm-2 control-label">手机号</label>
                            <div class="col-sm-9">
                                <input name="contact[1][phone]" value="" class="form-control"  placeholder="联系人手机号">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="hr4 col-sm-10">
            <div class="form-group">
                <label for="des" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-7">
                    <input  name="des" value="{$row['des']}"  class="form-control"  placeholder="描述">
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-7">
                    <input  name="sort" value="{$row['sort']}" class="form-control"  placeholder="排序">
                </div>
            </div>
            <div class="form-group">
                <label for="active" class="col-sm-2 control-label">状态</label for="active">
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active"  value="1" checked>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active"  value="0">
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <a class="btn btn-primary nscpostformerror" rel="#addForm" id="add">添加</a>
                </div>
            </div>

        </div>

    </form>
</div>

<script type="text/javascript" src="/assets/ui/js/jquery.validate.js"></script>
<script type="text/javascript" src="/assets/ui/js/custom-validate.js"></script>
{*日历*}
<link href="/assets/ui/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.zh-CN.min.js"></script>

<script type="text/javascript">
    customValidate('addForm');

    //日历
    customCalender('datetimepicker1');
    function customCalender(id){
        $(document).ready(function () {
            $('#'+id).datepicker({
                format: 'yyyy-mm-dd',
                language:'zh-CN'
            });
        });
    }

    function addContacts(){
        var newId = $(".num:last").attr("id");
        var b=newId.split('m');
        var i=parseInt(b[1])+1;
        var phone='phone';
        var relationship = 'relationship';
        var trueName='trueName';
        if($('.num').length<3){
            $('#addContacts'+b[1]).after(
                    "<div class='form-group' id='addContacts" +i+"'>" +
                    "<div class='col-sm-2 control-label num' id='num" +i+"'>联系人" +i+"</div>" +
                    "<div class='col-sm-7'>" +
                    "<div class='form-group'>" +
                    "<label for='contact_trueName' class='col-sm-2 control-label'>姓名</label>" +
                    "<div class='col-sm-9'>" +
                    "<input name='contact[" +i+"][" +trueName+"]' value='' class='form-control'  placeholder='联系人姓名'></div></div>" +
                    "<div class='form-group'>" +
                    "<label for='contact_relationship' class='col-sm-2 control-label'>关系</label> " +
                    "<div class='col-sm-9'>" +
                    "<input name='contact[" +i+"][" +relationship+"]' value='' class='form-control'  placeholder='与患者亲属关系'></div></div>" +
                    "<div class='form-group'>" +
                    "<label for='contact_phone' class='col-sm-2 control-label'>手机号</label>" +
                    "<div class='col-sm-9'>" +
                    "<input name='contact[" +i+"][" +phone+"]' value='' class='form-control'  placeholder='联系人手机号'></div></div></div><div class='col-sm-1'>" +
                    "<div class='col-sm-11 glyphicon glyphicon-minus btn btn-default' onclick='deleteContacts(" +i+
                    ")'></div></div></div>"
            );
        }
    }
    function deleteContacts(i){
        $('#addContacts'+i).remove();
    }

</script>
{literal}
<style>
    .hr4{ height:2px;border:none;border-top:2px solid #9d9d9d;}
</style>
{/literal}
