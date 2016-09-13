<div class="row">
    <form class="form-horizontal" method="post" action="/man/?userinfo/html/add" id="addForm" enctype="multipart/form-data">
        <div class="col-md-7">
            <div class="form-group">
                <label for="userId" class="col-sm-2 control-label">用户Id</label>
                <span class="col-sm-7">
                    {$row['userId']}
                </span>
            </div>
            <div class="row form-group">
                <label for="headImage" class="col-sm-2 control-label">头像</label>
                <div class="col-sm-7">
                    <img src="{$row['gravatar']}" style="width: 100px">
                </div>
            </div>
            <div class="form-group">
                <label for="trueName" class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-7">
                    {$row['trueName']}
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">性别</label>
                <div class="col-sm-7">
                    <div>
                         {if $row['gender'] eq 1}男{else}女{/if}
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">出生日期</label>
                <div class='col-sm-7'>
                    {$row['birthday']}
                </div>
            </div>
            <div class="form-group">
                <label for="height" class="col-sm-2 control-label">身高</label>
                <div class="col-sm-7">
                    {$row['height']}&nbsp;&nbsp;cm
                </div>
            </div>
            <div class="form-group">
                <label for="mobile" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-7">
                    {$row['mobile']}
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-7">
                    {$row['email']}
                </div>
            </div>
            <div class="form-group">
                <label for="qq" class="col-sm-2 control-label">QQ</label>
                <div class="col-sm-7">
                    {$row['qq']}
                </div>
            </div>
            <div class="form-group">
                <label for="weixin" class="col-sm-2 control-label">微信</label>
                <div class="col-sm-7">
                    {$row['weixin']}
                </div>
            </div>
            <div class="form-group">
                <label for="weibo" class="col-sm-2 control-label">微博</label>
                <div class="col-sm-7">
                    {$row['weibo']}
                </div>
            </div>
            <div class="form-group">
                <label for="signer" class="col-sm-2 control-label">是否婚配</label>
                <div class="col-sm-7">
                    <div class="radio">
                        {if $row['signer'] eq 1}已婚{else}未婚{/if}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="zone" class="col-sm-2 control-label">区域</label>
                <div class="col-sm-7">
                    {$row['zone']}
                </div>
            </div>
            <div class="form-group">
                <label for="addr" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-7">
                    {$row['addr']}
                </div>
            </div>
            <div class="form-group">
                <label for="bloodpress" class="col-sm-2 control-label">血压</label>
                <div class="col-sm-7">
                    <div>
                        {if $row['bloodpress'] eq 1}使用{else}未使用{/if}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="ecg" class="col-sm-2 control-label">心电</label>
                <div class="col-sm-7">
                    <div>
                        {if $row['ecg'] eq 1}使用{else}未使用{/if}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="watch" class="col-sm-2 control-label">腕表</label>
                <div class="col-sm-7">
                    <div>
                        {if $row['watch'] eq 1}使用{else}未使用{/if}
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="des" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-7">
                    {$row['des']}
                </div>
            </div>
            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-7">
                    {$row['sort']}
                </div>
            </div>
            <div class="form-group">
                <label for="active" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-7">
                    <div class="radio">
                        {if $row['active'] eq 1}使用{else}未使用{/if}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <a href="/man/?userinfo/html/list" class="btn btn-primary">返回</a>
                </div>
            </div>

        </div>

    </form>
</div>
<style>
    .col-sm-7 div{
        margin-top: 8px;
    }
</style>

