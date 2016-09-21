<!-- content -->
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped table-hover" id="dt2">
            <thead>
            <th>ID</th>
            <th>用户id</th>
            <th>登录名</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>所属机构</th>
            <th>科室</th>
            <th>职称</th>
            <th>描述</th>
            <th>状态</th>
            <th>排序</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['doctorId']}</td>
                    <td>{$item['userId']}</td>
                    <td>{$item['login']}</td>
                    <td>{$item['trueName']}</td>
                    <td>{if $item['gender'] eq 1}男{else}女{/if}</td>
                    <td>{$item['age']}</td>
                    <td>{$org[$item['orgId']]}</td>
                    <td>{$item['office']}</td>
                    <td>{$item['jobTitle']}</td>
                    <td>{$item['des']}</td>
                    <td>{$item['active']}</td>
                    <td>{$item['sort']}</td>
                    <td>
                        <a href="/man/?doctor/html/edit&userId={$item['userId']}">修改</a>
                        <a class="shamget" rel="/man/?doctor/html/delete&userId={$item['userId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


