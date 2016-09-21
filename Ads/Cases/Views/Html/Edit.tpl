<div class="row">
    <form class="form-horizontal" id="editForm" method="post" action="/man/?cases/html/edit">
        <div class="col-md-8 ">

            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">患者信息</label>
                <div class="col-sm-7" style="color: #8e8b8b; margin-top: 10px;">
                    <div class="col-sm-6">患者</div><div class="col-sm-6">&nbsp;</div>
                    <div class="col-sm-2">姓名：</div><span class="col-sm-4" id="trueName">{if empty($patient['mysql']['trueName'])}*{else}{$patient['mysql']['trueName']}{/if}</span>
                    <div class="col-sm-2">手机号：</div><span class="col-sm-4" id="login">{if empty($patient['mysql']['login'])}*{else}{$patient['mysql']['login']}{/if}</span>
                    <div class="col-sm-2">性别：</div><span class="col-sm-4" id="gender">{if $patient['mysql']['gender'] eq 0}女{else}男{/if}</span>
                    <div class="col-sm-2" >地址：</div><span class="col-sm-4" id="addr">{if empty($patient['mysql']['addr'])}*{else}{$patient['mysql']['addr']}{/if}</span>
                    <div class="col-sm-12">&nbsp;</div>
                    <div class="col-sm-6">患者联系人</div><div class="col-sm-6">&nbsp;</div>
                    <div id="relationship">
                        {foreach from=$patient['contacts'] key=$key item=$item}
                        <div class="col-sm-2">姓名：</div><span class="col-sm-4" id="name">{if empty($item["name$key"])}*{else}{$item["name$key"]}{/if}</span>
                        <div class="col-sm-2">关系：</div><span class="col-sm-4" id="relationship">{if empty($item["relationship$key"])}*{else}{$item["relationship$key"]}{/if}</span>
                        <div class="col-sm-2">手机号1：</div><span class="col-sm-4" id="phone1">{if empty($item["phone1$key"])}*{else}{$item["phone1$key"]}{/if}</span>
                        <div class="col-sm-2">手机号2：</div><span class="col-sm-4" id="phone2">{if empty($item["phone2$key"])}*{else}{$item["phone2$key"]}{/if}</span>
                        {/foreach}
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label for="beginTime" class="col-sm-2 control-label">开始时间</label>
                <div class='col-sm-3'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="text" class="form-control" name="beginTime" value="{$row['beginTime']}">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <label for="endTime" class="col-sm-2 control-label">结束时间</label>
                <div class='col-sm-3'>
                    <input name="endTime" value="{$row['endTime']}" class="form-control" placeholder="结束时间">
                </div>
            </div>

            <div class="row form-group">
                <label for="orgId" class="col-sm-2 control-label">医院</label>
                <div class="col-sm-7">
                    <select class="form-control" name="orgId">
                        {foreach from=$row['org'] key=key item=item}
                            <option value="{$key}" {if $key eq $row['orgId']}selected="selected"{/if}>{$item}</option>
                        {/foreach}
                    </select>
                </div>
            </div>

           <div class="form-group">
                <label for="disease" class="col-sm-2 control-label">病情描述</label>
                <div class="col-sm-7">
                    <textarea  name="disease" class="form-control" cols="5">{$row['disease']}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="medication" class="col-sm-2 control-label">用药</label>
                <div class="col-sm-7">
                    <textarea  name="medication" class="form-control" cols="5">{$row['medication']}</textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="sideEffect" class="col-sm-2 control-label">副作用</label>
                <div class="col-sm-7">
                    <textarea  name="sideEffect" class="form-control" cols="5">{$row['sideEffect']}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="doctorName" class="col-sm-2 control-label">诊断医生</label>
                <div class="col-sm-7">
                    <input  name="doctorName" value="{$row['doctorName']}" class="form-control" placeholder="诊断医生">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-7">
                    <input  name="sort" value="" class="form-control" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="userId" value="{$row['userId']}">
                    <input type="hidden" name="caseId" value="{$row['caseId']}">
                    <a  class="btn btn-primary nscpostformerror" rel="#editForm" id="edit">编辑</a>
                    <a  class="btn btn-default" href="/man/?cases/html/detail&id={$row['userId']}&patientId={$row['userId']}">返回</a>
                </div>
            </div>

        </div>

    </form>
</div>
{*日历*}
<link href="/assets/ui/css/bootstrap-datepicker3.min.css" rel="stylesheet">
<script type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="/assets/ui/js/bootstrap-datepicker.zh-CN.min.js"></script>

<script type="text/javascript">
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
</script>