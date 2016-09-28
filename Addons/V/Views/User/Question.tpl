<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <title>问卷调查</title>
    <!-- Bootstrap core CSS -->
    <link href="http://cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container col-xs-12">

    <h1 class="text-center">问卷调查</h1>
    <form class="form-horizontal" method="post" action="/man/?patient/html/add" id="addForm" enctype="multipart/form-data">

        <div class="row form-group">
            <div class="col-xs-3">饮食习惯</div>
            <div class="col-xs-9">
                <div class="radio">
                    <label>
                        <input type="radio" name="eatHabits"  value="0" {if $row['eatHabits'] eq '0'}checked{/if}>
                        偏淡
                    </label>
                    <label>
                        <input type="radio" name="eatHabits"  value="1" {if $row['eatHabits'] eq '1'}checked{/if}>
                        适中
                    </label>
                    <label>
                        <input type="radio" name="eatHabits"  value="2" {if $row['eatHabits'] eq '2'}checked{/if}>
                        偏咸
                    </label>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-3">是否饮酒</div>
            <div class="col-xs-9">
                <div class="radio">
                    <label>
                        <input type="radio" name="drinkwine"  value="0" {if $row['drinkwine'] eq '0'}checked{/if}>
                        从不
                    </label>
                    <label>
                        <input type="radio" name="drinkwine"  value="1" {if $row['drinkwine'] eq '1'}checked{/if}>
                        偶尔
                    </label>
                    <label>
                        <input type="radio" name="drinkwine"  value="2" {if $row['drinkwine'] eq '2'}checked{/if}>
                        经常
                    </label>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-3">精神紧张</div>
        </div>
        <div class="row">
            <div class="col-xs-4">&nbsp; </div>
            <div class="col-xs-8">
                <div class="radio">
                    <div class="row form-group">
                        <label class="col-xs-12">
                            <input type="radio" name="nervous"  value="0">
                            从不
                        </label>
                    </div>
                    <div class="row form-group">
                        <label class="col-xs-12">
                            <input type="radio" name="nervous"  value="1">
                            偶尔
                        </label>
                    </div>
                    <div class="row form-group">
                        <label class="col-xs-12">
                            <input type="radio" name="nervous"  value="2">
                            经常
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-1"></div>
            <div class="col-xs-10">家族中有下列哪些病史呢？</div>
        </div>
        <div class="row form-group">
            <div class="col-xs-4">&nbsp; </div>
            <div class="col-xs-8">
                <div class="checkbox">
                    {foreach from=$disease key=key item=item}
                    <div class="row form-group">
                        <label class="col-xs-12"><input  type="checkbox" name="diseaseList"  value="{$key}">{$item}</label>
                    </div>
                    {/foreach}
                </div>
            </div>
        </div>


    </form>
</div>

<script src="/assets/js/jquery-1.11.1.min.js"></script>
<script src="/assets/bootstrap-3.3.5/js/bootstrap.min.js"></script>

</body>
</html>
