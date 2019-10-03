<?php

use App\Enums\FunctionType;
use App\Enums\ProjectType;

return [
    ProjectType::class => [
        ProjectType::RESTFUL => 'RESTful',
        ProjectType::NON_RESTFUL => 'Não RESTful',
    ],

    FunctionType::class => [
        FunctionType::STATIC => 'Estática',
        FunctionType::INSTANCE => 'De Instância',
    ],
];
