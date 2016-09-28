
<!-- content -->
<div class="row">
    <div class="col-md-7">
        <table class="table table-striped table-hover" id="dt1">
            <thead>
            <th>ID</th>
            <th>login</th>
            <th>Token</th>
            <th>用户类型</th>
            <th>有效性</th>
            </thead>
            <tbody>
            {foreach from=$list key=$key item=$item}
                <tr>
                    <td>{$item['tokenId']}</td>
                    <td>{$user[$item['userId']]}</td>
                    <td>{$item['accessToken']}</td>
                    <td>{$item['type']}</td>
                    <td>{$item['expireIn']}</td>
                </tr>
            {/foreach}
            </tbody>
        </table>
    </div>
    <div class="col-md-5">

    </div>
</div>
