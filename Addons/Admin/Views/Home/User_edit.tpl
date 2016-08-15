<div class="row">
    <div class="col-md-12">
        <form class="useredit form-horizontal" action="?z=admin/user/edit/"  method="post">

  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">姓名</label>
    <div class="col-sm-10">
      <input type="text" name="name" class="form-control" value="{$row['name']}">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">手机号</label>
    <div class="col-sm-10">
      {$row['mobile']}	<span class="red">手机号不能修改</span>
    </div>
  </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">密码</label>
                <div class="col-sm-10">
                    <input type="text" name="mima" class="form-control" value="{$row['mima']}">
                </div>
            </div>

            <div class="form-group">
                <label for="inputEmail3" class="col-sm-2 control-label">code</label>
                <div class="col-sm-10">
                    <input type="text" name="code" class="form-control" value="{$row['code']}">
                </div>
            </div>


            <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
    <div class="col-sm-10">
    <input type="radio" name="gender" id="radio" value="1" {if $row['gender']  ==1}checked="checked"{/if}/> 男
    <input name="gender" type="radio" id="radio" value="0" {if $row['gender']  !=1}checked="checked"{/if}/> 女
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">公司</label>
    <div class="col-sm-10">
      <input type="text" name="company" class="form-control" value="{$row['company']}">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">职位</label>
    <div class="col-sm-10">
      <input type="text" name="title" class="form-control" value="{$row['title']}">
    </div>
  </div>
  
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">微信号</label>
    <div class="col-sm-10">
      <input type="text" name="weixin" class="form-control" value="{$row['weixin']}">
    </div>
  </div>
          <input type="hidden" id="tag" name='uid' value="{$row['uid']}">
          <input type="hidden" id="tag" name='act' value="update">
        </form>

    </div>
</div>

<script type="text/dialog">
	$(document).ready(function(){
		$('.modal_ok').click(function(){
			var tag = '.useredit';
			$.ajax({
				type: "POST",
				url: $(tag).attr("action"),
				data: $(tag).serialize(),
				dataType:'json',
				success: function(data){
					var JS = data.js;
					eval(JS);
					
					},
				error : function() {
					   alert("异常！");
				  }
			});
		});
	})
</script>