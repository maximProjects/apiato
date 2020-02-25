<?php

namespace App\Containers\Task\Models;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class TaskAttachmentType extends Enum
{
    const ALL = 1;
}
