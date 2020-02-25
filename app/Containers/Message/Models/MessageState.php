<?php


namespace App\Containers\Message\Models;

use BenSampo\Enum\Enum;

final class MessageState extends Enum
{
    const Draft = 0;

    const New = 1;

    const Active = 2;

    const Watched = 3;

    const Finished = 4;
}
