<ul class="nav nav-tabs" role="tablist" style="margin: 0px 0px 10px 0px;">
    {foreach from=$menu_navlevelthree key=key item=item}
        {if $item['hidden'] neq 1}
            <li role="presentation" {if $item['active'] neq 0}class="active"{/if}><a href="{$item['path']}"><span class="{$item['icon']}" ></span> {$item['title']}</a></li>
        {/if}
    {/foreach}
</ul>
