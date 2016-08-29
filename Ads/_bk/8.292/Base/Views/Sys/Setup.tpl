<h3>设置</h3>


<script type="text/dialog">
	  $(document).ready(function(){
			$('.modal_ok').click(function(){
		alert(1);
				  var res = $.ajax({
						url : '{$Adsbase}',
						type: 'post',
						data: {
						},
						dataType: "json",
						async:false,
						cache:false
				  }).responseJSON;

/*
				  var res = $.ajax({
						url : '/admin/user/index/dialog/',
						type: 'post',
						data: {

							'password' 	: $('.dialogpassword').val(),
							'group' 	: $('.dialoggroup').val(),
							'des' 		: $('.dialogdes').val(),
							'userid' 	: $('.dialogid').val(),

						},
						dataType: "json",
						async:false,
						cache:false
				  }).responseJSON;
				  //console.log(res);
				  //==========================

				  if(res.code<0){
						alert(res.msg);
						return false;
				  }else{

						location.reload();
						return true;
				  }
      */
        });


	  })
</script>