<div class="row">
    <div class="col-md-5">
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">用户Id</div>
            <div class="col-sm-8">
                <div>{$row['userId']}</div>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">头像</div>
            <div class="col-sm-8">
                <img src="{$row['gravatar']}" style="width: 100px">
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="col-sm-10">
            {widget ads='patient/userinfo/Getpatientinfo'}
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">描述</div>
            <div class="col-sm-8">
                {$row['des']}
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">排序</div>
            <div class="col-sm-8">
                {$row['sort']}
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>
        <div class="row form-group" style="margin-left: 20px;">
            <div class="col-sm-3" style="font-weight: bold; color: #2c2c29">状态</div>
            <div class="col-sm-8">
                <div class="radio">
                    {if $row['active'] eq 1}使用{else}未使用{/if}
                </div>
            </div>
            <div class="col-sm-1">&nbsp;</div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-7">
                <a href="/man/?patient/html/list" class="btn btn-primary">返回</a>
            </div>
        </div>

    </div>
</div>
<style>
    .col-sm-7 div{
        margin-top: 7px;
    }
</style>

