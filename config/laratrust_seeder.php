<?php

return [
    'role_structure' => [
        'superadministrator' => [
            'dashboard' => 'r',
            'users'     => 'c,r,u,d',
            'acl'       => 'c,r,u,d',
            'profile'   => 'r,u',
            'lop'   => 'c,r,u,d',
            'hocphan'  => 'c,r,u,d',
            'bai'=> 'c,r,u,d',
            'tiet'   => 'c,r,u,d',
            'nckh' => 'c,r,u,d'
        ],
        'administrator' => [
            'dashboard' => 'r',
            'profile'   => 'r,u',
            'lop'   => 'r,u',
            'hocphan'  => 'r,u',
            'bai'=> 'r,u',
            'tiet'   => 'r,u',
            'nckh' => 'r,u'
            
        ],
        'user' => [
            'dashboard' => 'r',
            'profile'   => 'r,u',
            'lop'   => 'r,u',
            'hocphan'  => 'r,u',
            'bai'=> 'r,u',
            'tiet'   => 'r,u',
            'nckh' => 'r,u'
        ],
    ],
    'permission_structure' => [],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
