<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">ADM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
{foreach from=$menuhead key=key item=item}
                <li {if $item['active'] neq 0}class="active"{/if}><a href="{$item['path']}">{$item['title']}</a></li>
{/foreach}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        管理员 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="/login/logout">退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>