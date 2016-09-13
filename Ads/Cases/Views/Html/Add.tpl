<div class="row">
    <form class="form-horizontal" method="post" action="/man/?usergroup/html/add">
        <div class="col-md-8 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">查询患者</label>
                <div class="col-sm-6">
                    <input name="groupName" value="" class="form-control" placeholder="请输入患者姓名或手机号">
                </div>
                <div class="btn btn-primary">
                    查询
                </div>
            </div>
            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">患者信息</label>
                <div class="col-sm-7" style="color: #8e8b8b; margin-top: 10px;">
                    <div class="col-sm-6">患者</div><div class="col-sm-6">&nbsp;</div>
                    <div class="col-sm-2">姓名：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">手机号：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">性别：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">地址：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-12">&nbsp;</div>
                    <div class="col-sm-6">患者联系人</div><div class="col-sm-6">&nbsp;</div>
                    <div class="col-sm-2">姓名：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">手机号：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">关系：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-6">&nbsp;</div>
                    <div class="col-sm-2">姓名：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">手机号：</div><div class="col-sm-4">*</div>
                    <div class="col-sm-2">关系：</div><div class="col-sm-4">*</div>
                </div>
            </div>
            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">开始时间</label>
                <div class='col-sm-5'>
                    <div class='input-group date' id='datetimepicker1'>
                        <input type="text" class="form-control" name="birthday" value="{$smarty.now|date_format:"%Y-%m-%d"}">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
                </div>
            </div>

            <div class="row form-group">
                <label for="birthday" class="col-sm-2 control-label">结束时间</label>
                <div class='col-sm-7'>
                    <input name="groupName" value="" class="form-control" placeholder="组名">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">医院</label>
                <div class="col-sm-7">
                    <input name="groupChr" value="" class="form-control" placeholder="标识">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">医院地址</label>
                <div class="col-sm-7">
                    <input  name="des" value="" class="form-control" placeholder="描述">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">病情描述</label>
                <div class="col-sm-7">
                    <textarea  name="des" class="form-control" cols="5"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">用药</label>
                <div class="col-sm-7">
                    <textarea  name="des" class="form-control" cols="5"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">副作用</label>
                <div class="col-sm-7">
                    <textarea  name="des" class="form-control" cols="5"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="" class="form-control" placeholder="排序">
                </div>
            </div>


            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">添加</button>
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