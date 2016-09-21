
<div id="crop-avatar">
    <div class="avatar-view btn btn-default">
        上传头像
    </div>

    <!-- Cropping modal -->
    <div class="modal fade" id="avatar-modal" aria-hidden="true" aria-labelledby="avatar-modal-label" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="avatar-form" id="uploadHeadImage">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal" type="button">&times;</button>
                        <h4 class="modal-title" id="avatar-modal-label">更换头像</h4>
                    </div>
                    <div class="error" id="showError" style="margin-left: 100px"></div>
                    <div class="modal-body">
                        <div class="avatar-body">

                            <!-- Upload image and data -->
                            <div class="avatar-upload">
                                <input class="avatar-data" name="avatar_data" id="avatar_data" type="hidden"/>
                                <label for="avatarInput">头像上传</label>
                                <input class="avatar-input" id="avatar_file" name="avatar_file" type="file"/>
                            </div>

                            <!-- Crop and preview -->
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="avatar-wrapper"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="avatar-preview preview-lg"></div>
                                    <div class="avatar-preview preview-md"></div>
                                    <div class="avatar-preview preview-sm"></div>
                                </div>
                            </div>

                            <div class="row avatar-btns">
                                <div class="col-md-9">
                                    <div class="btn-group">
                                        <button class="btn btn-primary" data-method="rotate" data-option="-90" type="button" title="Rotate -90 degrees">Rotate Left</button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="-15" type="button">-15deg</button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="-30" type="button">-30deg</button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="-45" type="button">-45deg</button>
                                    </div>
                                    <div class="btn-group">
                                        <button class="btn btn-primary" data-method="rotate" data-option="90" type="button" title="Rotate 90 degrees">Rotate Right</button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="15" type="button">15deg</button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="30" type="button">30deg</button>
                                        <button class="btn btn-primary" data-method="rotate" data-option="45" type="button">45deg</button>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <a class="btn btn-primary" id="confirm_upload">上传</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-default" data-dismiss="modal" type="button">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /.modal -->
</div>

<link href="/assets/ui/css/Jcrop/cropper.min.css" rel="stylesheet"/>
<link href="/assets/ui/css/Jcrop/main.css" rel="stylesheet"/>
<script src="/assets/ui/js/Jcrop/cropper.min.js"></script>
<script src="/assets/ui/js/Jcrop/main.js"></script>

<style>
    .vad { margin: 250px 0 5px; font-family: Consolas,arial,宋体,sans-serif; text-align:center;}
    .vad a { display: inline-block; height: 36px; line-height: 36px; margin: 0 5px; padding: 0 50px; font-size: 14px; text-align:center; color:#eee; text-decoration: none; background-color: #222;}
    .vad a:hover { color: #fff; background-color: #000;}
    .thead { width: 728px; height: 90px; margin: 0 auto; border-bottom: 40px solid #fff;}
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $('#confirm_upload').click(function(){
            var fromData = new FormData($('form')[0]);
           $.ajax({
                url:'/man/?patient/crop/uploadimage',
                type:'POST',
                data:fromData,
                dataType:'JSON',
                async: false,
                cache: false,
                contentType: false,
                processData: false,
                success:function(data){
                    if(data.code==200){
                        window.location.reload();
                    }else {
                        $('#showError').text(data.msg);
                    }
                }
            })
        });
    });

</script>
