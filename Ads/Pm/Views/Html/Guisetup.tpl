<ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
    <li role="presentation">
        <a href="/man/?/pm/html/list">
            <span class="glyphicon glyphicon-home"></span>
            列表
        </a>
    </li>
    <li role="presentation">
        <a href="/man/?/pm/html/setup">
            <span class="glyphicon glyphicon-home"></span>
            设置
        </a>
    </li>
    <li  class="active"  role="presentation">
        <a href="/man/?/pm/html/guisetup">
            <span class="glyphicon glyphicon-home"></span>
            界面设置
        </a>
    </li>

</ul>

    <div class="row">
        <div class="col-md-12" >

            <form class="form-horizontal" method="post" action="/man/?/pm/html/guisetup">

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">面包屑</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="Breadcrumb" id="optionsRadios1" value="1" {if $config['Breadcrumb'] eq 1}checked{/if}>
                                打开
                            </label>
                            <label>
                                <input type="radio" name="Breadcrumb" id="optionsRadios1" value="0" {if $config['Breadcrumb'] neq 1}checked{/if}>
                                关闭
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Tip</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="Tip" id="optionsRadios1" value="1" {if $config['Tip'] eq 1}checked{/if}>
                                打开
                            </label>
                            <label>
                                <input type="radio" name="Tip" id="optionsRadios1" value="0" {if $config['Tip'] neq 1}checked{/if}>
                                关闭
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="inputPassword3" class="col-sm-2 control-label">Footer</label>
                    <div class="col-sm-10">
                        <div class="radio">
                            <label>
                                <input type="radio" name="Footer" id="optionsRadios1" value="1" {if $config['Footer'] eq 1}checked{/if}>
                                打开
                            </label>
                            <label>
                                <input type="radio" name="Footer" id="optionsRadios1" value="0" {if $config['Footer'] neq 1}checked{/if}>
                                关闭
                            </label>
                        </div>
                    </div>
                </div>




                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">提交</button>
                    </div>
                </div>

            </form>



</div>
</div>