<!-- content -->
<div class="row">
    <div class="col-md-4">
        <table class="table table-hover" id="dt1">
            <tbody>
            {foreach from=$toplist key=$key item=$item}
                <tr {if $item['menuId'] eq $smarty.get.topid}class="info"{/if}>
                    <td><a href="/man/?menu/html/list&topid={$item['menuId']}">{$item['title']}</a></td>
                    <td>[{$item['ads']}]</td>
                    <td>
                        <a href="/man/?menu/html/edit&id={$item['menuId']}">修改</a>
                        <a class="shamget" rel="/man/?menu/html/delete&id={$item['menuId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
     </div>
    <div class="col-md-4">
    {if $smarty.get.topid neq ''}
        <table class="table table-hover" id="dt1">
            <tbody>
            {foreach from=$seclist key=$key item=$item}
                <tr {if $item['menuId'] eq $smarty.get.parentid}class="info"{/if}>
                    <td><a href="/man/?menu/html/list&topid={$smarty.get.topid}&parentid={$item['menuId']}">{$item['title']}</a></td>
                    <td>[{$item['ads']}]</td>
                    <td>
                        <a href="/man/?menu/html/edit&topid={$smarty.get.topid}&id={$item['menuId']}">修改</a>
                        <a class="shamget" rel="/man/?menu/html/delete&topid={$smarty.get.topid}&id={$item['menuId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    {/if}
    </div>
    <div class="col-md-4 ">
        {if $smarty.get.parentid neq ''}
            <table class="table table-hover" id="dt1">
                <tbody>
                {foreach from=$list key=$key item=$item}
                    <tr>
                        <td>{$item['title']}</td>
                        <td>[{$item['ads']}]</td>
                        <td>
                            <a href="/man/?menu/html/edit&topid={$smarty.get.topid}&parentid={$smarty.get.parentid}&id={$item['menuId']}">修改</a>
                            <a class="shamget" rel="/man/?menu/html/delete&topid={$smarty.get.topid}&parentid={$smarty.get.parentid}&id={$item['menuId']}" comfirm="是否删除?">删除</a>
                        </td>
                    </tr>
                {/foreach}
                </tbody>
            </table>
        {/if}
    </div>
</div>



