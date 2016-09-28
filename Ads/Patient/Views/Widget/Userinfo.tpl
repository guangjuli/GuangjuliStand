<div class="row" style="margin-left: 20px;">
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">基本信息</div>
    </div>
    <div style="margin-left: 40px;">
        <div class="row form-group">
            <div class="col-sm-3 noPadding">姓名：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['trueName'])}&nbsp;{else}{$patientInfo['trueName']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">身份证号：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['identityCard'])}&nbsp;{else}{$patientInfo['identityCard']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">电话：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['phone'])}&nbsp;{else}{$patientInfo['phone']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">性别：</div>
            <div class='col-sm-8 noPadding'><pre>{if $patientInfo['gender'] eq '0'}女{else}男{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">年龄：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['age'])}&nbsp;{else}{$patientInfo['age']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">地址：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['addr'])}&nbsp;{else}{$patientInfo['addr']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">身高：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['height'])}&nbsp;{else}{$patientInfo['height']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">体重：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['weight'])}&nbsp;{else}{$patientInfo['weight']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">臀围：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['hipline'])}&nbsp;{else}{$patientInfo['hipline']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">腰围：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['waist'])}&nbsp;{else}{$patientInfo['waist']}{/if}</pre></div>
        </div>
    </div>
    <hr class="hr4 col-sm-10">
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">详细信息</div>
    </div>
    <div style="margin-left: 40px;">
        <div class="row form-group">
            <div class="col-sm-3 noPadding">工作环境：</div>
            <div class='col-sm-8 noPadding'><pre class="pre-scrollable">{if empty($patientInfo['workEnv'])}&nbsp;{else}{$patientInfo['workEnv']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">受教育情况：</div>
            <div class='col-sm-8 noPadding'><pre>{if empty($patientInfo['education'])}&nbsp;{else}{$patientInfo['education']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">家庭氛围：</div>
            <div class='col-sm-8 noPadding'><pre class="pre-scrollable">{if empty($patientInfo['familyStates'])}&nbsp;{else}{$patientInfo['familyStates']}{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">饮食偏好：</div>
            <div class='col-sm-8 noPadding'><pre>{if $question['eatHabits'] eq '0'}偏淡{elseif $question['eatHabits'] eq '1'}适中{else}偏咸{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">精神紧张：</div>
            <div class='col-sm-8 noPadding'><pre>{if $question['nervous'] eq '0'}从不{elseif $question['nervous'] eq '1'}偶尔{else}经常{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">是否饮酒：</div>
            <div class='col-sm-8 noPadding'><pre>{if $question['drinkwine'] eq '0'}从不{elseif $question['drinkwine'] eq '1'}偶尔{else}经常{/if}</pre></div>
        </div>
    </div>
    <hr class="hr4 col-sm-10">
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">既往病史</div>
    </div>
    {if !empty($disease)}
        <div class="row form-group">
            <div class="col-sm-3">&nbsp;</div>
            <pre class="col-sm-8 pre-scrollable">
                {foreach from=$disease key=key item=item}
                    <span class="pull-left">{$item}</span>
                {/foreach}
            </pre>
        </div>
    {else}
        <div class="row form-group">
            <div class="col-sm-3">&nbsp;</div>
            <pre class="text-left col-sm-8">
            <div>暂无统计</div>
            </pre>
        </div>
    {/if}
    <hr class="hr4 col-sm-10">
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">联系人</div>
    </div>
    {if !empty($contacts)}
        <div class="col-sm-3">&nbsp;</div>
        <pre class="col-sm-8 pre-scrollable">
        {foreach from=$contacts key=key item=item}
            <div  class="noMargin" style="margin-left: 20px;">联系人{$key+1}</div>
            姓名：{$item['name']}
            关系：{$item['relationship']}
            电话：{$item['phone']}
        {/foreach}
        </pre>
    {else}
        <div class="row form-group">
            <div class="col-sm-3">&nbsp;</div>
            <pre class="text-left col-sm-8">
            <div>暂无统计</div>
            </pre>
        </div>
    {/if}
    <hr class="hr4 col-sm-10">
    <div class="row form-group">
        <div class='col-sm-12' style="font-weight: bold; color: #2c2c29">使用设备</div>
    </div>
    <div style="margin-left: 40px;">
        <div class="row form-group">
            <div class="col-sm-3 noPadding">心电：</div>
            <div class='col-sm-8 noPadding'><pre>{if $patientInfo['ecg'] eq 1}使用{else}&nbsp;{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">血压：</div>
            <div class='col-sm-8 noPadding'><pre>{if $patientInfo['bloodpress'] eq 1}使用{else}&nbsp;{/if}</pre></div>
        </div>
        <div class="row form-group">
            <div class="col-sm-3 noPadding">腕表：</div>
            <div class='col-sm-8 noPadding'><pre>{if $patientInfo['watch'] eq 1}使用{else}&nbsp;{/if}</pre></div>
        </div>
    </div>
    <hr class="hr4 col-sm-10">
</div>
{literal}
<style>
    .hr4{ height:2px;border:none;border-top:2px solid #9d9d9d;}
    .noPadding{padding-left: 0; padding-right: 0}
    .noMargin{margin-top: 0;padding-top: 0;}
</style>
{/literal}