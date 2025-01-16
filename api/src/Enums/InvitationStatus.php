<?php

namespace Api\Enums;

enum InvitationStatus
{
    case Pending;
    case Accepted;
    case Refused;
    case Expired;
}
