<div class="row col-md-7">
    <div class="cmd-sm-8">
        <hr class="hr4 col-sm-10">
        <div class="row form-group">
            <label class="col-sm-2">开始时间</label>
            <div class="col-sm-2">{if empty($list['beginTime'])}*{else}{$list['beginTime']}{/if}</div>
            <div class="col-sm-6">&nbsp;</div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2">结束时间</label>
            <div class="col-sm-2">{if empty($list['endTime'])}*{else}{$list['endTime']}{/if}</div>
            <div class="col-sm-6">&nbsp;</div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2">病情描述</label>
            <div class="col-sm-10">{if empty($list['disease'])}*{else}{$list['disease']}{/if}</div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2">用药</label>
            <div class="col-sm-10">{if empty($list['medication'])}*{else}{$list['medication']}{/if}</div>
        </div>
        <div class="row form-group">
            <label class="col-sm-2">副作用</label>
            <div class="col-sm-10">{if empty($list['sideEffect'])}*{else}{$list['sideEffect']}{/if}</div>
        </div>
        <hr class="hr4 col-sm-10">
        <div class="row form-group">
            <label class="col-sm-12">就诊医院</label>
        </div>
        <div style="margin-left: 20px;">
            <div class="row form-group">
                <div class="col-sm-2">医院名称：</div>
                <div class="col-sm-10">{if empty($organization['orgName'])}*{else}{$organization['orgName']}{/if}</div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">医院地址：</div>
                <div class="col-sm-10">{if empty($organization['orgAddr'])}*{else}{$organization['orgAddr']}{/if}</div>
            </div>
        </div>
        <hr class="hr4 col-sm-10">
        <div class="row form-group">
            <label class="col-sm-12">诊断医生</label>
        </div>
        <div style="margin-left: 20px;">
            <div class="row form-group">
                <div class="col-sm-2">姓名</div>
                <div class="col-sm-10">{if empty($doctor['trueName'])}*{else}{$doctor['trueName']}{/if}</div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">性别</div>
                <div class="col-sm-10">{if $doctor['gender'] eq '1'}男{else}女{/if}</div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">电话</div>
                <div class="col-sm-10">{if empty($doctor['login'])}*{else}{$doctor['login']}{/if}</div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">年龄</div>
                <div class="col-sm-10">{if empty($doctor['age'])}*{else}{$doctor['age']}{/if}</div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">科室</div>
                <div class="col-sm-10">{if empty($doctor['office'])}*{else}{$doctor['office']}{/if}</div>
            </div>
            <div class="row form-group">
                <div class="col-sm-2">职称</div>
                <div class="col-sm-10">{if empty($doctor['jobTitle'])}*{else}{$doctor['jobTitle']}{/if}</div>
            </div>
        </div>
        <hr class="hr4 col-sm-10">
        </div>
    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
            <a  class="btn btn-primary" href="/man/?cases/html/detail&id={$list['userId']}&patientId={$list['userId']}">返回</a>
        </div>
    </div>
</div>
<hr style="width:2px;size:100px;color: #4c4c4c ">
<div class="col-md-3 ">
    {widget ads='patient/userinfo/Getpatientinfo'}
</div>
<style>
    .hr4{ height:2px;border:none;border-top:2px solid #9d9d9d;}
</style>






