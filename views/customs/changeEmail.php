<div class="panel-heading">
    <?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Change</strong> E-mail'); ?>
</div>
<div class="panel-body">
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="form-group">
    	<?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Current E-mail address</strong>'); ?>
    	<br /><?php echo CHtml::encode(Yii::app()->user->getModel()->email) ?>
    </div>
    <hr/>
    <div class="form-group">
        <?php echo $form->labelEx($model, 'currentPassword'); ?>
        <?php echo $form->passwordField($model, 'currentPassword', array('class' => 'form-control', 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'currentPassword'); ?>
    </div>

    <div class="form-group">
        <?php echo $form->labelEx($model, 'newEmail'); ?>
        <?php echo $form->textField($model, 'newEmail', array('class' => 'form-control', 'maxlength' => 45)); ?>
        <?php echo $form->error($model, 'newEmail'); ?>
    </div>

    <hr>
    <?php echo CHtml::submitButton(Yii::t('UserModule.views_account_changeEmail', 'Save'), array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>
    
    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'user-form2',
        'enableAjaxValidation' => false,
    ));
    ?>

    <div class="form-group">
    	<?php echo Yii::t('UserModule.views_account_changeEmail', '<strong>Secondery E-mail address</strong>'); ?>
    	<br /><?php echo CHtml::encode(Yii::app()->user->getModel()->secondery_email) ?>
        <?php 
        if(isset(Yii::app()->user->getModel()->secondery_email) && empty(CHtml::encode(Yii::app()->user->getModel()->secondery_email))) {
            echo "<strong>Add a secondery e-mail address to your account in order to retain access the system when your institutional e-mail address expires</strong>";
        }
        
        ?>
    </div>
    <hr/>
    <div class="form-group">
        <label class="required">Current secondery password *</label>
        <?php echo $form->passwordField($modelSecond, 'seconderyPassword', array('class' => 'form-control', 'maxlength' => 45)); ?>
        <?php echo $form->error($modelSecond, 'seconderyPassword'); ?>
    </div>

    <div class="form-group">
         <label class="required">New Secondery address *</label>
        <?php echo $form->textField($modelSecond, 'newSeconderyEmail', array('class' => 'form-control', 'maxlength' => 45)); ?>
        <?php echo $form->error($modelSecond, 'newSeconderyEmail'); ?>
    </div>

    <hr>
    <?php echo CHtml::submitButton(Yii::t('UserModule.views_account_changeEmail', 'Save'), array('class' => 'btn btn-primary')); ?>

    <?php $this->endWidget(); ?>
</div>

