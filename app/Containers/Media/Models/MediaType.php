<?php

namespace App\Containers\Media\Models;


use BenSampo\Enum\Enum;

final class MediaType extends Enum
{

    const Attachment = 0;
    const Photo = 1;
    const Document = 2;
    const Video = 3;
}