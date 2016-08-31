<ul class="nav nav-sidebar">
    {foreach from=$menu_navleft key=key item=item}
        <li {if $item['active'] neq 0}class="active"{/if}><a href="{$item['path']}"><span class="{$item['icon']}" ></span> {$item['title']}</a></li>
    {/foreach}
</ul>
