<?php

namespace App\Containers\Checklist\Tasks;

use App\Containers\Checklist\Data\Repositories\ChecklistRepository;
use App\Containers\Checklist\Models\Checklist;
use App\Containers\Checkpoint\Models\Checkpoint;
use App\Ship\Exceptions\CreateResourceFailedException;
use App\Ship\Parents\Tasks\Task;
use Exception;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpSpreadsheet\IOFactory as IOFactory;

class ImportChecklistsTranslateTask extends Task
{

    protected $repository;

    public function __construct(ChecklistRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($files)
    {
        try {
            $checklists = Checklist::all();
            $checkpoints = Checkpoint::all();
            $result = [];
            $f = $files['file'];
            $file_dest = $f->getPathName();

            $reader = IOFactory::createReaderForFile($file_dest);
            $spreadsheet = $reader->load($file_dest);
            $arr_parse = $spreadsheet->getActiveSheet()->toArray(null,true,true,false);
            $langArr = $arr_parse[0];

            unset($arr_parse[0]);
            $newArr = [];
            $k=1;

            foreach ($arr_parse as $item) {
                $data = [];
                foreach($item as $key => $value) {
                    $l = trim(strtolower($langArr[$key]));
                    if(!empty($value)) {
                        $data[$l] = ['name' => $value];
                    }
                }
                foreach($checklists as $checklist) {
                    if($checklist->translate('no')->name == $data['no']['name']) {
                       $checklist->update($data);
                    }
                }

                foreach($checkpoints as $checkpoint) {
                    if($checkpoint->translate('no')->name == $data['no']['name']) {
                        $checkpoint->update($data);
                    }
                }
            }


            return ['status' => 'done'];
        }
        catch (Exception $exception) {
            throw new CreateResourceFailedException();
        }
    }
}
