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
