
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
    <div class="col-md-5 ">
        <form  method="post" action="/man/?token/html/search" id="searchForm">
            <div class="row"  style="margin-left: 20px;">
                <div class=" col-md-4 search">
                    <input type="text" name="value" class="form-control">
                </div>
                <div class=" col-md-7 search">
                    <div class="col-md-4 search">
                        <select class="form-control" name="table">
                            <option value="patient">患者</option>
                            <option value="doctor">医生</option>
                        </select>
                    </div>
                    <div class="col-md-4 search">
                        <select class="form-control" name="option">
                            <option value="login">login</option>
                            <option value="trueName">姓名</option>
                        </select>
                    </div>
                    <div class="col-md-2 btn btn-primary" id="search">查询</div>
                </div>
            </div>
        </form>
        <div id="searchTable">

        </div>
        <table class="table table-striped table-hover" id="dt2">
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
</div>
{literal}
<style>
    .search{padding-left: 0; padding-right: 0}
</style>
{/literal}
<script type="text/javascript">
    $(document).ready(function(){
        $('#search').click(function(){
            var tag = '#searchForm';
            $.ajax({
                type: "POST",
                url: $(tag).attr("action"),
                data: $(tag).serialize(),
                dataType:'json',
                success: function(data){
                    if(data.code==200){
                        $('#searchTable').text('<table class="table table-striped table-hover" id="dt2">' +
                                '<thead><th>ID</th><th>login</th><th>Token</th> <th>用户类型</th><th>有效性</th></thead><tbody id="searchContent">');
                        var msg = eval(data.msg);
                        for( var o in msg){
                            for(var oo in msg[o]['tokenInfo']){
                                $('#searchContent').text('<tr>' +
                                        '<td>'+msg[o][oo]["tokenId"]+'</td>'+
                                        '<td>'+msg[o]["userInfo"][msg[o][oo]["userId"]]+'</td>'+
                                        '<td>'+msg[o][oo]["accessToken"]+'</td>'+
                                        '<td>'+msg[o][oo]["type"]+'</td>'+
                                        '<td>'+msg[o][oo]["expireIn"]+'</td></tr>');
                            }
                        }
                    }
                },
                error : function() {
                    alert("异常！");
                }
            });
        })
    })
</script>

