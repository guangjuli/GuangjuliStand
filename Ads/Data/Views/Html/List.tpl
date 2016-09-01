<!-- content -->
<div class="row">
    <div class="col-md-6 ">
        <table class="table table-hover" id="dt1">
            <tbody>
                <tr>
                    <td>{$item['title']}</td>
                    <td>[{$item['ads']}]</td>
                    <td>
                        <a href="/man/?menu/html/edit&topid={$smarty.get.topid}&parentid={$smarty.get.parentid}&id={$item['menuId']}">修改</a>
                        <a class="shamget" rel="/man/res?menu/html/delete&topid={$smarty.get.topid}&parentid={$smarty.get.parentid}&id={$item['menuId']}" comfirm="是否删除?">删除</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="col-md-6 ">
    </div>

</div>



