<?php

namespace App\Enums;

enum RouteName: string
{
    // APP
    case APP = 'roda';

    // AUTH
    case LOGIN = 'login';
    case REGISTER = 'register';

    // WEB
    case INDEX = 'index';

}
