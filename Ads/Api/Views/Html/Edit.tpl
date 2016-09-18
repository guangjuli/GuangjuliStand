<div class="row">
    <form class="form-horizontal" method="post" action="/man/?/api/html/edit">
        <div class="col-md-6 ">

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-10">
                    <input name="title" value="{$row['title']}" class="form-control" id="" placeholder="名称">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">版本</label>
                <div class="col-sm-10">
                    <input name="v" value="{$row['v']}" class="form-control" id="" placeholder="版本">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Api</label>
                <div class="col-sm-10">
                    <input  name="api" value="{$row['api']}" class="form-control" id="" placeholder="api">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Type</label>
                <div class="col-sm-10">
                    <select  name="type" multiple class="form-control">
                        <option {if $row['type'] eq 'POST'}selected="selected"{/if}>POST</option>
                        <option {if $row['type'] eq 'GET'}selected="selected"{/if}>GET</option>
                        <option {if $row['type'] eq 'PUT'}selected="selected"{/if}>PUT</option>
                        <option {if $row['type'] eq 'DELETE'}selected="selected"{/if}>DELETE</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-2 control-label">Active</label>
                <div class="col-sm-10">
                    <div class="radio">
                        <label>
                            <input type="radio" name="active" id="" value="1" {if $row['active'] eq 1}checked="checked"{/if}>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="active" id="" value="0" {if $row['active'] neq 1}checked="checked"{/if}>
                            关闭
                        </label>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="hidden" name="id" value="{$smarty.get.id}">
                    <button type="submit" class="btn btn-default">修改</button>
                </div>
            </div>

        </div>
        <div class="col-md-5 ">
            <!-- part1 -->

            <div class="form-group">
                <label for="exampleInputEmail1">说明</label>
                <textarea name="dis" class="form-control" rows="8">{$row['dis']}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">输入 Like</label>
                <textarea name="request" class="form-control" rows="8">{$row['request']}</textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">输出 Like</label>
                <textarea name="response" class="form-control" rows="8">{$row['response']}</textarea>
            </div>

        </div>
    </form>
</div>
