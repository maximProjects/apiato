<?php

namespace App\Containers\Settings\Tasks;

use App\Ship\Parents\Tasks\Task;

class FormatRelationArrayTask extends Task
{
    public function run($data)
    {
        if($data && !is_array($data))
            $data = [$data];

        if(!array_key_exists('0', $data) && !empty($data))
            $data = [$data];
        return $data;
    }
}
