<ul class="nav nav-sidebar">
    {foreach from=$menuleft key=key item=item}
        <li {if $item['active'] neq 0}class="active"{/if}><a href="{$item['path']}">{$item['title']}</a></li>
    {/foreach}
</ul>
