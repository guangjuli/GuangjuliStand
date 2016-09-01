
<!-- content -->
<div class="row">
    <div class="col-md-6">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>设备类型</th>
            <th>描述</th>
            <th>排序</th>
            <th>状态</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['deviceTypeId']}</td>
                    <td>{$item['type']}</td>
                    <td>{$item['des']}</td>
                    <td>{$item['sort']}</td>
                    <td>{$item['active']}</td>
                    <td>
                        <a href="/man/?devicetype/html/edit&deviceTypeId={$item['deviceTypeId']}">修改</a>
                        <a class="shamget" rel="/man/?devicetype/html/delete&deviceTypeId={$item['deviceTypeId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


