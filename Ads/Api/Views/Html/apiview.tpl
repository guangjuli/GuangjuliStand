{if $smarty.get.id neq ''}

    <ul id="myTabs" class="nav nav-tabs" role="tablist">
        <li class="active" role="presentation">
            <a id="home-tab" aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" href="#home">日志</a>
        </li>
        <li class="" role="presentation">
            <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#profile" aria-expanded="false">信息</a>
        </li>
        <!-- li class="" role="presentation">
            <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#log" aria-expanded="false">模拟</a>
        </li -->

    </ul>
    <div id="myTabContent" class="tab-content">
        <div id="home" class="tab-pane fade active in" aria-labelledby="home-tab" role="tabpanel">



            <h3>日志</h3>
            <table class="table table-striped table-hover">
                <thead>
                <th>时间</th>
                <th>msg</th>
                <th>response.data</th>
                <th>request</th>
                <th></th>
                </thead>
                {foreach from=$apiloglist key=key item=item}
                    <tr>
                        <td>{$item['time']}</td>
                        <td>{$item['code']}:{$item['msg']}</td>
                        <td><pre>{$item['data']}</pre></td>
                        <td>
                            {if $item['_GET'] neq ''}
                                <pre>{$item['_GET']}</pre>
                            {/if}

                            {if $item['_POST'] neq ''}
                                <pre>{$item['_POST']}</pre>
                            {/if}

                            {if $item['_FILE'] neq ''}
                                <pre>{$item['_FILE']}</pre>
                            {/if}

                        </td>
                        <td></td>
                    </tr>
                {/foreach}
            </table>



        </div>

        <div id="profile" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">


            <h3>信息</h3>
            <table class="table table-striped table-hover">
                <thead>
                <th width="100"></th>
                <th></th>
                </thead>
                <tr>
                    <td>Title</td>
                    <td>{$apiview['title']}</td>
                </tr>
                <tr>
                    <td>版本</td>
                    <td>{$apiview['v']}</td>
                </tr>
                <tr>
                    <td>Api</td>
                    <td>{$apiview['api']}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{$apiview['type']}</td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>{$apiview['active']}</td>
                </tr>
                <tr>
                    <td>说明</td>
                    <td><pre>{$apiview['dis']}</pre></td>
                </tr>
                <tr>
                    <td>Request</td>
                    <td><pre>{$apiview['request']}</pre></td>
                </tr>
                <tr>
                    <td>Response</td>
                    <td><pre>{$apiview['response']}</pre></td>
                </tr>
            </table>

        </div>
        <div id="log" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">

            <h3>模拟</h3>

            <table class="table table-striped table-hover">
                <thead>
                <th width="100"></th>
                <th></th>
                </thead>
                <tr>
                    <td>地址</td>
                    <td>{$apisite}{$apiview['v']}/{$apiview['api']}</td>
                </tr>
                <tr>
                    <td>输入</td>
                    <td><textarea name="request" class="form-control" rows="8">{$apiview['request']}</textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <a class="btn btn-primary" href="">提交</a>
                    </td>
                </tr>
                <tr>
                    <td>Response</td>
                    <td><pre>132123123</pre></td>
                </tr>
            </table>

        </div>
    </div>







{/if}