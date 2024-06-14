<?php

namespace App\Enums;

use App\Traits\EnumToArray;

enum OrderStatuses: string
{
    use EnumToArray;
    case Active = 'active';
    case Pending = 'pending';
    case Processing = 'processing';
    case Completed = 'completed';
    case Cancelled = 'cancelled';

}
