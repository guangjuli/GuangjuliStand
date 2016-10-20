<form class="form-horizontal" method="post" action="/man/?setup/html/list">

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h5>Adsdata</h5>
            </div>
        </div>
        <div class="col-md-4 ">

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="inputEmail3">Adsdata_data : </label>
                    <textarea name="ListDataAds" class="form-control" rows="20">{$ListDataAds}</textarea>
                    <p class="help-block">数据接口 测试 : http://my.so/addons/?aaddss</p>
                </div>
            </div>


        </div>
        <div class="col-md-4 ">

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="inputEmail3">Adsdata_html : </label>
                    <textarea name="ListDataAdshtml" class="form-control" rows="20">{$ListDataAdshtml}</textarea>

                </div>
            </div>

        </div>
        <div class="col-md-4 ">

            <div class="form-group">
                <div class="col-sm-12">
                    <label for="inputEmail3">Adsdata_widget : </label>
                    <textarea name="ListDataAdswidget" class="form-control" rows="20">{$ListDataAdswidget}</textarea>

                </div>
            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h5>数据源设置</h5>
            </div>
        </div>

        <div class="col-md-6 ">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="inputEmail3">Data : </label>
                    <textarea name="ListDataadsApplication" class="form-control" rows="10">{$ListDataadsApplication}</textarea>
                    <p class="help-block">调用 : application('data')->get($key)</p>
                </div>
            </div>




        </div>
        <div class="col-md-6 ">
            <div class="form-group">
                <div class="col-sm-12">
                    <label for="inputEmail3">Config : </label>
                    <textarea name="ListDataadsConfig" class="form-control" rows="10">{$ListDataadsConfig}</textarea>
                    <p class="help-block">调用 : config($key)</p>
                </div>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                    <input type="hidden" name="groupId" value="{$row['groupId']}">
                    <button type="submit" class="btn btn-primary">修改</button>
            </div>
        </div>
    </div>


</form>



