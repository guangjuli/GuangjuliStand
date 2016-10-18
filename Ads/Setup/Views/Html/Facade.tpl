<!-- content -->
<form class="form-horizontal" method="post" action="/man/?setup/html/facade">

    <div class="row">
        <div class="col-md-12 ">
            <!-- content -->
            <ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
                {foreach from=$chrlist key=key item=item}
                    <li {if $smarty.get.type eq $item}class="active"{/if} role="presentation">
                        <a href="/man/?setup/html/facade&type={$item}">
                            {$item}
                        </a>
                    </li>
                {/foreach}
            </ul>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2 col-lg-2 col-sx-2  col-sm-2">
            <ul class="nav nav-sidebar">
                {foreach from=$llist key=key item=item}
                <li {if $item['chr'] eq $smarty.get.chr}class="active"{/if}>
                    <a href="/man/?setup/html/facade&type={$smarty.get.type}&chr={$item['chr']}">{$item['chr']}</a>
                </li>
                {/foreach}
            </ul>
        </div>
        <div class="col-md-5 col-lg-5 col-sx-5  col-sm-5">

            {if $row neq ''}

            <div class="form-group">

                <div class="col-sm-6">
                    <label for="inputEmail3" class="control-label">CHR</label>
                    <input name="chr" value="{$row['chr']}" class="form-control" placeholder="CHR" readonly>

                    <input type="hidden"  name="type" value="{$row['type']}" class="form-control" placeholder="CHR" readonly>
                    <input type="hidden" name="id" value="{$row['id']}">

                    <small>
                        数据源 :<span class="gray">WEB_KEYWORD{$row['chr']}</span>
                    </small>
                </div>
                <div class="col-sm-6">
                    <label for="inputEmail3" class="control-label">引用</label>
                    <input name="facede" value="{$row['facede']}" class="form-control" placeholder="引用">
                    <small>
                        <span class="red">调用</span> :<span class="gray">fc('WEB_KEYWORD',$params)</span>
                    </small>
                </div>

                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">检索</label>
                    <input name="keywords" value="{$row['keywords']}" class="form-control" placeholder="关键词">
                    <small>
                        <span class="gray">用于检索 分割符号";"</span>
                    </small>
                </div>

                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">描述</label>
                    <textarea class="form-control" rows="3" placeholder="描述" name="des">{$row['des']}</textarea>
                </div>

                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">缓存</label>
                    <div class="radio">
                        <label>
                            <input type="radio" name="cache" value="1" {if $row['cache'] eq 1}checked{/if}>
                            打开
                        </label>
                        <label>
                            <input type="radio" name="cache" value="0" {if $row['cache'] neq 1}checked{/if}>
                            关闭
                        </label>
                    </div>
                </div>
                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">缓存时间</label>
                    <input name="expire" value="{$row['expire']}" class="form-control" placeholder="缓存时间">
                    <small>
                        <span class="gray">单位 :秒</span>
                    </small>
                </div>
                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">参数</label>
                    <input name="params" value="{$row['params']}" class="form-control" placeholder="参数">
                    <small>
                        <span class="gray">参数的说明</span>
                    </small>
                </div>
                <div class="col-sm-12">
                    <label for="inputPassword3" class="control-label">参数模拟</label>
                    <textarea name="plike" class="form-control" rows="3" placeholder="参数模拟">{$row['plike']}</textarea>
                    <small>
                        <span class="gray">输入模拟的参数,可以查看输出的数据</span>
                    </small>
                </div>
            </div>



            <div class="form-group">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-default">更新</button>
                    <a href="/man/?setup/html/facade&type={$smarty.get.type}&chr={$smarty.get.chr}&io=demo" class="btn btn-info">模拟输出</a>
                </div>
            </div>

            {/if}
        </div>
        <div class="col-md-5 col-lg-5 col-sx-5  col-sm-5">

            {if $smarty.get.io eq 'demo'}

            <h3>参数</h3>
            <small>
                <span class="gray">{$row['params']}</span> -> <span class="blue">调用
                    {if $row['plike'] neq ''}
                        fc("{$row['facede']}",$params})
                    {else}
                        fc("{$row['facede']}"})
                    {/if}
                </span>
            </small>

            <pre>{$_params}</pre>

            <h3>结果集</h3>
            <pre>{$rc}</pre>
            {/if}
        </div>
    </div>




</form>






