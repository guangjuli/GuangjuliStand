<div class="row">
    <form class="form-horizontal" method="post" action="/man/?organization/html/edit">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="orgName" class="col-sm-2 control-label">机构名</label>
                <div class="col-sm-10">
                    <input name="orgName" value="{$row['orgName']}" class="form-control" placeholder="机构名">
                </div>
            </div>

            <div class="form-group">
                <label for="orgAddr" class="col-sm-2 control-label">机构地址</label>
                <div class="col-sm-10">
                    <input name="orgAddr" value="{$row['orgAddr']}" class="form-control" placeholder="机构地址">
                </div>
            </div>

            <div class="form-group">
                <label for="des" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <input  name="des" value="{$row['des']}" class="form-control" placeholder="描述">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="{$row['sort']}" class="form-control" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active" value="1" {if $row['active'] eq 1}checked{/if}>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active" value="0"  {if $row['active'] neq 1}checked{/if}>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="groupId" value="{$row['orgId']}">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>

    </form>
</div>
