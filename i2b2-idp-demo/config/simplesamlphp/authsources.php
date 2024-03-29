<?php

$config = array(
    'admin' => array(
        'core:AdminPassword',
    ),
    'example-userpass' => array(
        'exampleauth:UserPass',
        'demo:demouser' => array(
            'uid' => array('demo'),
            'eduPersonPrincipalName' => 'demo@i2b2.org',
            'eduPersonAffiliation' => array('staff'),
            'mail' => 'demo@i2b2.org',
            'givenName' => 'i2b2 SimpleSAML',
            'sn' => 'Demo User',
            'displayName' => 'i2b2 SimpleSAML Demo User'
        ),
        'lex:luthor' => array(
            'uid' => array('lex'),
            'eduPersonPrincipalName' => 'lex@lexcorp.com',
            'eduPersonAffiliation' => array('staff'),
            'mail' => 'lex@lexcorp.com',
            'givenName' => 'Alexander',
            'sn' => 'Luthor',
            'displayName' => 'Lex Luthor'
        ),
        'ckent:superman' => array(
            'uid' => array('ckent'),
            'eduPersonPrincipalName' => 'ckent@dailyplanet.com',
            'eduPersonAffiliation' => array('staff'),
            'mail' => 'ckent@dailyplanet.com',
            'givenName' => 'Clark',
            'sn' => 'Kent',
            'displayName' => 'Clark Kent (Kal-El)'
        ),
        'karadanvers:supergirl' => array(
            'uid' => array('karadanvers'),
            'eduPersonPrincipalName' => 'karadanvers@catco.com',
            'eduPersonAffiliation' => array('staff'),
            'mail' => 'karadanvers@catco.com',
            'givenName' => 'Kara',
            'sn' => 'Danvers',
            'displayName' => 'Kara Zor-El'
        ),
        'clarkkent:superman' => array(
            'uid' => array('clarkkent'),
            'eduPersonPrincipalName' => 'clarkkent@catco.com',
            'eduPersonAffiliation' => array('staff'),
            'mail' => 'clarkkent@catco.com',
            'givenName' => 'Clark',
            'sn' => 'Kent',
            'displayName' => 'Kal-El'
        ),
    ),
);
