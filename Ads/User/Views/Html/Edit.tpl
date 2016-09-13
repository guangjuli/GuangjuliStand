<div class="row">
    <form class="form-horizontal" method="post" action="/man/?user/html/edit" id="editForm">
        <div class="col-md-7">
            <div class="form-group">
                <label for="login" class="col-sm-2 control-label">登录名</label>
                <div class="col-sm-7">
                    <input name="login" id="login" value="{$row['login']}" class="form-control"  placeholder="登录名" onblur="checkLogin()">
                </div>
                <div class="col-sm-3 error">{$checkLogin}</div>
            </div>
            <div class="form-group">
                <label for="groupId" class="col-sm-2 control-label">用户组</label>
                {if !empty($group)}
                    <div class="col-sm-7">
                        <select class="form-control" name="groupId">
                            {foreach from=$group key=key item=item}
                                <option value="{$key}" {if $row['groupId'] eq $key}selected="selected"{/if}>{$item}</option>
                            {/foreach}
                        </select>
                    </div>
                {else}
                    <div class="col-sm-7">
                        <input name="groupId" value="{$row['groupId']}" class="form-control"  placeholder="用户组">
                    </div>
                {/if}
            </div>
            <div class="form-group">
                <label for="password" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-7">
                    <input name="password" id="password" value="{$row['password']}" class="form-control"  placeholder="密码">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="confirm_password" class="col-sm-2 control-label">确认密码</label>
                <div class="col-sm-7">
                    <input name="confirm_password" value="{$row['password']}"  class="form-control"  placeholder="确认密码">
                </div>
                <div class="col-sm-3 error"></div>
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
                    <input type="hidden" name="type" value="edit">
                    <a class="btn btn-default nscpostformerror" rel="#editForm">编辑</a>
                </div>
            </div>

        </div>

    </form>
</div>

<script type="text/javascript" src="/assets/ui/js/jquery.validate.js"></script>
<script type="text/javascript" src="/assets/ui/js/custom-validate.js"></script>
<script type="text/javascript">
    function checkLogin(){
        var tag = '#login';
        $.ajax({
            type: "Post",
            url: "/man/?user/html/checklogin",
            data:{
                'login':$(tag).val()
            },
            dataType:"json",
            success: function(data){
                var param = eval(data.msg);
                showErrorMsg(param)
            },
            error : function() {

            }
        });
    }
    customValidate('editForm');

</script>
