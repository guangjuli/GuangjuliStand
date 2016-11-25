
<div class="col-xs-12">
<form class="adn" action=""  method="post" enctype="multipart/form-data">
      <div class="box box-danger collapsed-box">
            <div class="box-header">
                  <h3 class="box-title"><a class="btn btn-default" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">添加文章</a>
                  </h3>
                  <div class="box-tools pull-right">
                        <button class="btn btn-default btn-sm" title="" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">
                              <i class="fa fa-minus"></i>
                        </button>
                        <button class="btn btn-default btn-sm" title="" data-toggle="tooltip" data-widget="remove" data-original-title="Remove">
                              <i class="fa fa-times"></i>
                        </button>
                  </div>
            </div>
            <div class="box-body" style="display: none;">
            
            <div class="row">
                <div class="col-md-4">
		            <div class="row">
                        <div class="col-md-3">
                            标题
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                               <input type="text" name="title" class="form-control dialogdes"  value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            副标题
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                              <textarea name="subtitle" rows="3" class="form-control dialogdes"></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            分类
                        </div>
                        <div class="col-md-9">
                            <select class="form-control"  name='categoryId'>
                                <?php foreach($categorymap as $key=>$value) {
                                    $html .= "<option value=\"$key\">$value</option>";}
                                echo($html);
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            图片
                        </div>
                        <div class="col-md-9" id="pictureUrl">
                            <div class="form-group col-md-8">
                                <input type="file" name="thumb">
                            </div>
                        </div>
                        <div class="col-md-3">
                            推送
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                               <input type="text" name="push" class="form-control dialogdes"  value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                            来源
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="source" class="form-control dialogdes"  value="">
                            </div>
                        </div>
                        
                        
		            </div>

                </div>
                <div class="col-md-8">
                
                    <div class="row">
                        <div class="col-md-1">
                            内容
                        </div>
                        <div class="col-md-11">
                            <div class="form-group">
                                <textarea id="editoraddad" name="content" rows="20" cols="80"></textarea>
                            </div>
                        </div>
                    </div>
                
                </div>
            </row>
            <div class="row">
                <div class="form-group col-xs-6">
                    <input type="hidden" name='act' value="addnew">
                    <input type="submit" class="btn btn-primary" name="submit" value="添加"/>
                </div>
            </div>

            

            </div>
      </div>
</form>
</div>
