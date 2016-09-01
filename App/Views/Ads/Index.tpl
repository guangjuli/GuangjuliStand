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
</head>
<body>


<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/">ADM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="javacript:void(0)"><span aria-hidden="true"></span>列表</a>
                </li>
                <li>
                    <a href="/ads/download"><span aria-hidden="true"></span>下载</a>
                </li>
                <li>
                    <a href="/ads/makezip"><span aria-hidden="true"></span>打包</a>
                </li>
                <li>
                    <a href="/ads/upload"><span aria-hidden="true"></span>发布</a>
                </li>
            </ul>
        </div>
    </div>
</nav>



<div class="container-fluid">
    <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
            <!-- ul class="nav nav-sidebar">
                    <li ><a href=""> 说明</a></li>
            </ul -->

        </div>
        <div class="list-group col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
            <!-- Breadcrumb -->
            <div style="margin: 0px 0px 20px 0px;"></div>


            <table class="table table-striped table-hover">
                <thead>
                <th>功能包</th>
                <th>版本</th>
                <th>名称</th>
                <th>说明</th>
                <th>操作</th>
                </thead>
                {foreach from=$rc key=key item=item}
                    {foreach from=$item key=k item=i}
                        <tr>
                            <td>{$key}</td>
                            <td>{$k}</td>
                            <td>{$i['title']}</td>
                            <td><pre>{$i['des']}</pre></td>
                            <td>
                                {if $i['isdownload'] neq 1}
                                    <a class="shamget" comfirm="下载?" rel="/ads/download/?target={$i['key']}">下载</a>
                                {else}
                                    下载
                                {/if}
                                {if $i['isdownload'] eq 1 && $i['islockfile'] neq 1}
                                    <a class="shamget" rel="/ads/install/?target={$i['key']}">安装</a>
                                {else}
                                    安装
                                {/if}
                                {if $i['islockfile'] eq 1}
                                    <a class="shamget" comfirm="删除操作会造成信息丢失,请谨慎操作" rel="/ads/uninstall/?target={$i['key']}">卸载</a>
                                {else}
                                    卸载
                                {/if}

                                {if $i['islockfile'] eq 1}
                                    <a class="shamboxnl" title="设置" rel="/ads/setup/?target={$i['key']}">设置</a>
                                {else}
                                    设置
                                {/if}
                                API


                            </td>
                        </tr>
                    {/foreach}
                {/foreach}
            </table>


            <!-- /content -->
        </div>
    </div>
</div>



<!-- Bootstrap core JavaScript -->
<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/assets/js/Sham.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        $('#admintip').on('close.bs.alert', function () {
            alert('1');
        });
        $('#admintip').on('closed.bs.alert', function () {
            alert('2');
        });
    });
</script>
</body>
</html>
