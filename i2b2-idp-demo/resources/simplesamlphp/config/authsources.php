<?php

$config = [
    'admin' => [
        'core:AdminPassword',
    ],
    'example-userpass' => [
        'exampleauth:UserPass',
        'users' => [
            'demo:demouser' => [
                'uid' => ['demo'],
                'eduPersonAffiliation' => ['staff'],
                'eduPersonPrincipalName' => 'demo@i2b2.org',
                'mail' => 'demo@i2b2.org',
                'givenName' => 'i2b2 SimpleSAML',
                'sn' => 'Demo User',
                'displayName' => 'i2b2 SimpleSAML Demo User'
            ]
        ],
    ],
];
