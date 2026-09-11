<?php

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: '1.0.0',
    title: 'Reservation API',
    description: 'Housing supplier offers and reservation API'
)]
#[OA\Server(
    url: 'http://localhost:8081',
    description: 'Local Docker environment'
)]
class OpenApi
{
}
