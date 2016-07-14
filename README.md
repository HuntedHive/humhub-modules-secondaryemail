# humhub-modules-secondary email

This module adds functionality and has basic design for secondary email http://i.imgur.com/oVxwHfk.png. Before activating/deactivating module, please follow the instructions in  README


Add code to config/common.php and add code only to Rules

'user/account/changeEmail' => 'secondaryemail/customs/changeEmail',

If you disable module  you need to delete the line below:

'user/account/changeEmail' => 'secondaryemail/customs/changeEmail',