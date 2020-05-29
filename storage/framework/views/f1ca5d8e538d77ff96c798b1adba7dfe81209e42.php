<div id="my_upload">
    <?php if($upload_type != 'profile'): ?>
        <h3><?php echo e(__(ucfirst($upload_type))); ?></h3>
        <label for="upload-title"><?php echo app('translator')->get('File Title'); ?>: </label>
        <input type="text" class="form-control" name="upload-title" id="upload-title" placeholder="<?php echo app('translator')->get('File title here...'); ?>" required>
        <br/>
    <?php endif; ?>
    <?php if($upload_type == 'routine'): ?>
        <label for="sections">For</label>
        <select id="sections" class="form-control" name="sections" required>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php $__currentLoopData = $class->sections; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $section): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($section->id); ?>">
                    <?php echo app('translator')->get('Class'); ?>: <?php echo e($class->class_number); ?> -
                    <?php echo app('translator')->get('Section'); ?>: <?php echo e($section->section_number); ?>

                </option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php elseif($upload_type == 'syllabus'): ?>
        <label for="classes">Class</label>
        <select id="classes" class="form-control" name="classes" required>
            <?php $__currentLoopData = $classes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $class): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($class->id); ?>">
                <?php echo app('translator')->get('Class'); ?>: <?php echo e($class->class_number); ?>

            </option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
    <?php endif; ?>
  <input class="form-control-sm" id="fileupload" type="file"  accept=".xlsx,.xls,.doc,.docx,.ppt,.pptx,.txt,.pdf,image/png,image/jpeg" name="file" data-url="<?php echo e(url('upload/file')); ?>">
  <br/>
  <div class="progress">
    <div class="progress-bar progress-bar-striped active" id="up-prog-info" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
      <div class="text-xs-center" id="up-prog-info">0% <?php echo app('translator')->get('uploaded'); ?></div>
    </div>
  </div>
  <div id="errorAlert"></div>
</div>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.28.4/sweetalert2.all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.21.0/js/vendor/jquery.ui.widget.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.21.0/js/jquery.iframe-transport.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/blueimp-file-upload/9.5.2/jquery.fileupload.min.js"></script>
<script>
$(function () {
    var jqXHR = null;
    var uploadButton = $('<button/>')
            .addClass('btn btn-primary btn-sm')
            .text(<?php echo json_encode( __('Upload'), 15, 512) ?>)
            .on('click', function () {
                <?php if($upload_type != 'profile'): ?>
                    if(!$('#upload-title').val()){
                        swal({
                            title:<?php echo json_encode( __('File needs a Title'), 15, 512) ?>,
                            type:'info',
                            showCloseButton: true,
                        });
                        return false;
                    }
                <?php endif; ?>
                var $this = $(this),
                    data = $this.data();
                $('#fileupload').hide();
                    var acceptFileTypes = /application\/(pdf|xlsx|xls|doc|docx|ppt|pptx|txt)|image\/(png|jpeg)$/i;
                    var filesSize = 50 * 1024 * 1024;
                    var file = data.originalFiles[0];
                    console.log(file['type']);

                    if(file['type'].length && !acceptFileTypes.test(file['type'])) {
                        $('#fileupload').show();
                        swal(<?php echo json_encode( __('Not an accepted file type'), 15, 512) ?>);
                        $this.remove();
                        return false;
                    } else if(file.size > filesSize) {
                        swal(<?php echo json_encode( __('Filesize is too big \n Should not exceed '), 15, 512) ?> + filesSize + 'MB');
                        $this.remove();
                        return false;
                    }else {
                        $('#up-prog-info').text(<?php echo json_encode( __('Uploading'), 15, 512) ?>);
                        $this.off('click').text(<?php echo json_encode( __('Abort'), 15, 512) ?>).on('click', function () {
                            $this.remove();
                            data.abort();
                            data.context.text(<?php echo json_encode( __('File Upload has been canceled'), 15, 512) ?>);
                        });
                        <?php if($upload_type != 'profile'): ?>
                            <?php if($upload_type == 'routine'): ?>
                                data.formData = {upload_type: '<?php echo e($upload_type); ?>',section_id:$('#sections').val(),title: $('#upload-title').val()};
                            <?php elseif($upload_type == 'syllabus'): ?>
                                data.formData = {upload_type: '<?php echo e($upload_type); ?>',class_id:$('#classes').val(),title: $('#upload-title').val()};
                            <?php else: ?>
                                data.formData = {upload_type: '<?php echo e($upload_type); ?>',title: $('#upload-title').val()};
                            <?php endif; ?>
                        <?php else: ?>
                            data.formData = {upload_type: '<?php echo e($upload_type); ?>',user_id: $('#userIdPic').val()};
                        <?php endif; ?>
                        data.submit().always(function () {
                            $this.remove();
                        });
                    }
            });
    $('#fileupload').fileupload({
        dataType: 'json',
        add: function (e, data) {
            console.log(data);
            var file = data.originalFiles[0];
            console.log(file);
            if (file) {
                $('#fileInfo').remove();
                        data.context = $('<div/>').attr('id', 'fileInfo').appendTo('#my_upload');
                        var node = $('<p/>')
                            .append($('<span/>').text(file.name)).append(uploadButton.clone(true).data(data));
                        node.appendTo(data.context);
            }
        },
        progress: function (e, data) {
            var progress = 0;
            progress = parseInt(data.loaded / data.total * 100, 10);
            console.log('progress'+progress);
                $('.progress-bar').attr(
                    'aria-valuenow',
                    progress
                ).css('width', progress + '%');
                $('#up-prog-info').text(progress + "% " + <?php echo json_encode( __('uploaded'), 15, 512) ?>);
        }
    })
    .on('fileuploaddone', function (e, data) {
        var error = data['jqXHR']['responseJSON']['error'];
        var imgUrlpath = data['jqXHR']['responseJSON']['imgUrlpath'];
        var path = data['jqXHR']['responseJSON']['path'];
        if(error) {
            $('#errorAlert').text(error);
        } else {
            data.context.html('<div>' + <?php echo json_encode( __('Upload finished.'), 15, 512) ?> + '</div>');
            $('button.cancelBtn').hide();
            $('#errorAlert').empty();
            <?php if($upload_type == 'profile'): ?>
            $('#picPath').val(path);
            $('#my-profile').attr('src', imgUrlpath);
            <?php endif; ?>
        }
    })
    .on('fileuploadfail', function (e, data) {
            data.context.text(<?php echo json_encode( __('File Upload has been canceled'), 15, 512) ?>);
            var error = data['jqXHR']['responseJSON']['error'];
            $('#errorAlert').text(error);
            console.log(data['jqXHR']['responseJSON']);
    });
});

</script>
<?php /**PATH C:\dev\Unifiedtransform\resources\views/components/file-uploader.blade.php ENDPATH**/ ?>