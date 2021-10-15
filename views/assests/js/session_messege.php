 <!DOCTYPE html>
<html>
    <body>
        <head>


		</head>

    </body>

</html>

<?php

if(isset($_SESSION['messege_type']) && $_SESSION['messege_type']=='success'){
?>




<div class="alert alert-success" role="alert">
<?php echo $_SESSION['messege_text']; ?>
</div>
<?php } ?>

<?php
if(isset($_SESSION['messege_type']) && $_SESSION['messege_type']=='failure'){
?>



<div class="alert alert-danger" role="alert">
<?php echo $_SESSION['messege_text']; ?>
</div>
<?php }

unset($_SESSION['messege_type']);
unset($_SESSION['messege_text']);
?>