<?php

class AccountChangeSeconderyEmailForm extends CFormModel {

    public $seconderyPassword;
    public $newSeconderyEmail;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
           array('seconderyPassword, newSeconderyEmail', 'required'),
//            array('seconderyPassword', 'CheckPasswordValidator'),
            array('newSeconderyEmail', 'email'),
            array('newSeconderyEmail', 'unique', 'attributeName' => 'email', 'caseSensitive' => false, 'className' => 'User', 'message' => '{attribute} "{value}" is already in use!'),
            array('newSeconderyEmail', 'unique', 'attributeName' => 'secondery_email', 'caseSensitive' => false, 'className' => 'User', 'message' => '{attribute} "{value}" is already in use!'),
        );
    }
    
    public function CheckPasswordValidator()
    {
        $user = User::model()->findByPk(Yii::app()->user->id);
        if (empty($user->secondery_password)) {
            return true;
        } else {
            if ($user->secondery_password == $this->validPassword($this->seconderyPassword)) {
                return true;
            } else {
                $this->addError("seconderyPassword", "Password has not correct");
            }
        }
    }
    
    public function validPassword($password)
    {
        return hash('sha512', hash('whirlpool', $password));
    }
    
    public function generatePassword($password)
    {
        return hash('sha512', hash('whirlpool', $password));
    }
    
    /**
     * Declares customized attribute labels.
     * If not declared here, an attribute would have a label that is
     * the same as its name with the first letter in upper case.
     */
    public function attributeLabels()
    {
        return array(
            'seconderyPassword' => Yii::t('UserModule.forms_AccountChangeEmailForm', 'Secondary Password'),
            'newSeconderyEmail' => 'New Secondary Email',
        );
    }
}
