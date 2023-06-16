<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    //
    public function __invoke(): array {
        return [
            'success' => true,
            'message' => 'Bienvenue dans le nouvelle api de agendapro',
            'data' => [
                'service' => 'AGENDAPRO',
                'version' => 1.0,
                'language' => app()->getLocale(),
                'support' => 'abdoullatifsooba7@gmail.com',
            ],
        ];
    }
}
