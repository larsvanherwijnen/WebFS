<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum OrderTypes: string
{
    use EnumToArray;
    case DineIn = 'dine_in';
    case TakeOut = 'take_out';
    case Imported = 'imported';
}
