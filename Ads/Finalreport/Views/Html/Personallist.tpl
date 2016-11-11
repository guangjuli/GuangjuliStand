<link href="/assets/css/table.css" rel="stylesheet">
<script type="text/javascript" src="/assets/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#dt2').dataTable({
            "aaSorting": [[ 0, "desc" ]],
            "aLengthMenu": [[30, 50, -1], [30, 50, "All"]],
            "iDisplayLength":50,			//一页多少条
            "bAutoWidth": true,	//自动宽度
            "bStateSave": false,
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
<!-- content -->
<div class="row">
    <div class="col-md-8">
        <table class="table table-striped table-hover" id="dt2">
            <thead>
            <th>ID</th>
            <th>时间</th>
            <th>项目</th>
            <th>总结报告</th>
            <th>操作</th>
            </thead>
            <tbody>
            {foreach from=$data key=$key item=$item}
                <tr>
                    <td>{$item['reportId']}</td>
                    <td>{$item['time']}</td>
                    <td>{$item['project']}</td>
                    <td>{$item['Finalreport']}</td>
                    <td>
                        <a href="/man/?Finalreport/html/detail&reportId={$item['reportId']}">详情</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-3 ">
        {widget ads='patient/userinfo/Getpatientinfo'}
    </div>
</div>


