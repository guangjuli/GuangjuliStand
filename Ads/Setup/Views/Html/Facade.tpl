<!-- content -->
<form class="form-horizontal" method="post" action="/man/?config/html/list">

    <div class="row">
        <div class="col-md-12 ">
            <!-- content -->
            <ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
                {foreach from=$chrlist key=key item=item}
                    <li {if $smarty.get.chr eq $item}class="active"{/if} role="presentation">
                        <a href="/man/?setup/html/facade&chr={$item}">
                            {$item}
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <h2>配置</h2>
            neirong
            <hr>
        </div>
    </div>


<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <input type="hidden" name="groupId" value="{$row['groupId']}">
            <button type="submit" class="btn btn-primary">修改</button>
        </div>
    </div>
</div>


</form>






