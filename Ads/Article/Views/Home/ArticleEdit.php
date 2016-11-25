<div class="row">
    <div class="col-md-12">
        <form class="upd" action=""  method="post">
        
            <div class="row">
                <div class="col-md-4">
		            <div class="row">
                        <div class="col-md-3">
                            标题
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                               <input type="text" name="title" class="form-control dialogdes"  value="<?=$res['title']?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            副标题
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                              <textarea name="subtitle" rows="3" class="form-control dialogdes"><?=$res['subtitle']?></textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            图片
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                               <input type="text" name="thumb" class="form-control dialogdes"  value="<?=$res['thumb']?>">
                            </div>
                        </div>
                        
                        <div class="col-md-3">
                            推送
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                               <input type="text" name="push" class="form-control dialogdes"  value="<?=$res['push']?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            来源
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <input type="text" name="source" class="form-control dialogdes"  value="<?=$res['source']?>">
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
<textarea id="editor1" name="content_te" rows="20" cols="80"><?=$res['content']?></textarea>    
                            </div>
                        </div>
                    </div>
                
                </div>
            </div>
            
            <div class="row">
                <input type="hidden" name="articleId" value="<?php echo $res['articleId'];?>">
                <input type="hidden" id="tag" name='act' value="update">
            </div>


        </form>

    </div>
</div>

<script type="text/dialog">
$(document).ready(function(){

		var editor = CKEDITOR.replace('editor1');

	$('.modal_ok').click(function(){
		var tag = '.upd';
		$('#ckedit').remove();
		$('#tag').append("<input type='text' id=ckedit name=content value='"+editor.getData()+"'/>");

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