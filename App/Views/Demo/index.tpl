<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <title>{$title}</title>
    <meta http-equiv="content-type" content="application/xhtml+xml; charset=utf-8" />
    <meta name="author" content="Mike Yarmish" />
    <meta name="description" content="Your website description goes here" />
    <meta name="keywords" content="your,keywords,goes,here" />
    <link rel="stylesheet" href="/demoimages/mike03.css" type="text/css" />
</head>

<body>
<div id="container" >
    <div id="headerWrap">
        <div id="header">
            <h1><a href="http://www.865171.cn" title="free-css-templates">{$title}</a></h1>
            <ul id="navigation">
                {foreach from=$pagename key=key item=item}
                    <li><a href="">{$item}</a></li>
                {/foreach}

            </ul>
        </div>
    </div>
    <div id="content">
        <div id="contentHeader">
            <div id="siteDescription"><p>一个简单的demo，用于学习MVC和smarty</p></div>
        </div>

        <div id="main">
            <div class="post">
                <h2>Open Source Template</h2>
                <p>{$content1}</p>
            </div>
            <div class="post">
                <h2>Design Features</h2>
                <p>The template is optimized for 800x resolution but looks nice at different resolutions too.
                    The main header with menu is liquid and change it's width in different resolutions.
                    Content colums are easly changeble by float property in CSS.</p>
                <blockquote><p>Some blockquote text which is showed as an example how it looks like.</p></blockquote>
                Example of an un-ordered list:
                <ul>
                    <li>That is</li>
                    <li>how it</li>
                    <li>looks like</li>
                </ul>

            </div>
        </div>

        <div id="secondary">
            <h2>About</h2>
            <p>Here could be some sidebar. You can put here whatever you want. May be some linkroll or some
                additional information</p>
            <h2>Version</h2>
            <p>Template: 1.0</p>
            <p>Current template version: 1.0</p>

        </div>
    </div>

</div>


</body>
</html>
