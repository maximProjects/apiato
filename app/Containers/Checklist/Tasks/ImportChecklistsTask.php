<?php

namespace App\Containers\Checklist\Tasks;

use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;

use PhpOffice\PhpSpreadsheet\IOFactory as IOFactory;
use PhpOffice\PhpSpreadsheet\Reader as ExcReader;


class ImportChecklistsTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($files)
    {
        try {


            $result = [];
            $f = $files['file'];
            $file_dest = $f->getPathName();

            $reader = IOFactory::createReaderForFile($file_dest);
            $spreadsheet = $reader->load($file_dest);
            $arr_parse = $spreadsheet->getActiveSheet()->toArray(null,true,true,false);
            unset($arr_parse[0]);
            $newArr = [];
            $k=1;
            foreach ($arr_parse as $key => $arr_item) {
                                if($arr_item[0] == null &&
                                       $arr_item[1] == null &&
                                        $arr_item[2] == null &&
                                        $arr_item[3] == null &&
                                        $arr_item[4] == null &&
                                       $arr_item[5] == null) {
                                        unset($arr_parse[$key]);
                    } else {
                                                $newArr[$k] = $arr_parse[$key];
                                                $k++;

                 }
            }
            $arr_parse = $newArr;
            $parents = [
                        0 => 0,
                        1 => 0,
                        2 => 0,
                        3 => 0,
                        4 => 0
            ];

            foreach ($arr_parse as $row_key => $row) {

                foreach ($row as $key => $value) {
                    //if no checkpoint
                    if ($key != 4) {

                        // checklist creation
                        if (!empty($value)) {

                            if($key == 0) {
                                $parents = [
                                    0 => 0,
                                    1 => 0,
                                    2 => 0,
                                    3 => 0,
                                    4 => 0
                                ];
                            }

                            $parent_id = 0;
//                            if (isset($row[$key - 1]) && !empty($row[$key - 1])) {
//
//                            }
                            if($key > 0)
                            {
                                $parent_id = (int)$parents[$key - 1];
                            }


                            $is_group = 0;


                            $dataChecklist = [
                                'name' => $value,
                                'is_template' => 1,
                                'is_group' => $is_group,
                            ];

                            if($parent_id != 0) {
                                $dataChecklist['parent_id'] = $parent_id;
                            }



                            if($this->checkGroup($arr_parse, $row_key, $key)){

                                $dataChecklist['is_group'] = 1;
                                $checklist = Apiato::call('Checklist@CreateChecklistTask', [$dataChecklist]);
                                $parents[$key] = $checklist->id;
                                if($parent_id == 0) {
                                    $dataJobType = [
                                        "checklist_id" => $checklist->id,
                                        "is_template" => 1,
                                        "name" => $dataChecklist['name']
                                    ];
                                }


                                $thisKey = $key;
                                $noChild = false;
                                while ($thisKey < 3){
                                    $thisKey++;
                                    if($row[$thisKey]!=null) {

                                        $noChild = true;
                                    }
                                }
                                if($noChild == false) {

                                    $dataChecklist['is_group'] = 0;
                                    $checklist = Apiato::call('Checklist@CreateChecklistTask', [$dataChecklist]);
                                }

//                                $checklistNoGroup = Apiato::call('Checklist@CreateChecklistTask', [$dataChecklist]);
//                                if($parent_id == 0) {
//                                $dataJobType = [
//                                    "checklist_id" => $checklistNoGroup->id,
//                                    "is_template" => 1,
//                                    "name" => $dataChecklist['name']
//                                ];
//                                }

                            } else {
                                $checklist = Apiato::call('Checklist@CreateChecklistTask', [$dataChecklist]);

                                $parents[$key] = $checklist->id;
                            }



                            $checklistId = $checklist->id;




                        }

                    //if chekpoint
                    } else {

                       //  checkpoint creation
                        $dataCheckpoint = [
                            'name' => $value,
                            'is_template' => 1

                        ];

                        if (isset($checklistId)) {
                            $dataCheckpoint['checklist_id'] = $checklistId;
                        }
                        $checkpoint = Apiato::call('Checkpoint@CreateCheckpointTask', [$dataCheckpoint]);

                    }
                }


            }
            return ['status' => true];


        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }

    public function checkGroup($data, $row_key, $key)
    {
        $result = 0;
        $rows = count($data);
        $i = $row_key;


        while ($i <= $rows):
            $row = $data[$i];

            foreach($row as $element_key => $value)
            {

                if($row_key == $i && $key < $element_key && !empty($value) && $element_key <4) {

                    return 1;
                }

                if($i > $row_key && !empty($value) && $element_key <4) {
                    if($key < $element_key) {
                        return 1;
                    } else {
                        return 0;
                    }
                }

            }
            $i++;
        endwhile;
        return $result;
    }
}
