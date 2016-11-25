<div class="col-xs-12">
<form class="adn" action=""  method="post">
      <div class="box box-danger collapsed-box">
            <div class="box-header">
                  <h3 class="box-title"><a class="btn btn-default" data-toggle="tooltip" data-widget="collapse" data-original-title="Collapse">添加机构</a>
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
                              <div class="form-group col-xs-6">
                                    <label for="exampleInputEmail1">用户组名称</label>
                                    <input name="name" class="form-control" type="text" placeholder="机构名称">
                              </div>
                        </div>
                        <div class="row">
                              <div class="form-group col-xs-6">
                                    <label for="exampleInputPassword1">用户组标识</label>
                                  <select class="form-control"  name='pid'>
                                     <?php foreach($pid as $k=>$v) {
                                         $html .= "<option value=\"$k\">$v</option>";
                                     }
                                         $html .= "<>";
                                         echo($html);
                                         ?>
                                  </select>
                              </div>
                        </div>
                        <div class="row">
                              <div class="form-group col-xs-6">
                                    <label for="exampleInputPassword1">描述</label>
                                    <input name="des" class="form-control" type="text" placeholder="说明">
                              </div>
                        </div>
                        <div class="row">
                              <div class="form-group col-xs-6">
                                   <input type="hidden" name='act' value="addnew"></a>
                                   <a type="button" rel='.adn' class="btn btn-primary formsubmit">添加</a>
                              </div>
                        </div>
            </div>
      </div>
</form>
</div>
	 