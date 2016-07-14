<?php

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

?>

<style type="text/css">
	.update-email-alert{
		color:rgb(61, 66, 127) !important;
		font-weight:bold;
	}
</style>

<div class="panel-heading">
    <?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Manage</strong> E-mail'); ?>
</div>
<div class="panel-body">
    <?php
    $form = ActiveForm::begin(array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <div id="primary-email">
        <div class="form-group">
            <?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Primary E-mail address</strong>'); ?>
            <br /><?php echo Html::encode(\Yii::$app->user->identity->email) ?>
        </div>
    
        <div class="form-group">
            <label for="AccountChangeEmailForm_newEmail" class="required">Update Primary E-Mail address <span class="required">*</span></label>
            <?php echo $form->field($model, 'newEmail')->textInput(array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Enter new primary e-mail address')); ?>
        </div>
        
        <div class="form-group">
            <label for="AccountChangeEmailForm_currentPassword" class="required">Confirm password <span class="required">*</span></label>
            <?php echo $form->field($model, 'currentPassword')->passwordInput(array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Confirm your password')); ?>
        </div>
    
        <?php echo Html::submitButton(Yii::t('UserModule.views_account_changeEmail', 'Update Primary E-mail'), array('class' => 'btn btn-primary pull-right')); ?>
    
        <?php ActiveForm::end(); ?>
    
    </div>
    
    <div class="clearfix"></div>

    <br /><br />

    <?php
        $form = ActiveForm::begin(array(
            'id' => 'user-form2',
        ));
    ?>

	<div class="secondary-email">
        <div class="form-group">
            <?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Secondary E-mail address</strong>'); ?>
            <br /><?php echo Html::encode(Yii::$app->user->identity->secondary_email) ?>
            <?php 
            if(isset(Yii::$app->user->identity->secondary_email) && empty(Html::encode(Yii::$app->user->identity->secondary_email))) {
                echo "<p class='update-email-alert'>Add a secondary e-mail address to your account in order to retain access the system when your institutional e-mail address expires.</p>";
            }
            
            ?>
        </div>
        
        <div class="form-group">
             <label class="required">Update Secondary E-Mail address *</label>
            <?php echo $form->field($modelSecond, 'newSeconderyEmail')->textInput(array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Enter new secondary e-mail address')); ?>
        </div>
        
        <div class="form-group">
            <label class="required">Confirm password *</label>
            <?php echo $form->field($modelSecond, 'seconderyPassword')->textInput(array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Confirm your password')); ?>
        </div>
    
		<?php echo Html::submitButton(Yii::t('UserModule.views_account_changeEmail', 'Update Secondary E-mail'), array('class' => 'btn btn-primary pull-right')); ?>

        <?php ActiveForm::end(); ?>
    </div>
</div>

