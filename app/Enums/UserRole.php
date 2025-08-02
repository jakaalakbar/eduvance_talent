<?php

namespace App\Enums;

enum UserRole: int
{
    case ADMIN = 0;
    case STUDENT = 1;
    case UNKNOWN = 2;
}
