<?php

namespace App\Containers\TimeRegistry\Models;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TaskRegistryType extends Enum
{
    const Worker = 3;
    const Office = 2;
}
