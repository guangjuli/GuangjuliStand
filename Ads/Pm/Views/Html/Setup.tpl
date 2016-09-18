<ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
    <li role="presentation">
        <a href="/man/?/pm/html/list">
            <span class="glyphicon glyphicon-home"></span>
            列表
        </a>
    </li>
    <li class="active" role="presentation">
        <a href="/man/?/pm/html/setup">
            <span class="glyphicon glyphicon-home"></span>
            设置
        </a>
    </li>
    <li role="presentation">
        <a href="/man/?/pm/html/guisetup">
            <span class="glyphicon glyphicon-home"></span>
            界面设置
        </a>
    </li>

</ul>

    <div class="row">
        <div class="col-md-12" >

    <form  class="form-horizontal" method="post" action="/man/?pm/html/setup">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">本地程序包</label>
            <div class="col-sm-8">
                <textarea name="pmsetup" class="form-control" rows="10">{$pmsetup}</textarea>
            </div>
            <div class="col-sm-2">
    <pre></pre>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" class="btn btn-default" value="提交">
            </div>
        </div>
    </form>

</div>
</div>