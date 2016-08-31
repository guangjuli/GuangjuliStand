<!-- content -->
<div class="row">
    <div class="col-md-6 ">
        <!-- content -->

        <ul class="nav nav-tabs" style="margin: 0px 0px 10px 0px;" role="tablist">
            <li {if $smarty.get.type eq 1}class="active"{/if} role="presentation">
                <a href="/man/?config/html/list&group=1">
                    <span class=""></span>
                    配置1
                </a>
            </li>
            <li {if $smarty.get.type eq 2}class="active"{/if} role="presentation">
                <a href="/man/?config/html/list&group=2">
                    <span class=""></span>
                    配置2
                </a>
            </li>
            <li {if $smarty.get.type eq 3}class="active"{/if} role="presentation">
                <a href="/man/?config/html/list&group=3">
                    <span class=""></span>
                    配置3
                </a>
            </li>
            <li {if $smarty.get.type eq 4}class="active"{/if} role="presentation">
                <a href="/man/?config/html/list&group=4">
                    <span class=""></span>
                    配置4
                </a>
            </li>
        </ul>

<h2>配置</h2>
        <form>
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox"> Check me out
                </label>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </form>


    </div>

    <div class="col-md-6 ">
    </div>

</div>



