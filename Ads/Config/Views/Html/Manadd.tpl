<div class="row">
    <form class="form-horizontal" method="post" action="/man/?config/html/add" accept-charset="utf-8">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">配置名称</label>
                <div class="col-sm-10">
                    <input name="name" value="" class="form-control" placeholder="配置名称">
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type">
                        {foreach from=$type key=key item=item}
                            <option value="{$key}">{$item}</option>
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="group" class="col-sm-2 control-label">分组</label>
                <div class="col-sm-10">
                    <select class="form-control" name="group">
                        {foreach from=$group key=key item=item}
                            <option value="{$key}">{$item}</option>
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">说明</label>
                <div class="col-sm-10">
                    <input name="title" value="" class="form-control" placeholder="说明">
                </div>
            </div>

            <div class="form-group">
                <label for="remark" class="col-sm-2 control-label">解释</label>
                <div class="col-sm-10">
                    <input  name="remark" value="" class="form-control" placeholder="解释">
                </div>
            </div>

            <div class="form-group">
                <label for="extra" class="col-sm-2 control-label">可选值</label>
                <div class="col-sm-10">
                    <textarea  name="extra" rows="5" class="form-control" placeholder="可选值"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="value" class="col-sm-2 control-label">值</label>
                <div class="col-sm-10">
                    <textarea  name="value" rows="5" class="form-control" placeholder="值"></textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="" class="form-control" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1">
                            打开
                        </label>
                        <label>
                            <input type="radio" name="status" value="0">
                            关闭
                        </label>
                    </div>
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
