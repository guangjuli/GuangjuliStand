<div class="row" style="margin-left: 20px;">
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">基本信息</div>
    </div>
    <div style="margin-left: 20px;">
        <div class="row form-group">
            <div class="col-sm-4">姓名：</div>
            <div class='col-sm-8'>{if empty($patientInfo['trueName'])}*{else}{$patientInfo['trueName']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">身份证号：</div>
            <div class='col-sm-8'>{if empty($patientInfo['identityCard'])}*{else}{$patientInfo['identityCard']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">电话：</div>
            <div class='col-sm-8'>{if empty($patientInfo['phone'])}*{else}{$patientInfo['phone']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">性别：</div>
            <div class='col-sm-8'>{if $patientInfo['gender'] eq '0'}女{else}男{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">年龄：</div>
            <div class='col-sm-8'>{if empty($patientInfo['age'])}*{else}{$patientInfo['age']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">地址：</div>
            <div class='col-sm-8'>{if empty($patientInfo['addr'])}*{else}{$patientInfo['addr']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">身高：</div>
            <div class='col-sm-8'>{if empty($patientInfo['height'])}*{else}{$patientInfo['height']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">体重：</div>
            <div class='col-sm-8'>{if empty($patientInfo['weight'])}*{else}{$patientInfo['weight']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">臀围：</div>
            <div class='col-sm-8'>{if empty($patientInfo['hipline'])}*{else}{$patientInfo['hipline']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">腰围：</div>
            <div class='col-sm-8'>{if empty($patientInfo['waist'])}*{else}{$patientInfo['waist']}{/if}</div>
        </div>
    </div>

    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">详细信息</div>
    </div>
    <div style="margin-left: 20px;">
        <div class="row form-group">
            <div class="col-sm-4">工作环境：</div>
            <div class='col-sm-8'>{if empty($patientInfo['workEnv'])}*{else}{$patientInfo['workEnv']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">受教育情况：</div>
            <div class='col-sm-8'>{if empty($patientInfo['education'])}*{else}{$patientInfo['education']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">家庭氛围：</div>
            <div class='col-sm-8'>{if empty($patientInfo['familyStates'])}*{else}{$patientInfo['familyStates']}{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">饮食偏好：</div>
            <div class='col-sm-8'>{if $patientInfo['eatHabits'] eq '0'}偏淡{elseif $patientInfo['eatHabits'] eq '1'}适中{else}偏咸{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">精神紧张：</div>
            <div class='col-sm-8'>{if $patientInfo['nervous'] eq '0'}从不{elseif $patientInfo['nervous'] eq '1'}偶尔{else}经常{/if}</div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4">是否饮酒：</div>
            <div class='col-sm-8'>{if $patientInfo['drinkwine'] eq '0'}从不{elseif $patientInfo['drinkwine'] eq '1'}偶尔{else}经常{/if}</div>
        </div>
    </div>

    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">既往病史</div>
    </div>
    {if !empty($disease)}
        {foreach from=$disease key=key item=item}
            <div class="row form-group">
                <div class="col-sm-5">&nbsp;</div>
                <div class="col-sm-7">{$item}</div>
            </div>
        {/foreach}
    {else}
        <div class="row form-group">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-9">暂无统计</div>
        </div>
    {/if}
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">联系人</div>
    </div>
    {if !empty($contacts)}
        {foreach from=$contacts key=key item=item}
            <div class="row form-group">
                <div class="col-sm-5">姓名：</div><div class="col-sm-7">{$item['name']}</div>
                <div class="col-sm-5">关系：</div><div class="col-sm-7">{$item['relationship']}</div>
                <div class="col-sm-5">电话：</div><div class="col-sm-7">{$item['phone']}</div>
            </div>
        {/foreach}
    {else}
        <div class="row form-group">
            <div class="col-sm-3">&nbsp;</div>
            <div class="col-sm-9">暂无统计</div>
        </div>
    {/if}
</div>