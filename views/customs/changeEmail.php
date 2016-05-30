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
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>
    
    <div id="primary-email">
        <div class="form-group">
            <?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Primary E-mail address</strong>'); ?>
            <br /><?php echo CHtml::encode(Yii::app()->user->getModel()->email) ?>
        </div>
    
        <div class="form-group">
            <!--<?php echo $form->labelEx($model, 'newEmail'); ?> // denv i wasn't sure how to change the label text within the module-->
            <label for="AccountChangeEmailForm_newEmail" class="required">Update Primary E-Mail address <span class="required">*</span></label>
            <?php echo $form->textField($model, 'newEmail', array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Enter new primary e-mail address')); ?>
            <?php echo $form->error($model, 'newEmail'); ?>
        </div>
        
        <div class="form-group">
            <!--<?php echo $form->labelEx($model, 'currentPassword'); ?> // denv i wasn't sure how to change the label text within the module-->
            <label for="AccountChangeEmailForm_currentPassword" class="required">Confirm password <span class="required">*</span></label>
            <?php echo $form->passwordField($model, 'currentPassword', array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Confirm your password')); ?>
            <?php echo $form->error($model, 'currentPassword'); ?>
        </div>
    
        <?php echo CHtml::submitButton(Yii::t('UserModule.views_account_changeEmail', 'Update Primary E-mail'), array('class' => 'btn btn-primary pull-right')); ?>
    
        <?php $this->endWidget(); ?>
    
    </div>
    
    <div class="clearfix"></div>

    <br /><br />

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form2',
        'enableAjaxValidation' => false,
    ));
    ?>

	<div class="secondary-email">
        <div class="form-group">
            <?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Secondery E-mail address</strong>'); ?>
            <br /><?php echo CHtml::encode(Yii::app()->user->getModel()->secondery_email) ?>
            <?php 
            if(isset(Yii::app()->user->getModel()->secondery_email) && empty(CHtml::encode(Yii::app()->user->getModel()->secondery_email))) {
                echo "<p class='update-email-alert'>Add a secondery e-mail address to your account in order to retain access the system when your institutional e-mail address expires.</p>";
            }
            
            ?>
        </div>
        
        <div class="form-group">
             <label class="required">Update Secondery E-Mail address *</label>
            <?php echo $form->textField($modelSecond, 'newSeconderyEmail', array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Enter new secondery e-mail address')); ?>
            <?php echo $form->error($modelSecond, 'newSeconderyEmail'); ?>
        </div>
        
        <div class="form-group">
            <label class="required">Confirm password *</label>
            <?php echo $form->passwordField($modelSecond, 'seconderyPassword', array('class' => 'form-control', 'maxlength' => 45, 'placeholder' => 'Confirm your password')); ?>
            <?php echo $form->error($modelSecond, 'seconderyPassword'); ?>
        </div>
    
		<?php echo CHtml::submitButton(Yii::t('UserModule.views_account_changeEmail', 'Update Secondery E-mail'), array('class' => 'btn btn-primary pull-right')); ?>
    
        <?php $this->endWidget(); ?>
    </div>
</div>

