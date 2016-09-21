<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/man/">ADM</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-left">
                {foreach from=$menu_nav key=key item=item}
                    <li {if $item['active'] neq 0}class="active"{/if}><a href="{$item['path']}"><span class="{$item['icon']}" aria-hidden="true"></span> {$item['title']}</a></li>
                {/foreach}
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li role="presentation" class="dropdown">
                    <a class="dropdown-toggle " data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                       <span class="glyphicon glyphicon-user"></span> 管理员 <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="?/pm/html/list"><span class=" glyphicon glyphicon-th-list" ></span> 管理</a></li>

                        <li><a href="#"><span class="glyphicon glyphicon-menu-hamburger" ></span> Help</a></li>

                        <li><a href="/man/logout"><span class="glyphicon glyphicon-off" ></span> 退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
{$irones}
{$name}
