<?php

return [
    'Introduction' => [
        'url' => '/docs/introduction'
    ],
    'Getting Started' => [
        'url' => '/docs/getting-started',
        'children' => [
            'Installation' => '/docs/getting-started/',
            'Create a domain' => '/docs/getting-started/create-domain/',
            'Move forward' => '/docs/getting-started/moving-forward/',
            'Troubleshooting' => '/docs/getting-started/troubleshooting/',
        ],
    ],
    'Repository setup' => [
        'url' => '/docs/repository',
    ],
    'Webhooks' => [
        'url' => '/docs/webhooks',
    ],
    'Commands' => [
        'url' => '/docs/commands/domains',
        'children' => [
            'Domains' => '/docs/commands/domains',
            'Deploy' => '/docs/commands/deploy',
            'Databases' => '/docs/commands/databases',
            'Backups' => '/docs/commands/backups',
            'Alarms' => '/docs/commands/alarms',
            'System' => '/docs/commands/system',
            'Upgrade' => '/docs/upgrade'
        ]
    ],
    'Platform' => [
        'url' => '/docs/platform/compatibility',
        'children' => [
            'Compatibility' => '/docs/platform/compatibility',
            'Software' => '/docs/platform/software',
            'Security' => '/docs/platform/security',
            'Roadmap' => '/docs/roadmap'
        ]
    ],
    'Advanced' => [
        'url' => '/docs/advanced/installer',
        'children' => [
            'Installer' => '/docs/advanced/installer'
        ]
    ],
    'Contribute' => [

    ],
    'About' => [
        'url' => '/docs/about',
        'children' => [
            'url' => '/docs/contribute'
        ]
    ]
];
