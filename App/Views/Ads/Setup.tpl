<ul id="myTabs" class="nav nav-tabs" role="tablist">
    <li class="active" role="presentation">
        <a id="home-tab" aria-expanded="true" aria-controls="home" data-toggle="tab" role="tab" href="#BaseSetup">设置</a>
    </li>
    <li class="" role="presentation">
        <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#BaseApi" aria-expanded="false">Api</a>
    </li>
    <li class="" role="presentation">
        <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#BaseHelp" aria-expanded="false">Help</a>
    </li>
    <li class="" role="presentation">
        <a id="profile-tab" aria-controls="profile" data-toggle="tab" role="tab" href="#BaseReadme" aria-expanded="false">Readme</a>
    </li>

</ul>
<div id="myTabContent" class="tab-content">
    <div id="BaseSetup" class="tab-pane fade active in" aria-labelledby="home-tab" role="tabpanel">
        {widget ads=$adssetup}
    </div>
    <div id="BaseApi" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">
        {widget ads=$adsapi}
    </div>
    <div id="BaseHelp" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">
        {widget ads=$adshelp}
    </div>
    <div id="BaseReadme" class="tab-pane fade" aria-labelledby="profile-tab" role="tabpanel">
        {widget ads=$adsreadme}
    </div>
</div>
