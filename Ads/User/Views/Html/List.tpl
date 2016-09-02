
<!-- content -->
<div class="row">
    <div class="col-md-6">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>用户组</th>
            <th>登录名</th>
            <th>密码</th>
            <th>昵称</th>
            <th>描述</th>
            <th>状态</th>
            <th>排序</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['userId']}</td>
                    <td>{if !empty($group[$item['groupId']])}{$group[$item['groupId']]}{else}{$item['groupId']}{/if}</td>
                    <td>{$item['login']}</td>
                    <td>{$item['password']}</td>
                    <td>{$item['nickName']}</td>
                    <td>{$item['des']}</td>
                    <td>{$item['active']}</td>
                    <td>{$item['sort']}</td>
                    <td>
                        <a href="/man/?user/html/edit&userId={$item['userId']}">修改</a>
                        <a class="shamget" rel="/man/?user/html/delete&userId={$item['userId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


