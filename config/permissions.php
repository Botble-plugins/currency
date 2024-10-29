<?php

return [
    [
        'name' => 'Currencies',
        'flag' => 'algoriza.currency.index',
    ],
    [
        'name' => 'Create',
        'flag' => 'algoriza.currency.create',
        'parent_flag' => 'algoriza.currency.index',
    ],
    [
        'name' => 'Edit',
        'flag' => 'algoriza.currency.edit',
        'parent_flag' => 'algoriza.currency.index',
    ],
    [
        'name' => 'Delete',
        'flag' => 'algoriza.currency.destroy',
        'parent_flag' => 'algoriza.currency.index',
    ],
];
