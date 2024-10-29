<?php

return [
    [
        'name' => 'Currencies',
        'flag' => 'omarbotble.currency.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'omarbotble.currency.create',
        'parent_flag' => 'omarbotble.currency.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'omarbotble.currency.edit',
        'parent_flag' => 'omarbotble.currency.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'omarbotble.currency.destroy',
        'parent_flag' => 'omarbotble.currency.index',
    ],
];
