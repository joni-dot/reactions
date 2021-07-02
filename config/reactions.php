<?php

use JoniDot\Reactions\Enums\Type;

return [
    'default_reactions' => [
        Type::Like,
        Type::Dislike,
        Type::Love,
    ],
    'reaction_emojies' => [
        Type::Like => '&#x1F44D;',
        Type::Dislike => '&#x1F44E;',
        Type::Love => '&#x1F496;', 
    ],
];
