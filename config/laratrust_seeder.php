<?php

return [
    /**
     * Control if the seeder should create a user per role while seeding the data.
     */
    'create_users' => false,

    /**
     * Control if all the laratrust tables should be truncated before running the seeder.
     */
    'truncate_tables' => true,

    'roles_structure' => [
        'super-admin' => [
            'users' => 'c,r,u,d',
            'roles' => 'c,r,u,d',  // Roles && assign permission
            'managers' => 'c,r,u,d',
            'profile' => 'r,u',
            'center-programmes' => 'c,r,u,d',
            'center-publications' => 'c,r,u,d',
            'center-news' => 'c,r,u,d',
            'scientific-papers' => 'c,r,u,d',
            'categories' => 'c,r,u,d',
            'articles' => 'c,r,u,d',
            'abouts' => 'c,r,u,d',
            'contacts' => 'r,d',
            'header_footer' => 'r,u',
            'home' => 'r,u',
            'content' => 'r',
            'map-centers' => 'c,r,u,d',
            'members' => 'c,r,u,d',
            'programs' => 'c,r,u,d',
            'lectures' => 'c,r,u,d',
            'calenders' => 'c,r,u,d',
            'structure_tree' => 'c,r,u,d',
        ],
        'admin' => [
            'users' => 'r',
            'profile' => 'r,u',
        ],

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete',
    ],
];
