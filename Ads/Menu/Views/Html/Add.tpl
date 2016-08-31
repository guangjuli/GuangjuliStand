<div class="row">
    <form class="form-horizontal" method="post" action="/man/?menu/html/add">
        <div class="col-md-6 ">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">title</label>
                <div class="col-sm-10">
                    <input name="title" value="{$row['title']}" class="form-control"  placeholder="名称">
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">parentId</label>
                <div class="col-sm-10">
                    <select class="form-control" name="parentId">
                        {foreach from=$option key=key item=item}
                            <option value="{$key}" {if $row['parentId'] eq $key}selected="selected"{/if}>{$item}</option>
                        {/foreach}
                    </select>

                </div>
            </div>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">ads</label>
                <div class="col-sm-10">
                    <input  name="ads" value="{$row['ads']}" class="form-control"  placeholder="资源ads">
                </div>
            </div>


            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">icon</label>
                <div class="col-sm-10">
                    <input name="icon" value="{$row['icon']}" class="form-control"  placeholder="图标">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">sort</label>
                <div class="col-sm-10">
                    <input  name="sort" value="{$row['sort']}" class="form-control"  placeholder="排序">
                </div>
            </div>


            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">package</label>
                <div class="col-sm-10">
                    <input  name="package" value="{$row['package']}" class="form-control"  placeholder="package">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">des</label>
                <div class="col-sm-10">
                    <input  name="des" value="{$row['des']}" class="form-control"  placeholder="描述">
                </div>
            </div>




            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">hidden</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="hidden"  value="1" {if $row['hidden'] eq 1}checked{/if}>
                            隐藏
                        </label>
                        <label>
                            <input type="radio" name="hidden"  value="0" {if $row['hidden'] neq 1}checked{/if}>
                            显示
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
