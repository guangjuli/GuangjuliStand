<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>AdminLTE | General UI</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- bootstrap 3.0.2 -->
    <link href="http://cdn.bootcss.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="http://cdn.bootcss.com/font-awesome/4.0.3/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/assets/LTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <!-- jQuery 2.0.2 -->

<link href="/assets/LTE/css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <script src="/assets/LTE/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/assets/LTE/js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

	<script src="http://cdn.bootcss.com/jquery/2.0.2/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="http://cdn.bootcss.com/respond.js/1.3.0/respond.min.js"></script>

    <![endif]-->
</head>
<body class="skin-black">
<!-- header logo: style can be found in header.less -->
<?php W('head');?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
		<?php W('left',[]);?>
    </aside>
    <!-- Right side column. Contains the navbar and content of the page -->
    <aside class="middle-side">
    <?php W('leftsub',[]);?>
	</aside>
    <aside class="right-side">
        <!-- Content Header (Page header) -->
        <?php W('right_content_head',[]);?>
        <?php W('right_content_info',[]);?>

        <!--#include virtual = "/box/Usergroupadd" -->




        <!-- Main content -->
        <section class="content">
            <!-- h2 class="page-header">Alerts and Callouts</h2 -->
            <div class="row">
			<?php View('articleAdd',[]);?>
			</div>
    


        <div class="row">
         <div class="col-xs-12">
			<?php
            foreach($categorymap as $key=>$value){
				
				?>
            <a class="btn btn-primary btn-sm" href=/article/home/index/<?=$key;?>><?=$value?></a>
				<?php
			}
			?>
        </div>
        </div>

            <!-- END ALERTS AND CALLOUTS -->
            <div class="row">
                <div class="col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">列表</h3>
                            <div class="box-tools">
                                <div class="box-tools">
                                    <div class="input-group pull-right">
                                        <input rel="set_get_list" class="trigercookie" type="checkbox" <?php if($_COOKIE['set_get_list']){ ?>checked<?php }?>> 隐藏无效
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">
                            <form class="px" action=""  method="post">
                                <table class="table table-hover">
                                    <tr>
                                        <th width="50">ID</th>
                                        <th width="80">排序</th>
                                        <th width="100">分类</th>
                                        <th width="300">标题</th>
                                        <th>描述[副标题 图片 内容 是否推送]</th>
                                        <th width="250">操作</th>
                                    </tr>
                                    <?php
                                    foreach($res as $value) {
                                    	
                                    ?>
                                        
                                    <tr>
                                        <td><?=$value['articleId']?></td>
                                        <td><input name="s[<?=$value['articleId'];?>]" value="<?=$value['sort']?>" type="text" size="3" maxlength="3"></td>
                                        <td><?=$categorymap[$value['categoryId']]?></td>
                                        <td><?=$value['title']?></td>

                                        <td><?=$value['des']?></td>
                                        <td>
                                            <?=$value['active_xr']?>
                                            <a class="btn btn-primary btn-sm shamboxl" title="预览" rel=/article/home/preview/<?=$value['articleId'];?>>预览</a>
                                            <a class="btn btn-primary btn-sm shamboxl" title="编辑" rel=/article/home/articleedit/<?=$value['articleId'];?>>编辑</a>
                                            <a class="btn btn-primary btn-sm formact" confirm="确定?" act='delete' relid=<?=$value['articleId'];?>>删除</a>
                                        </td>
                                    </tr>
                                            <?php
                                        
									}?>
                                        <td></td>
                                        <td>
                                            <input type="hidden" name='act' value="sort">
                                            <a type="button" rel='.px' class="btn btn-primary formsubmit">排序</a>
                                        </td>
                                        <td colspan="4"></td>
                                    </tr>

                                </table>
                            </form>
                        </div><!-- /.box-body -->


                    </div><!-- /.box -->
                </div>
                





            </div>

            <!-- END TYPOGRAPHY -->
        </section><!-- /.content -->

        <!-- 页脚 -->
        <!--#include virtual = "../sp/right_content_footer.shtml" -->
        <?php W('right_content_footer',[]);?>
    </aside><!-- /.right-side -->
</div><!-- ./wrapper -->

<!-- Bootstrap -->
<script src="http://cdn.bootcss.com/bootstrap/3.0.3/js/bootstrap.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="/assets/LTE/js/AdminLTE/app.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var editor56 = CKEDITOR.replace('editoraddad');
        $('#rm').unbind();


        var tag = '.upd';

        //提交按钮
        $('#rm').click(function(){

            $('#ckeditaddde').remove();
            $('#rm').append("<input type='hidden' id=ckeditaddde name=content value='"+editor56.getData()+"'/>");

            $.ajax({
                type: "POST",
                url: $('.adn').attr("action"),
                data: $('.adn').serialize(),
                dataType:'json',
                success: function(data){
                    var JS = data.js;
                   // eval(JS);
                },
                error : function() {
                    alert("异常！");
                }
            });
        });
     })
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var i=1;
     $('#addPic').click(function(){
         if(i<10){
             var add = 'delete'+i;
             var a = "<div id="+add+"><div class=\"form-group col-md-8\"><input type=\"file\" name=\"tfile[]\">" +
                 "</div><div class=\"btn btn-primary col-md-2 \" onclick='deP("+add+")'>删除 </div></div> ";
             $('#pictureUrl').append(a);
         }
         i++;
     });
    });
    function deP(add){
        $(add).remove();
    }
</script>
</body>
</html>