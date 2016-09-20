
<!-- content -->
<div class="row">
    <div class="col-md-9">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>机构名</th>
            <th>机构地址</th>
            <th>描述</th>
            <th>排序</th>
            <th>active</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['orgId']}</td>
                    <td>{$item['orgName']}</td>
                    <td>{$item['orgAddr']}</td>
                    <td>{$item['des']}</td>
                    <td>{$item['sort']}</td>
                    <td>{$item['active']}</td>
                    <td>
                        <a href="/man/?organization/html/edit&id={$item['orgId']}">修改</a>
                        <a class="shamget" rel="/man/?organization/html/delete&id={$item['orgId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


