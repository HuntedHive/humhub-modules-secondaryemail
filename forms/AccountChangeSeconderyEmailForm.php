<?php

namespace humhub\modules\secondaryemail\forms;

use humhub\modules\user\models\Password;
use Yii;
use yii\base\Model;
use humhub\modules\user\models\User;

class AccountChangeSeconderyEmailForm extends Model {

    public $seconderyPassword;
    public $newSeconderyEmail;

    /**
     * Declares the validation rules.
     */
    public function rules()
    {
        return array(
           array(['seconderyPassword', 'newSeconderyEmail'], 'required'),
            array('newSeconderyEmail', 'email'),
            array('newSeconderyEmail', 'unique', 'targetAttribute' => 'email', 'targetClass' => User::className(), 'message' => '{attribute} "{value}" is already in use!'),
            array('newSeconderyEmail', 'unique', 'targetAttribute' => 'secondary_email', 'targetClass' => User::className(), 'message' => '{attribute} "{value}" is already in use!'),
            array('seconderyPassword' , 'EqualFirstPassword')
        );
    }

    public function EqualFirstPassword()
    {
        $userPassword = Password::find()->andFilterWhere(['user_id' => Yii::$app->user->id])->one();

        if(!$userPassword->validatePassword($this->seconderyPassword)) {
            $this->addError("seconderyPassword", "Password has not correct");
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
