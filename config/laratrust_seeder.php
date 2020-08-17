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
            'nckh' => 'c,r,u,d',
            'giangvien' => 'c,r,u,d',
            'chambai' => 'c,r,u,d',
            'congtac' => 'c,r,u,d',
            'dang' => 'c,r,u,d',
            'daygioi' => 'c,r,u,d',
            'dotxuat' => 'c,r,u,d',
            'sangkien' => 'c,r,u,d',
            'xaydung' => 'c,r,u,d',
            'hoctap' => 'c,r,u,d',
            'file-manager' => 'u'
        ],
        'administrator' => [
            'dashboard' => 'r',
            'profile'   => 'r,u',
            'lop'   => 'r,u',
            'hocphan'  => 'r,u',
            'bai'=> 'r,u',
            'tiet'   => 'r,u',
            'nckh' => 'r,u',
            'giangvien' => 'c,r,u',
            'file-manager' => 'c,r,u'
            
        ],
        'user' => [
            'dashboard' => 'r',
            'profile'   => 'r,u',
            'lop'   => 'r,u',
            'hocphan'  => 'r,u',
            'bai'=> 'r,u',
            'tiet'   => 'r,u',
            'nckh' => 'r,u',
            'giangvien' => 'r,u',
            'file-manager' => 'r',
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
