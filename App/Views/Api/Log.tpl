<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Admin Data Manage</title>
    <link href="/assets/bootstrap-3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/color.css" rel="stylesheet">
    <link href="/assets/css/dashboard.css" rel="stylesheet">
    <link href="/assets/css/table.css" rel="stylesheet">
</head>
<body>

{widget name='adminNav'}

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            {widget name='adminNavLeft'}
        </div>
        <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Breadcrumb -->
            {widget name='adminBreadcrumb'}
            <!-- Tip -->
            {widget name='adminTip'}
            <!-- menuthree -->
            {widget name='adminLevelthree'}

            <div style="margin: 0px 0px 20px 0px;"></div>
            <!-- content -->
            <div class="row">
                <div class="col-md-4 ">
                    <table class="table table-striped table-hover" id="dt1">
                        <thead>
                        <th>api</th>
                        <th>title</th>
                        </thead>
                        <tbody>
                        {foreach from=$list key=$key item=$item}
                            <tr>
                                <td>
                                    {if $item['type'] eq 'POST'}
                                        <span class="label label-default">{$item['type']}</span> <a href="?id={$item['apiId']}">/{$item['v']}/{$item['api']}</a>
                                    {else}
                                        <span class="label label-danger">{$item['type']}</span> <a href="?id={$item['apiId']}">/{$item['v']}/{$item['api']}</a>
                                    {/if}
                                </td>
                                <td>{$item['title']}</td>
                            </tr>
                        {/foreach}
                        </tbody>
                    </table>
                </div>
                <div class="col-md-8 ">
                    <div class="row">
                        {widget name='apiView'}
                    </div>

                </div>
            </div>
            <!-- 内容 -->
            {widget name='adminFooter'}
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="/assets/js/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/assets/js/Sham.js"></script>

<!-- Table -->
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
<script type="text/javascript">
    $(document).ready(function(e) {
    });
</script>
</body>
</html>
