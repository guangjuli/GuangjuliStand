<!-- content -->
<div class="row">
    <div class="col-md-12 ">
        <!-- content -->

        <ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
            {foreach from=$_g key=key item=item}
            <li {if $smarty.get.group eq $key}class="active"{/if} role="presentation">
                <a href="/man/?config/html/list&group={$key}">
                    <span class=""></span>
                    {$item}
                </a>
            </li>
            {/foreach}
        </ul>

<h2>配置</h2>
{if $smarty.get.group neq 0 && $smarty.get.group neq ''}
        <form class="form-horizontal" method="post" action="/man/?config/html/list">
            {foreach from = $_list key=key item =item}
                {$item}
            {/foreach}
            <div class="form-group class="col-sm-12">
                <input name='group' value='{$smarty.get.group}' type="hidden">
                <button type="submit" class="btn btn-default">Submit</button>
            </div>
        </form>
{/if}

    </div>


</div>



