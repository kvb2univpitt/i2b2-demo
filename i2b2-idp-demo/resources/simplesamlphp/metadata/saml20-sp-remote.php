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
            'X509Certificate' => 'MIIECzCCAnOgAwIBAgIUNj8KHtR+t18qosFJ+QIG/+5W0OYwDQYJKoZIhvcNAQELBQAwFDESMBAGA1UEAxMJbG9jYWxob3N0MB4XDTI1MTAyOTA0MDU0NFoXDTM1MTAyNzA0MDU0NFowFDESMBAGA1UEAxMJbG9jYWxob3N0MIIBojANBgkqhkiG9w0BAQEFAAOCAY8AMIIBigKCAYEAnLIBPuajRE/W1flQ7MBTQzkZ3n68F+8l+eQmAxYqcUlGAUu1/5Q9CUZENsiBet4tt8XvrBDmydGuz3co3DdOi/Qcq6XmectIxBgLxGxypdRty0O/RRmRgE4hUsogk2I8MdXaw5H+10hQHnRB8c/I6/b3tnAfvVFAjEt2imXperrrUINJ0UDkDDEC6z3YfJ4PIEZqj/3ETD16Tsf3NcMKOADgGDEzUSNnx9OjKc/TfxMnpJK6P3cNjP+SK2NKur0utQhXJMUy5hBbNv8PtOy1oNNdBJuCiIh2DtkVKCbg7cUTusGElp6rQFQSWoV6BQ69CbggB99ILCZCCEIC9ON25//81SJP3PMA2kFw5rZTexAn2LpCm18by815guUJkt/qYxdVxdprUuCHy3QO8b1vjw2fw9GBviDo24ogFCA2eJEUMWgf/TOQl3ATRFyy94fIEB4qC+HS4O7keGBmrnaN7FieMIq1D5fibwcEislqE6+SF5r20LmMtPQRvHj6jWzRAgMBAAGjVTBTMDIGA1UdEQQrMCmCCWxvY2FsaG9zdIYcaHR0cHM6Ly9sb2NhbGhvc3Qvc2hpYmJvbGV0aDAdBgNVHQ4EFgQUYbifvwYdg93hgAD1NgKZfWRzUY0wDQYJKoZIhvcNAQELBQADggGBAA00jYRoBtpf/6rZMayjG2muM70sks/H1wtmA8+NvGsie3CBBofMAqOV2kctZNUA/77GzugbFQVJ6o255/arwI2qxasrijZlwL5Ar8FYjE8H7dQxHcLKYIEPhJ38nuuqc0wCRe2fLTFCGEe32BXfrprLR1/LzZQjRp6MIOG5v9PK4ld2KpH87cWZMofjF243YWWCc627sPCbCMiscnLWGI6JYCvSS7iCQdUsQnulmVYMspB2hH1KihZ+2i48+NyC2jKPceudmALe0nBK4VXQgGTjpCC6gk+TJk7V92/RSiOyf15xS0wo8TVext+fF12/q/OUuiLMaiVVIlfVqKWmUPT/Gh3XvrE7qYgTcVG+HC8Ip9DvdivPhhOKQT7BJP8msFa0Hwr/xscO8k5odmckaMxUwBFwZAEP0jKsdRoR9npnJB2Tz1nkQcmew+fh6F9H0jU66ZOfSp4jQ7pD3WyYF+oVUZiLCmN/9AnmxvAKK0dfnwy0FLb7Wx1xGbqJVdhuow==',
        ],
        [
            'encryption' => true,
            'signing' => false,
            'type' => 'X509Certificate',
            'X509Certificate' => 'MIIECzCCAnOgAwIBAgIUUrc4kKj63X703i3NyMBKWETytF0wDQYJKoZIhvcNAQELBQAwFDESMBAGA1UEAxMJbG9jYWxob3N0MB4XDTI1MTAyOTA0MDU0NFoXDTM1MTAyNzA0MDU0NFowFDESMBAGA1UEAxMJbG9jYWxob3N0MIIBojANBgkqhkiG9w0BAQEFAAOCAY8AMIIBigKCAYEA4gckIgxPbsUFoYspJzYuy5oEGhMO3vsFqSUdZToS7mk2VoCCVPcWiqHyAOWVj1h4r6gS0uEvaSozoYqnuv4QG78y9AHYZ4gHV/u4JNtNNCFFQ2U9UoxM9xsJqdBaA6uHB5wpfu017+iuCkSufq2ikJUCXjMqtHGvUZyFQH/6nGU5Kr8pFVfJ1zEfkkxzC7/j3egbPD9JPRKOV3rVGLqmZOWZVe5FieyIYevVEOfW3bMErRKDIsrRwidYqJVNY9lbCnqKACQOQhTkY3aRiYirsi+DXJJBSE+phfChICLArc1Ul/ic5QalmgfsAmT/ZzDmjxJvfSNf1mzo4bobkaBXEFLcrDSRnDT1PZLO+EbX4LmfszKVwY5ecrmUzUPp6dzhl4lvIQKNDuOdBLsHDfkAa9j1FSW1lht696+bWBwB8fGtyI2THqVJRO8SuTKB/Kn/P0c+ZkHgV1ciKuqibPNxEvJ7HoZ4JKJqLjh2b5AjYindnobiubLORkkVdsNfG6BhAgMBAAGjVTBTMDIGA1UdEQQrMCmCCWxvY2FsaG9zdIYcaHR0cHM6Ly9sb2NhbGhvc3Qvc2hpYmJvbGV0aDAdBgNVHQ4EFgQUVEqoNT816FfPxhzECyQkrl2+S/MwDQYJKoZIhvcNAQELBQADggGBAAHmJAxSnuC9us9XmKMnfbQq+mHkM/z8781H4Jm9hN7qCbwZ2XyWGCwoBkeK+my/rDSqJdqasJ0haIfH9HRmSWeRULQNd1KntbH7H53mq7INcUpe68qLqAKjIOaYzbOSc52v1QLAEgE6tOCEhI7fH96BRLSV6cMqCedQTzLONzmeIiXeWy7mQlDZmKxdU7oFxu/rUuxHNR67UHk7BZhPxiY1cwBdjPnRWwL55ngFQkLfSEOEiTO6EagaW2gGkpdOq7njVv/y3OstZfIXAijO4uxKXPV1wxmTZVnw3vOvn/Sz26gmBiMlr+fJg1+uD3Xy9JLwjdvluOvENiYlEakojm4Yl3118Z4DUhscPoW9mplN3DbPiNLmtUJpUXQ6J7Xoys+/wEOXhZxc00gph1W4LOM/dBhOn+U+dkBaxgRFibNCVg8Il4Gq98mX4lvluPeLn2TsvzcmqdjRfllgvAniinvJsTF3N+AQnAFVCUCfZpYlZuD8QnyPInoo7sbvJVy3YQ==',
        ],
    ],
    'validate.authnrequest' => true,
    'validate.logout' => true,
    'sign.logout' => true,
    'redirect.sign' => true,
    'redirect.validate' => true,
];
