
<!-- content -->
<div class="row">
    <div class="col-md-9">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>登录名</th>
            <th>姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>地址</th>
            <th>病例总计</th>
            <th>排序</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['userId']}</td>
                    <td>{$item['login']}</td>
                    <td>{$item['trueName']}</td>
                    <td>{if $item['gender'] eq 1}男{else}女{/if}</td>
                    <td>{$item['age']}</td>
                    <td>{$item['addr']}</td>
                    <td>{$item['num']}</td>
                    <td>{$item['sort']}</td>
                    <td>
                        <a href="/man/?cases/html/detail&id={$item['userId']}&patientId={$item['userId']}">详情</a>
                        <a class="shamget" rel="/man/?cases/html/listdelete&id={$item['userId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


