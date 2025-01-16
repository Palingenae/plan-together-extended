<?php

namespace Api\Enums;

enum ActivityStatus
{
    case Draft;
    case Planned;
    case Validated;
    case Canceled;
}
