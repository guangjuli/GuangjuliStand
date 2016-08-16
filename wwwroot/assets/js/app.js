/*!
 * Author: Abdullah A Almsaeed
 * Date: 4 Jan 2014
 * Description:
 *      This file should be included in all pages
 !**/

function setcookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        var expires = "; expires=" + date.toGMTString();
    }
    else var expires = "";
    document.cookie = name + "=" + value + expires + "; path=/";
}

function getcookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}

function setc(name) {
    var is = getcookie(name);
    if (is == 1) {
        var ns = 0;
    } else {
        var ns = 1;
    }
    setcookie(name, ns, 1);
}

//tip
function tipalert(ob, msg) {

    $("#vsham").remove();
    $(ob).append("<div id=\"vsham\" class=\"alert alert-danger alert-dismissible\" role=\"alert\" style=\"display:none;\"><button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button><div>" + msg + "</div></div>");
    $("#vsham").fadeIn(300);
    $('#vsham').delay(2000).fadeOut(1000);
}

//post表单数据
function shampost(tag) {
    $.ajax({
        type: "POST",
        url: tag.attr("action"),
        data: tag.serialize(),
        dataType: 'json',
        success: function (data) {
            var JS = data.js;
            eval(JS);
        },
        error: function () {
            alert("异常！");
        }
    });
}


function showAjaxModal(url, title) {
    $('.modal_ok').unbind("click");
    if ($("#modal-sham").length > 0) {
    } else {
        $(document.body).append("<!-- Modal sham (Ajax Modal)--><div class=\"modal fade\" id=\"modal-sham\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title\">Title</h4></div><div class=\"modal-body\">Content is loading...</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-white modal_close\" data-dismiss=\"modal\">关闭</button><button type=\"button\" class=\"btn btn-info modal_ok\">确定</button></div></div></div></div>");
    }
    jQuery('#modal-sham').modal('show', {backdrop: 'static'});
    jQuery.ajax({
        url: url,
        success: function (response) {
            console.log(url);
            jQuery('#modal-sham .modal-title').html(title);
            jQuery('#modal-sham .modal-body').html(response);
            var JS = $("script[type='text/dialog']").html();
            eval(JS);
        }
    });
}

function showAjaxModall(url, title) {
    $('.modal_ok').unbind("click");
    if ($("#modal-shamL").length > 0) {
    } else {
        $(document.body).append("<!-- Modal sham (Ajax Modal)--><div class=\"modal fade\" id=\"modal-shamL\"><div class=\"modal-dialog modal-lg\" style=\"width:60%\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-hidden=\"true\">&times;</button><h4 class=\"modal-title\">Title</h4></div><div class=\"modal-body\">Content is loading...</div><div class=\"modal-footer\"><button type=\"button\" class=\"btn btn-white modal_close\" data-dismiss=\"modal\">关闭</button><button type=\"button\" class=\"btn btn-info modal_ok\">确定</button></div></div></div></div>");
    }
    jQuery('#modal-shamL').modal('show', {backdrop: 'static'});
    jQuery.ajax({
        url: url,
        success: function (response) {
            console.log(url);
            jQuery('#modal-shamL .modal-title').html(title);
            jQuery('#modal-shamL .modal-body').html(response);
            var JS = $("script[type='text/dialog']").html();
            eval(JS);
        }
    });
}


$(function () {

    //调用
//formact 删除 toggle 
//formsubmit 排序 addnew update
    $('.formsubmit').click(function () {
        var tag = $(this).attr("rel");
        $.ajax({
            type: "POST",
            url: $(tag).attr("action"),
            data: $(tag).serialize(),
            dataType: 'json',
            success: function (data) {
                var JS = data.js;
                eval(JS);
            },
            error: function () {
                alert("异常！");
            }
        });
    });

    //删除和变更状态 - 新的集成
    $('.formact').click(function () {
        var confirmmsg = $(this).attr("confirm");
        if (confirmmsg !== undefined) {
            //操作确认
            if (!confirm(confirmmsg)) {
                return false;
            }
        }
        var tag = $(this).attr("tag");
        if (tag == undefined) {
            tag = '';
        }
        $.ajax({
            type: "POST",
            url: tag,
            data: {
                act: $(this).attr("act"),
                relid: $(this).attr("relid"),
                field: $(this).attr("field"),
            },
            dataType: 'json',
            success: function (data) {
                var JS = data.js;
                eval(JS);
            },
            error: function () {
                alert("异常！");
            }
        });

    });


    $(".trigercookie").on('ifClicked', function (event) {
        var rel = event.currentTarget.attributes.rel.nodeValue;
        setc(rel);
        location.reload();
    });


    $('.shambox').click(function () {
        var title = $(this).attr("title")
        showAjaxModal($(this).attr("rel"), title)
    });

    $('.shamboxl').click(function () {
        var title = $(this).attr("title")
        showAjaxModall($(this).attr("rel"), title)
    });

    //shamcomfirm 标记
    $('.shamget').click(function () {
        var url = $(this).attr("rel");
        var confirmmsg = $(this).attr("shamcomfirm");

        if (confirmmsg !== undefined) {
            //操作确认
            if (!confirm(confirmmsg)) {
                return false;
            }
        }
        $.ajax({
            type: "GET",
            url: url,
            dataType: 'json',
            success: function (data) {
                var JS = data.js;
                eval(JS);
            },
            error: function () {
                alert("异常！");
            }
        });

    });


    //必须参数 根据rel 选定form
    $('.shampostform').click(function () {
        var tag = $(this).attr("rel");
        $.ajax({
            type: "POST",
            url: $(tag).attr("action"),
            data: $(tag).serialize(),
            dataType: 'json',
            success: function (data) {
                var JS = data.js;
                eval(JS);
            },
            error: function () {
                alert("异常！");
            }
        });
    });

});