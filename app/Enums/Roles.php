<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum Roles: string
{
    use EnumToArray;

    case Admin = 'admin';
    case Employee = 'employee';


}
