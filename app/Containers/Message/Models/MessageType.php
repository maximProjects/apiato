<?php


namespace App\Containers\Message\Models;

use BenSampo\Enum\Enum;

final class MessageType extends Enum
{
    const Info = 1;

    const Notification = 2;

    const Warning = 3;

    const Alert = 4;

    const Deviation = 5;

    const Discrepancy = 6;
}
