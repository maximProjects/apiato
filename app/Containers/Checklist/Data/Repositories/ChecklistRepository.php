<?php

namespace App\Containers\Checklist\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;

/**
 * Class ChecklistRepository
 */
class ChecklistRepository extends Repository
{

    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id' => '=',
        'is_template' => '=',
        // ...
    ];

    public function getWithChild($checklists, $depth = 2)
    {

        $result = [];
        foreach ($checklists as $checklist) {
            $result[] = $checklist;
            if(isset($checklist->children)) {
                foreach ($checklist->children as $child) {
                    $result[] = $child;
                    if($depth == 3) {
                        if($child->children) {
                            foreach ($child->children as $subChild) {
                                $result[] = $subChild;
                            }
                        }
                    }
                }
            }
        }
        return $result;
    }
}
