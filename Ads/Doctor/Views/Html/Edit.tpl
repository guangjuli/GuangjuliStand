<div class="row">
    <form class="form-horizontal" method="post" action="/man/?doctor/html/edit" id="editForm">
        <div class="col-md-7">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">登录名</label>
                <div class="col-sm-7" style="margin-top: 7px;">
                    {$row['login']}
                </div>
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
                    <input name="confirm_password" value="{$row['password']}"  class="form-control"  placeholder="确认密码：首字母+字母数字下划线">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="trueName" class="col-sm-2 control-label">姓名</label>
                <div class="col-sm-7">
                    <input name="trueName" value="{$row['trueName']}" class="form-control"  placeholder="姓名">
                </div>
            </div>
            <div class="form-group">
                <label for="gender" class="col-sm-2 control-label">性别</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="gender"  value="1" {if $row['gender'] eq 1}checked{/if}>
                            男
                        </label>
                        <label>
                            <input type="radio" name="gender"  value="0" {if $row['gender'] neq 1}checked{/if}>
                            女
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="age" class="col-sm-2 control-label">年龄</label>
                <div class="col-sm-7">
                    <input name="age" value="{$row['age']}" class="form-control"  placeholder="年龄">
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
            <div class="form-group">
                <label for="office" class="col-sm-2 control-label">科室</label>
                <div class="col-sm-7">
                    <input name="office" value="{$row['office']}" class="form-control"  placeholder="科室">
                </div>
            </div>
            <div class="form-group">
                <label for="jobTitle" class="col-sm-2 control-label">职称</label>
                <div class="col-sm-7">
                    <input name="jobTitle" value="{$row['jobTitle']}" class="form-control"  placeholder="职称">
                </div>
            </div>
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
                <label for="active" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active"  value="1" {if $row['active'] eq 1}checked{/if}>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active"  value="0" {if $row['active'] neq 1}checked{/if}>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-7">
                    <input type="hidden" name="userId" value="{$row['userId']}">
                    <a  class="btn btn-primary nscpostformerror" rel="#editForm" id="edit">编辑</a>
                </div>
            </div>

        </div>
    </form>
</div>
<script type="text/javascript" src="/assets/ui/js/jquery.validate.js"></script>
<script type="text/javascript" src="/assets/ui/js/custom-validate.js"></script>
<script type="text/javascript">
    customValidate('addForm');
</script>
