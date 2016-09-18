<div class="row">
    <form class="form-horizontal" method="post" action="/man/?patient/html/edit" id="editForm" enctype="multipart/form-data">
        <div class="col-md-7">
            <div class="form-group">
                <label for="userId" class="col-sm-2 control-label">用户Id</label>
                <div class="col-sm-7">
                    {$row['userId']}
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="row form-group">
                <label for="headImage" class="col-sm-2 control-label">头像</label>
                <div class="col-sm-2">
                    {widget ads='patient/crop/Uploadimage'}
                </div>
            </div>
            <div class="form-group">
                <label for="trueName" class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-7">
                    <input name="trueName" value="{$row['trueName']}" class="form-control"  placeholder="真实姓名">
                </div>
                <div class="col-sm-3 error"></div>
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
            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">出生日期</label>
                <div class='col-sm-7'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="text" class="form-control" name="birthday" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="height" class="col-sm-2 control-label">身高</label>
                <div class="col-sm-7">
                    <input name="height" value="{$row['height']}" class="form-control"  placeholder="身高,单位cm">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="mobile" class="col-sm-2 control-label">手机</label>
                <div class="col-sm-7">
                    <input name="mobile" value="{$row['mobile']}" class="form-control"  placeholder="手机">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">邮箱</label>
                <div class="col-sm-7">
                    <input name="email" value="{$row['email']}" class="form-control"  placeholder="邮箱">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="qq" class="col-sm-2 control-label">QQ</label>
                <div class="col-sm-7">
                    <input name="qq" value="{$row['qq']}" class="form-control"  placeholder="QQ">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="weixin" class="col-sm-2 control-label">微信</label>
                <div class="col-sm-7">
                    <input name="weixin" value="{$row['weixin']}" class="form-control"  placeholder="微信">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="weibo" class="col-sm-2 control-label">微博</label>
                <div class="col-sm-7">
                    <input name="weibo" value="{$row['weibo']}" class="form-control"  placeholder="微博">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="signer" class="col-sm-2 control-label">是否婚配</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="signer"  value="1" {if $row['active'] eq 1}checked{/if}>
                            已婚
                        </label>
                        <label>
                            <input type="radio" name="signer"  value="0" {if $row['active'] neq 1}checked{/if}>
                            未婚
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="zone" class="col-sm-2 control-label">区域</label>
                <div class="col-sm-7">
                    <input name="zone" id="zone" value="{$row['zone']}" class="form-control"  placeholder="区域">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="addr" class="col-sm-2 control-label">地址</label>
                <div class="col-sm-7">
                    <input name="addr" id="addr" value="{$row['addr']}" class="form-control"  placeholder="地址">
                </div>
                <div class="col-sm-3 error"></div>
            </div>
            <div class="form-group">
                <label for="bloodpress" class="col-sm-2 control-label">血压</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="bloodpress"  value="1" {if $row['active'] eq 1}checked{/if}>
                            使用
                        </label>
                        <label>
                            <input type="radio" name="bloodpress"  value="0" {if $row['active'] neq 1}checked{/if}>
                            未使用
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="ecg" class="col-sm-2 control-label">心电</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="ecg"  value="1" {if $row['active'] eq 1}checked{/if}>
                            使用
                        </label>
                        <label>
                            <input type="radio" name="ecg"  value="0" {if $row['active'] neq 1}checked{/if}>
                            未使用
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="watch" class="col-sm-2 control-label">腕表</label>
                <div class="col-sm-7">
                    <div class="radio">
                        <label>
                            <input type="radio" name="watch"  value="1" {if $row['active'] eq 1}checked{/if}>
                            使用
                        </label>
                        <label>
                            <input type="radio" name="watch"  value="0" {if $row['active'] neq 1}checked{/if}>
                            未使用
                        </label>
                    </div>
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
                    <a class="btn btn-primary nscpostformerror" rel="#editForm" id="edit">编辑</a>
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

</script>
