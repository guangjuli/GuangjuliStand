<div class="row">
    <form class="form-horizontal" method="post" action="/admin/api/list/add">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">组名</label>
                <div class="col-sm-10">
                    <input name="title" value="" class="form-control" id="" placeholder="组名">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">标识</label>
                <div class="col-sm-10">
                    <input name="v" value="" class="form-control" id="" placeholder="标识">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">描述</label>
                <div class="col-sm-10">
                    <input  name="api" value="" class="form-control" id="" placeholder="描述">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="api" value="" class="form-control" id="" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active" id="" value="1">
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active" id="" value="0">
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>

    </form>
</div>
