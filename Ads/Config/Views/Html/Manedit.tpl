<div class="row">
    <form class="form-horizontal" method="post" action="/man/?config/html/edit" accept-charset="utf-8">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">配置名称</label>
                <div class="col-sm-10">
                    <input name="name" value="{$row['name']}" class="form-control" placeholder="配置名称">
                </div>
            </div>

            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">类型</label>
                <div class="col-sm-10">
                    <select class="form-control" name="type">
                        {foreach from=$type key=key item=item}
                            <option value="{$key}" {if $row['type'] eq $key}selected="selected"{/if}>{$item}</option>
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="group" class="col-sm-2 control-label">分组</label>
                <div class="col-sm-10">
                    <select class="form-control" name="group">
                        {foreach from=$group key=key item=item}
                            <option value="{$key}" {if $row['group'] eq $key}selected="selected"{/if}>{$item}</option>
                        {/foreach}
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="title" class="col-sm-2 control-label">说明</label>
                <div class="col-sm-10">
                    <input name="title" value="{$row['title']}" class="form-control" placeholder="说明">
                </div>
            </div>

            <div class="form-group">
                <label for="remark" class="col-sm-2 control-label">解释</label>
                <div class="col-sm-10">
                    <input  name="remark" value="{$row['remark']}" class="form-control" placeholder="解释">
                </div>
            </div>

            <div class="form-group">
                <label for="extra" class="col-sm-2 control-label">可选值</label>
                <div class="col-sm-10">
                    <textarea  name="extra" rows="5" class="form-control" placeholder="可选值">{$row['extra']}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="value" class="col-sm-2 control-label">值</label>
                <div class="col-sm-10">
                    <textarea  name="value" rows="5" class="form-control" placeholder="值">{$row['value']}</textarea>
                </div>
            </div>

            <div class="form-group">
                <label for="sort" class="col-sm-2 control-label">排序</label>
                <div class="col-sm-10">
                    <input  name="sort" value="{$row['sort']}" class="form-control" placeholder="排序">
                </div>
            </div>

            <div class="form-group">
                <label for="status" class="col-sm-2 control-label">状态</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="status" value="1" {if $row['status'] eq 1}checked{/if}>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="status" value="0"  {if $row['status'] neq 1}checked{/if}>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="{$row['id']}">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>

    </form>
</div>
