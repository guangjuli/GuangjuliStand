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
			<?php View('Orgadd',[]);?>
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
                                <!--div class="input-group">
                                      <input type="text" name="table_search" class="form-control input-sm pull-right" style="width: 150px;" placeholder="Search"/>
                                      <div class="input-group-btn">
                                            <button class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                                      </div>
                                </div-->
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive no-padding">

                            <form class="px" action=""  method="post">
                                <table class="table table-hover">
                                    <tr>
                                        <th width="100">ID</th>
                                        <th width="80">排序</th>
                                        <th width="300">分类名</th>
                                        <th width="300"></th>
                                        <th>描述</th>
                                        <th width="200">操作</th>
                                    </tr>
                                    <?php
                                    foreach($res as $value) {
                                    	if($value['pid'] == 0){
                                    ?>
                                            <!-- td><?=$value['pid']?><?=$value['categoryId']?></td>
                                            <td><input name="s[<?=$value['categoryId'];?>]" value="<?=$value['sort']?>" type="text" size="3" maxlength="3"></td>
                                            <td>&nbsp;&nbsp;&nbsp;&nbsp;┃━━━━ &nbsp;&nbsp;<?=$value['title']?></td -->
                                    <tr>
                                        <td><?=$value['categoryId']?></td>
                                        <td><input name="s[<?=$value['categoryId'];?>]" value="<?=$value['sort']?>" type="text" size="3" maxlength="3"></td>
                                        <td><?=$value['title']?></td>

                                        <td><?=$pid[$value['pid']]?></td>
                                        <td><?=$value['des']?></td>
                                        <td>
                                            <?=$value['active_xr']?>
                                            <a class="btn btn-primary btn-sm shambox" title="编辑" rel=/org/main/orgedit/<?=$value['orgId'];?>>编辑</a>
                                            <a class="btn btn-primary btn-sm formact" confirm="确定?" act='delete' relid=<?=$value['orgId'];?>>删除</a>
                                        </td>
                                    </tr>
                                            <?php
                                            foreach($res as $k=>$v) {
                                                if($v['pid'] == $value['categoryId']){
                                                    ?>
                                                    <tr>
                                                        <td><?=$v['categoryId']?></td>
                                                        <td><input name="s[<?=$v['categoryId'];?>]" value="<?=$v['sort']?>" type="text" size="3" maxlength="3"></td>
                                                        <td>&nbsp;&nbsp;&nbsp;&nbsp;┃━━━━ &nbsp;&nbsp;<?=$v['title']?></td -->

                                                        <td><?=$pid[$value['pid']]?></td>
                                                        <td><?=$v['des']?></td>
                                                        <td>
                                                            <?=$v['active_xr']?>
                                                            <a class="btn btn-primary btn-sm shambox" title="编辑" rel=/org/main/orgedit/<?=$v['categoryId'];?>>编辑</a>
                                                            <a class="btn btn-primary btn-sm formact" confirm="确定?" act='delete' relid=<?=$v['categoryId'];?>>删除</a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
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
<!-- AdminLTE App -->x
<script src="/assets/LTE/js/AdminLTE/app.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

})
</script>

</body>
</html>