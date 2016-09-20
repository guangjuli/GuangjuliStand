
<!-- content -->
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>名称</th>
            <th width="80">类型</th>
            <th width="80">分组</th>
            <th>说明</th>
            <th>解释</th>
            <th>值选择范围</th>
            <th>值</th>
            <th width="80">状态</th>
            <th width="80">排序</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['id']}</td>
                    <td>{$item['name']}</td>
                    <td>{$item['type']}</td>
                    <td>{$item['group']}</td>
                    <td>{$item['title']}</td>
                    <td>{$item['remark']}</td>
                    <td>{$item['extra']}</td>
                    <td>{$item['value']}</td>
                    <td>{$item['status']}</td>
                    <td>{$item['sort']}</td>
                    <td>
                        <a href="/man/?config/html/edit&id={$item['id']}">修改</a>
                        <a class="shamget" rel="/man/?config/html/delete&id={$item['id']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


