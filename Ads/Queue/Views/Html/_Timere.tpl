
<h3>定时执行 <small>守护</small></h3>
<div class="progress">
    <div id="testpress" class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
        <span class="sr-only">45% Complete</span>
    </div>
</div>
<a class="btn btn-primary cachebegin">开始</a>


<script type="text/javascript">
    $(document).ready(function(e) {
        var task=0;

        //清理方法 clearTimeout(test)
        function gonext(data){
            var num = data.num;
            $.ajax({
                type: "Post",
                url: '/man/?queue/html/timere&task='+task+'&num='+data.num+'&pressid='+data.pressid,
                dataType:'json',
                success: function(data){
                    $("#testpress").css("width",data.width);
                    $("#testpress").html(data.width);
                    if(data.pressstop ==1){
                    }else{
                        gonext(data);
                    }
                },
                error:function() {
                    gonext({
                        msg:'',
                        num:num,
                        pressid:0,
                        width:0
                    });
                }
            });
        }

        $(".cachebegin").click(function(){
            task=1;
            gonext({
                pressid:0,
                width:0,
                num:0
            });
        });

    });
</script>

