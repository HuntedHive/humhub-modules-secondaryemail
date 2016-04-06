<?php 
    if(isset(Yii::app()->user->getModel()->secondery_email) && empty(CHtml::encode(Yii::app()->user->getModel()->secondery_email)) && !isset($_COOKIE['secondery_email'])) {
?>
<div class="alert alert-info alert-message text-center">
    <center>Hi <?=  Yii::app()->user->getModel()->username; ?>, don't forget to <a style="color:#fff;text-decoration:underline;" href="<?= Yii::app()->createUrl('user/account/changeEmail') ?>">add a secondery email address</a> to your account to retain access to TeachConnect When your institutial email address expires</center>
    <div class="close">X</div>    
</div>




<style>
    .alert-message {
        opacity: 0;
        position: fixed;
        top: 0px;
        width:100%;
        background: #3d427f;
        z-index: 99999;
        color: #fff;
    }
    
    .alert-message .close {
        position: relative;
        float:right;
        margin-top:-20px;
        color:#fff !important;
    }
</style>

<script>
    $(document).ready(function(){
        var alert = $(".alert-message").clone();
        $(".alert-message").remove();
        $("#topbar-first").before('<div class="alert alert-info alert-message">' + alert.html() + '</div>');
        $(".alert-message").animate({"opacity":1},1300);
        
        $(".alert-message .close").on("click", function(){
            $(".alert-message").fadeOut(1000);
            setCookie("secondery_email", 1);
        });
        
        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';path=/;expires=' + expires.toUTCString();
        }
    });
</script>

<?php } ?>