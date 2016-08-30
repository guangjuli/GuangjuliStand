
<!-- content -->
<div class="row">
    <div class="col-md-3 ">
        <table class="table table-hover" id="dt1">
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['menuId']} : {$item['title']}</td>
                    <td>{$item['groupName']}</td>
                    <td>
                        <a href="/man/?usergroup/html/edit&id={$item['groupId']}">修改</a>
                        <a class="shamget" rel="/man/res?usergroup/html/delete&id={$item['groupId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            {/foreach}
            </tbody>
        </table>
     </div>
    <div class="col-md-3 ">

    </div>
    <div class="col-md-4 ">

    </div>
</div>



