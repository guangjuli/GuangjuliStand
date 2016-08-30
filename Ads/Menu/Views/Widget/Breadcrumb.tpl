<ol class="breadcrumb">
    {if $menu_breadcrumb['top']}
        <li><span class="{$menu_breadcrumb['top']['icon']}"></span> <a href="{$menu_breadcrumb['top']['path']}">{$menu_breadcrumb['top']['title']}</a></li>
    {/if}
    {if $menu_breadcrumb['parent']}
        <li><span class="{$menu_breadcrumb['parent']['icon']}"></span> <a href="{$menu_breadcrumb['parent']['path']}">{$menu_breadcrumb['parent']['title']}</a></li>
    {/if}
    {if $menu_breadcrumb['menu']}
        <li class="active"><span class="{$menu_breadcrumb['menu']['icon']}"></span> <a >{$menu_breadcrumb['menu']['title']}</a></li>
    {/if}
</ol>