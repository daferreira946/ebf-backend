<?php

namespace App\Helpers\Enums;

Enum MaritalStatus: string
{
    case Single = 'Single';
    case Married = 'Married';
    case Separate = 'Separate';
    case Divorced = 'Divorced';
    case Widower = 'Widower';
}