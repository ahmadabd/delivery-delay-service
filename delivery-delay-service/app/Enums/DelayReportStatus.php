<?php

namespace App\Enums;

enum DelayReportStatus: string
{
    case PROCESSING = "processing";
    case WAITING = "waiting";
    case PROCESSED = "processed";
}