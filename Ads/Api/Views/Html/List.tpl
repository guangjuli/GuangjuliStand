<link href="/assets/css/table.css" rel="stylesheet">
<script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#dt1').dataTable({
            "aaSorting": [[ 0, "desc" ]],
            "aLengthMenu": [[30, 50, -1], [30, 50, "All"]],
            "iDisplayLength":50,			//一页多少条
            "bAutoWidth": true,	//自动宽度
            "bStateSave": true,
            "bLengthChange": true, //改变每页显示数据数量

            "oLanguage": {
                "sLengthMenu": "每页显示 _MENU_ 条记录",
                "sZeroRecords": "抱歉， 没有找到",
                "sInfo": "从 _START_ 到 _END_ /共 _TOTAL_ 条数据",
                "sInfoEmpty": "没有数据",
                "sInfoFiltered": "(从 _MAX_ 条数据中检索)",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "前一页",
                    "sNext": "后一页",
                    "sLast": "尾页"
                },
                "sZeroRecords": "没有检索到数据",
                "sProcessing": "<img src='./loading.gif' />"
            }
        });
    });
</script>

<table class="table table-striped table-hover" id="dt1">
                <thead>
                <th>Id</th>
                <th>版本</th>
                <th>Type</th>
                <th>Api</th>
                <th>Title</th>
                <th>Active</th>
                <th width="150">操作</th>
                </thead>
                <tbody>
                {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['id']}</td>
                    <td>{$item['v']}</td>
                    <td>{$item['type']}</td>
                    <td><a href="/man/?/api/html/log&id={$item['id']}">{$item['api']}</a></td>
                    <td>{$item['title']}</td>
                    <td>
                       {if $item['active'] eq 1}
                           <span class="label label-default">打开</span>
                       {else}
                           <span class="label label-danger">关闭</span>
                       {/if}
                    </td>
                    <td>
                        <a href="/man/?/api/html/log&id={$item['id']}">日志</a>
                        <a href="/man/?/api/html/edit&id={$item['id']}">修改</a>
                        <a class="shamget" rel="/man/?/api/html/delete&id={$item['id']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
                {/foreach}
                </tbody>
            </table>
