# humhub-modules-secondary email

This module adds functionality and has basic design for secondary email http://i.imgur.com/oVxwHfk.png. Before activating/deactivating module, please follow the instructions in  README


Add code to config/local/_settings.php in `Components` array 

'urlManager' => array(
    'urlFormat' => 'path',
    'showScriptName' => true,
    'rules' => array(
        array(
            'class' => 'application.modules_core.space.components.SpaceUrlRule',
            'connectionId' => 'db',
        ),
        array(
            'class' => 'application.modules_core.user.components.UserUrlRule',
            'connectionId' => 'db',
        ),
        '/' => '//',
        'dashboard' => 'dashboard/dashboard',
        'directory/members' => 'directory/directory/members',
        'directory/spaces' => 'directory/directory/spaces',
        '<controller:\w+>/<id:\d+>' => '<controller>/view',
        '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
        '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
        'user/account/changeEmail' => 'secondaryemail/customs/changeEmail',
    ),
),

If `urlManager` already exists then add code below to only to `Rules`. 

'/' => '//',
'dashboard' => 'dashboard/dashboard',
'directory/members' => 'directory/directory/members',
'directory/spaces' => 'directory/directory/spaces',
'<controller:\w+>/<id:\d+>' => '<controller>/view',
'<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
'<controller:\w+>/<action:\w+>' => '<controller>/<action>',
'user/account/changeEmail' => 'secondaryemail/customs/changeEmail',

If you disable module  you need to delete the line below:

'user/account/changeEmail' => 'secondaryemail/customs/changeEmail',

instruction about how to restart the module if migrations were updated
- 0) disable module
- 1) Delete all tables and records created in migration, example  http://i.imgur.com/hzEdifg.png -> http://i.imgur.com/rxFYho1.png(chose delete) and  http://i.imgur.com/mlm8b8R.png. And delete the record itself in migration table http://i.imgur.com/u6chz2B.png -> http://i.imgur.com/3PMuLil.png
- 2) Make module pull
- 3) Run module
- 4) Check the all records and tables created in migration.
