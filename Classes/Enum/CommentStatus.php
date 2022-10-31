<?php

namespace App\Classes\Enum;

enum CommentStatus
{
    case APPROBAL_PENDING;
    case APPROBAL_APPROVED;
    case APPROBAL_REJECTED;

}