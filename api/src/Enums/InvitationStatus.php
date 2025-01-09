<?php

namespace App\Enums;

enum InvitationStatus
{
    case Pending;
    case Accepted;
    case Refused;
    case Expired;
}
