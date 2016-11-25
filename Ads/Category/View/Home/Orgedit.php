<div class="row">
<div class="col-md-12">
		<form class="upd" action=""  method="post">
                        <div class="row">
							  <div class="col-md-2">
									ID :
							  </div>
							  <div class="col-md-10">
								  <div class="form-group">
									  <?=$res['orgId']?>
								  </div>
							  </div>



							<div class="col-md-2">
								机构名 :
							</div>
							<div class="col-md-10">
								<div class="form-group">
									<input type="text" name="name" class="form-control" value="<?=$res['name']?>">
								</div>
							</div>
								<div class="col-md-2">
									所属机构 :
								</div>
								<div class="col-md-10">
									<div class="form-group">
	                                    <?=$res['pid_xr'];?>
										
									</div>
								</div>


						</div>
                        
                        
                        <div class="row">
                              <div class="col-md-2"> 
                                    描述 :
                              </div>
							<div class="col-md-10">
								<div class="form-group">
									<input type="text" name="des" class="form-control dialogdes"  value="<?=$res['des']?>">
                                    
									<input type="hidden" name="orgId" value="<?php echo $res['orgId'];?>">
                                    <input type="hidden" name='act' value="update">
								</div>
							</div>
                        </div>


                  </form>

</div>
</div>

<script type="text/dialog">
$(document).ready(function(){
	$('.modal_ok').click(function(){
		var tag = '.upd';
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