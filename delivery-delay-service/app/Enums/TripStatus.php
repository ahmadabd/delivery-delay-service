<?php

namespace App\Enums;

enum TripStatus: string
{
    case ASSIGNED = 'assigned';
    case AT_VENDOR = 'at_vendor';
    case PICKED = 'picked';
    case DELIVERED = 'delivered';
}