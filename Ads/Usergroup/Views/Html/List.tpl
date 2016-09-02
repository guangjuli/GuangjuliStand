
<!-- content -->
<div class="row">
    <div class="col-md-9">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>组名</th>
            <th>chr</th>
            <th>描述</th>
            <th>排序</th>
            <th>active</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['groupId']}</td>
                    <td>{$item['groupName']}</td>
                    <td>{$item['groupChr']}</td>
                    <td>{$item['des']}</td>
                    <td>{$item['sort']}</td>
                    <td>{$item['active']}</td>
                    <td>
                        <a href="/man/?usergroup/html/edit&id={$item['groupId']}">修改</a>
                        <a class="shamget" rel="/man/?usergroup/html/delete&id={$item['groupId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


