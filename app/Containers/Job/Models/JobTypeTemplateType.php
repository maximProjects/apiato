<?php

namespace App\Containers\Job\Models;


use BenSampo\Enum\Enum;

final class JobTypeTemplateType extends Enum{

    const SystemTemplate = 0;
    const UserTemplate = 1;
}