<?php

namespace App\Containers\Project\Models;


use BenSampo\Enum\Enum;

final class ProjectState extends Enum{

    const New   = 1;
    const Active   = 2;
    const Finished   = 3;

}