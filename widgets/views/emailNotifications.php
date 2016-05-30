<?php
    if(isset(Yii::app()->user->getModel()->secondery_email) && empty(CHtml::encode(Yii::app()->user->getModel()->secondery_email)) && !isset($_COOKIE['secondery_email'])) {
?>
<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js");
?>
<style>
    .topbar {
        margin-top: 51px; //need if alert not close
    }
</style>
<div class="alert alert-info alert-message text-center">
    <center>Hi <?=  Yii::app()->user->getModel()->username; ?>, don't forget to <a href="<?= Yii::app()->createUrl('user/account/changeEmail') ?>">add a secondary email address</a> to your account to retain access to TeachConnect when your institutional email address expires.</center>
    <button type="button" class="close"><i class="fa fa-close"></i></button>    
</div>

<script>
    $(document).ready(function(){
        var alert = $(".alert-message").clone();
        $(".alert-message").remove();
        $("#topbar-first").before('<div class="alert alert-info alert-message">' + alert.html() + '</div>');
        $(".alert-message").animate({"opacity":1},1300);
        
        $(".alert-message .close").on("click", function(){
            $(".alert-message").fadeOut(1000);
            $(".topbar").animate({"marginTop" : 0}, 1000);
            $("body > .container").animate({"marginTop" : 0}, 1000);
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