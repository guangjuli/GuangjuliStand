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
                                        <span class="label label-default">{$item['type']}</span> <a href="/man/?/api/html/log&id={$item['id']}">/{$item['v']}/{$item['api']}</a>
                                    {else}
                                        <span class="label label-danger">{$item['type']}</span> <a href="/man/?/api/html/log&id={$item['id']}">/{$item['v']}/{$item['api']}</a>
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
                        {widget ads='api/html/apiview'}
                    </div>

                </div>
            </div>
