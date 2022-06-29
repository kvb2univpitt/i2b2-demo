<?php

$metadata['https://localhost/shibboleth'] = [
    'entityid' => 'https://localhost/shibboleth',
    'contacts' => [],
    'metadata-set' => 'saml20-sp-remote',
    'AssertionConsumerService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://localhost/Shibboleth.sso/SAML2/POST',
            'index' => 1,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST-SimpleSign',
            'Location' => 'https://localhost/Shibboleth.sso/SAML2/POST-SimpleSign',
            'index' => 2,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://localhost/Shibboleth.sso/SAML2/Artifact',
            'index' => 3,
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:PAOS',
            'Location' => 'https://localhost/Shibboleth.sso/SAML2/ECP',
            'index' => 4,
        ],
    ],
    'SingleLogoutService' => [
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
            'Location' => 'https://localhost/Shibboleth.sso/SLO/SOAP',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
            'Location' => 'https://localhost/Shibboleth.sso/SLO/Redirect',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
            'Location' => 'https://localhost/Shibboleth.sso/SLO/POST',
        ],
        [
            'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
            'Location' => 'https://localhost/Shibboleth.sso/SLO/Artifact',
        ],
    ],
    'keys' => [
        [
            'encryption' => false,
            'signing' => true,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIID6zCCAlOgAwIBAgIJAJnvBW0hUXFwMA0GCSqGSIb3DQEBCwUAMBcxFTATBgNV
                        BAMTDGNhZmM3MzFmM2MxYzAeFw0yMjA2MTYwMzU2MTBaFw0zMjA2MTMwMzU2MTBa
                        MBcxFTATBgNVBAMTDGNhZmM3MzFmM2MxYzCCAaIwDQYJKoZIhvcNAQEBBQADggGP
                        ADCCAYoCggGBAMjFA3mnNxvb6z9HsxsGFUDgNtqZKMS6stKL9oraQwe9U+zfYf6k
                        5xJC9f1ULWeY6jA2sdk428Hl59nnynZImXnJROc//7mpuJISIN0uW/4oKeAzcxSZ
                        c69K+azCDN6D6WXW+uH7GzegAAghYepZ45UCzuCICntqltkrX8MS+6djGwk9jj+C
                        gcKJRIPD0RogNm3rjQ5y1wLVZxW3YLzoyM6DJ0u4bwDbE9GhIuKDyeRGwsck4zQ5
                        D0gVaLM3ado78g6Lh/SXgLJxEvbxxl5WsM+7Y/2p54N+QbM75MFDLJT/3fmwk+H3
                        aE6HdB/lLqq64Sy7nEucw6VCiLkSFuIT3mi/YBpSv2apj2LmC98a0PFGQiXHsIPk
                        CWSsb15uc/Mw66zgid1PO7Ev5PMniECaeHjKDjVWrM7rjQdN/9Otds0RwyDPDZtB
                        vHN2wO5K6E+xx4FUai3Uc49nPPXmnxbzHfShiL4x6ELg2oVC4pnRCDRXKPke9YwV
                        aCbaAk9XEX4JJwIDAQABozowODAXBgNVHREEEDAOggxjYWZjNzMxZjNjMWMwHQYD
                        VR0OBBYEFOVN8v1dktf/zDx0KHxbF/R7VqjGMA0GCSqGSIb3DQEBCwUAA4IBgQAB
                        wJzgi4YVZ/6Hb10CgUWeoBRp8y7fnShSBv10tBse2BOqj9puvHPX3QURRRCIqrPn
                        f+2pfYppumGJiSLoJ1RIkRBg/VDc09Y9iEpPMZT0oCcfr38AeJaBXqHMvql2/SEf
                        j+O8152UPoZVwQLKOgs7Ktd5gVgyv09kT684ieZMMQIOzZcl+M9TD+ezSmXZnhje
                        GkA/rlTl4nrHf0D/+9lesDsBJN+XCD6BA+Mgd9VpznHbSqAQzCFYdLcQV1qm3gci
                        6Uu9kF9Wy4lpJFgPyt/yuuMvfaevQZnnkzv/s5TrO8dZd9ShgCV6j+rUbTdjztx7
                        whwScQIGn1C96mJ93WnAjEJBGrdq7Ii5ILr7sGq/KM3JKWIR/w//tKIi8DxqMH/E
                        nOogbk8QAW6cEgt9TXvYhiPW9u1Z4a8dtIiLBJo+QoCTiwx0lj+tBHWYJjhai5Kh
                        XVnVBOtbMxhe4SjJdZJ3f3UwfrLLB98crmV0WY1ZMB+rM8mTLF3bj30IMwwZv4s=',
        ],
        [
            'encryption' => true,
            'signing' => false,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIID6zCCAlOgAwIBAgIJAOVoW0jGC713MA0GCSqGSIb3DQEBCwUAMBcxFTATBgNV
                        BAMTDGNhZmM3MzFmM2MxYzAeFw0yMjA2MTYwMzU2MTFaFw0zMjA2MTMwMzU2MTFa
                        MBcxFTATBgNVBAMTDGNhZmM3MzFmM2MxYzCCAaIwDQYJKoZIhvcNAQEBBQADggGP
                        ADCCAYoCggGBAKeylBQ/X2/9rZ34C24acCoOatPVwqi3SnBe4GxX8lgGI2Bz22wU
                        bPj66+pqf2IxX0F/N4QM9x/M36hHfy99fELiIgPqhmgJEEp67U6XIeoQMBvA5DSV
                        qst76i+q6nJbQ/KhwEWqQmTLJ+4tHD1AkmFZk9QlF/nZ5AnDOlRkzh3sYw/5nCB6
                        bLHdhAnhy8ruOx69mnjL4EU6dtTipazJJmiVO19+EzgIpwwa5gtFBTjzgfccnT+r
                        75WNNU/uxyV8frkrPebbZRjEKgb7QaCcMURSQbllrtmOYMsnMh1y0Qz/YBPqJYO4
                        i8gWggLXX2oqP55bLq+zsHu+MsGL4TMmx2QZCmPLqpgN5boQEa1V7S2r4nkhvD0n
                        Cef60nv8BCtRu+cGq1XhOnmSBCSU042kaGGIUDmIBCLRUygB33Z0F71RBxv5aXDJ
                        l17IGVQ6HuYokjvAsXJS3fG4BGZ6wCooDIrLmUtqL4cUP6iFRdtNvLwQyJ3L8iLB
                        QPZiHkfUZwB2uQIDAQABozowODAXBgNVHREEEDAOggxjYWZjNzMxZjNjMWMwHQYD
                        VR0OBBYEFBBUaFLqQGR2Czs1kh6k6tScz+hbMA0GCSqGSIb3DQEBCwUAA4IBgQBV
                        LzlTYRG7e+ooLOkre/iXQ2k+YHljE4MyxGE7nWGZDODEvf41it6sUeK16Xo5we2i
                        x4iNrCb2LgeONUy6HiPoJYghyO/MlP8cy2he+n6ZhG0IinYQOVs66ke9EkD31F3x
                        +CIXdHhf9VP6+C57UEOW6WdhsSChKcNwY6eMC1WapkFRSWBOqXZ519KI52JNEnMA
                        SMksAB28fW7jLsXpU6rzKWpoCbVncCTRho+ywDh9diF/MkDRQEQNOzvp3rMuJdtK
                        SFSv8sFa1xgJhWin8W7JhmV6EQddEWqR8+0KaLXPhO5iAElcMk9Omapv6rDGn7Le
                        pj/729vyDRafBeFm53cKd/2r+pvr8UZh7w2hdwSePgglpHQqqtjBUXPw3CUxbMo/
                        xt+xK4XrZOTup9Zbiw7pre7Phq/W333hDQwAkNNf1GEvErkT6NdbnssttY3popen
                        NIFiy8Zyy4eBZVm79UyBOxQoow8Gnb30yxc07FWhTaDH1EzJyyWlT8ezGL9GWFE=',
        ],
    ],
    'validate.authnrequest' => true,
    'validate.logout' => true,
    'sign.logout' => true,
    'redirect.sign' => true,
    'redirect.validate' => true
];
