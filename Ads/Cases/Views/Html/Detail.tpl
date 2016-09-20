
<!-- content -->
<div class="row">
    <div class="col-md-9">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>就诊医院</th>
            <th>医院地址</th>
            <th>开始时间</th>
            <th>结束时间</th>
            <th>排序</th>
            <th width="150">操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['caseId']}</td>
                    <td>{$organization[$item['orgId']]['orgName']}</td>
                    <td>{$organization[$item['orgId']]['orgAddr']}</td>
                    <td>{$item['beginTime']}</td>
                    <td>{$item['endTime']}</td>
                    <td>{$item['sort']}</td>
                    <td>
                        <a href="/man/?cases/html/detail&id={$item['caseId']}">详情</a>
                        <a href="/man/?cases/html/edit&caseId={$item['caseId']}&userId={$item['userId']}">修改</a>
                        <a class="shamget" rel="/man/?cases/html/delete&id={$item['caseId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-3 ">

    </div>
</div>


