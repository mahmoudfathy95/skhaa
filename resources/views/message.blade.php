<?php
if(session('success') != '')
    $success = session('success');

if(session('validate_errors') != '')
    $validate_errors = session('validate_errors');
?>
<?php if(isset($validate_errors) or isset($success)){?>

<?php if(isset($validate_errors)){?>

<script type="text/javascript">
$(document).ready(function(){
    var errors = <?= json_encode($validate_errors); ?>; 
    var text = "";
    for(var i in errors){text += errors[i]+"<br />";}
        swal({
            title: "Error",
            text: text,
            type: "error",
            html: true,
            showConfirmButton: true
        });
});
</script>

<?php } ?>
<?php if(!empty($success)){ ?>

<script type="text/javascript">
$(document).ready(function(){
    var success = <?= json_encode($success); ?>;
        swal({
            title: "Success",
            text: success,
            type: "success",
            html: true,
            timer: 3000,
            showConfirmButton: true
        });
});
</script>

<?php } ?>

<?php }
\Session::forget('success');
\Session::forget('validate_errors');
?>