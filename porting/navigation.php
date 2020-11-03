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
    'Commands' => [
        'url' => '/docs/commands/domains',
        'children' => [
            'Domains' => '/docs/commands/domains',
            'Deploy' => '/docs/commands/deploy',
            'Databases' => '/docs/commands/databases',            
            'Backups' => '/docs/commands/backups',
            'System' => '/docs/commands/system',
        ]
    ],
    'Platform' => [
        'url' => '/docs/platform/compatibility',
        'children' => [
            'Compatibility' => '/docs/platform/compatibility',
            'Software' => '/docs/platform/software',
            'Security' => '/docs/platform/security',
        ]
    ],
    'Advanced' => [
        'url' =>'/docs/advanced/installer',
        'children' => [
            'Installer' => '/docs/advanced/installer'
        ]
    ],    
    'Roadmap' => [
        'url' =>'/docs/roadmap'
    ],
    'Upgrade' => [
        'url' => '/docs/upgrade'    
    ],
    'Contribute' => [
        'url' => '/docs/contribute'
    ],
    'About' => [
        'url' => '/docs/about'
    ]
];
