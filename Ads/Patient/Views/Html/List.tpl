
<!-- content -->
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>用户Id</th>
            <th>真实姓名</th>
            <th>性别</th>
            <th>年龄</th>
            <th>地址</th>
            <th>手机号</th>
            <th>血压</th>
            <th>心电</th>
            <th>腕表</th>
            <th>排序</th>
            <th>active</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['userInfoId']}</td>
                    <td>{$item['userId']}</td>
                    <td>{$item['trueName']}</td>
                    <td>{if $item['gender'] eq 1}男{else}女{/if}</td>
                    <td>{$item['age']}</td>
                    <td>{$item['addr']}</td>
                    <td>{$item['login']}</td>
                    <td>{if $item['bloodpress'] eq 1}使用{else}*{/if}</td>
                    <td>{if $item['ecg'] eq 1}使用{else}*{/if}</td>
                    <td>{if $item['watch'] eq 1}使用{else}*{/if}</td>
                    <td>{$item['sort']}</td>
                    <td>{$item['active']}</td>
                    <td>
                        <a href="/man/?patient/html/detail&userId={$item['userId']}&patientId={$item['userId']}">详情</a>
                        <a href="/man/?patient/html/edit&userId={$item['userId']}">修改</a>
                        <a class="shamget" rel="/man/?patient/html/delete&id={$item['userInfoId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-6 ">
    </div>
</div>


