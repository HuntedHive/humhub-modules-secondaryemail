<?php
    if(isset(Yii::app()->user->getModel()->secondery_email) && empty(CHtml::encode(Yii::app()->user->getModel()->secondery_email)) && !isset($_COOKIE['secondery_email'])) {
?>
<?php
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile("http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js");
?>

<div class="alert alert-info alert-message text-center" id="secondaryemail-alert">
    <center>Hi <?=  Yii::app()->user->getModel()->username; ?>, don't forget to <a href="<?= Yii::app()->createUrl('user/account/changeEmail') ?>">add a secondary email address</a> to your account to retain access to TeachConnect when your institutional email address expires.</center>
    <button type="button" class="close"><i class="fa fa-close"></i></button>    
</div>

<script>
    $(document).ready(function(){
        var alertmessage = $(".alert-message").clone();
        $(".alert-message").remove();
        $("#topbar-first").before('<div class="alert alert-info alert-message" id="secondaryemail-alert">' + alertmessage.html() + '</div>');
        $(".alert-message").animate({"opacity":1},1300);
        $(".topbar").animate({"marginTop" : 51}, 1000);
        $("body > .container").animate({"marginTop" : 51}, 1000);
        document.getElementById("topbar-first").className += " topbar-alert-margin";
        document.getElementById("topbar-second").className += " topbar-alert-margin";

            if(document.getElementById("secondaryemail-alert")){
                document.getElementsByTagName('body')[0].className+=' topbar-alert-body'
            }

        $(".alert-message .close").on("click", function(){
            $(".alert-message").fadeOut(1000);
            $(".topbar").animate({"marginTop" : 0}, 1000);
            $("body > .container").animate({"marginTop" : 0}, 1000);
            setCookie("secondery_email", 1);

            document.getElementById("topbar-first").className =
                document.getElementById("topbar-first").className.replace(/\btopbar-alert-margin\b/,'');
            document.getElementById("topbar-second").className =
                document.getElementById("topbar-second").className.replace(/\btopbar-alert-margin\b/,'');
        });
        
        function setCookie(key, value) {
            var expires = new Date();
            expires.setTime(expires.getTime() + (1 * 24 * 60 * 60 * 1000));
            document.cookie = key + '=' + value + ';path=/;expires=' + expires.toUTCString();
        }
    });
</script>

<?php } ?>