<ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
    <li class="active" role="presentation">
        <a href="/man/?/pm/html/index">
            <span class="glyphicon glyphicon-home"></span>
            列表
        </a>
    </li>
    <li role="presentation">
        <a href="/man/?/pm/html/setup">
            <span class="glyphicon glyphicon-home"></span>
            设置
        </a>
    </li>
</ul>


<div class="row">
    <div class="col-md-12" >

        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>本地查看</th>
            <th>远程信息</th>
            <th>状态</th>
            <th>操作</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item}</td>
                    <td>
                        <a class="shamboxnl" rel="/?/pm/read/readme&chr={$item}">Readme</a>
                        <a class="shamboxnl" rel="/?/pm/read/Help&chr={$item}">Help</a>
                        <a class="shamboxnl" rel="/?/pm/read/Api&chr={$item}">Api</a>
                        -
                        <a class="shamboxnl" rel="/?/pm/read/Installsql&chr={$item}">Install.sql</a>
                        <a class="shamboxnl" rel="/?/pm/read/UnInstallsql&chr={$item}">UnInstall.sql</a>
                         -
                        <a class="shamboxnl" rel="/?/pm/read/Menu&chr={$item}">Menu</a>
                        <a class="shamboxnl" rel="/?/pm/read/Depend&chr={$item}">Depend</a>
                        <a class="shamboxnl" rel="/?/pm/read/Dependtable&chr={$item}">Dependtable</a>

                        <a class="shamboxnl" rel="/?/pm/read/Version&chr={$item}">Version</a>

                    </td>
                    <td>
                        View
                    </td>
                    <td>
                        <span class="label {if $file[$item]}label-primary{/if}">Lock</span>
                        <span class="label label-info">File</span>
                    </td>
                    <td>
下载 安装 卸载 安装菜单
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>

    </div>
</div>