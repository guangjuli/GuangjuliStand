<ol class="breadcrumb">
    {if $adminBreadcrumb['breadcrumbtop'] eq '' && $adminBreadcrumb['breadcrumb'] eq ''}
        <li class="active"><span class="glyphicon glyphicon-home"></span> <a href="/">Home</a></li>
        <li class="active">{$adminBreadcrumb['title']}</li>
    {else}
        <li><span class=" glyphicon glyphicon-home"></span> <a href="/">Home</a></li>
        {if $adminBreadcrumb['breadcrumbtop'] neq ''}
            {if $adminBreadcrumb['breadcrumbtop']['path'] neq '/home/index'}
            <li><a href="{$adminBreadcrumb['breadcrumbtop']['path']}">{$adminBreadcrumb['breadcrumbtop']['title']}</a></li>
            {/if}
        {/if}
        {if $adminBreadcrumb['breadcrumb'] neq ''}
            {if $adminBreadcrumb['breadcrumb']['path'] neq '/home/index'}
            <li><a href="{$adminBreadcrumb['breadcrumb']['path']}">{$adminBreadcrumb['breadcrumb']['title']}</a></li>
            {/if}
        {/if}
        <li class="active">{$adminBreadcrumb['title']}</li>
    {/if}
</ol>