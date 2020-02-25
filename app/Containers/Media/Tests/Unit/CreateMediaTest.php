<?php

namespace App\Containers\Media\Tests\Unit;

use App\Containers\Attachment\Models\Attachment;
use App\Containers\Media\Models\Media;
use App\Containers\Media\Tests\TestCase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use App\Containers\Media\Tasks\CreateMediaTask;

/**
 * Class CreateMediaTest.
 *
 * @group media
 * @group unit
 */
class CreateMediaTest extends TestCase
{

    /**
     * @test
     */
    public function testCreateMedia_()
    {

        $data = array(
            'uploadedName' => 'test_name',
            'storageType' => 'local',
        );

        $file = UploadedFile::fake()->image('test.png');
        $file->uploadedName = $data['uploadedName'];
        $file->storageType = $data['storageType'];

        $task = App::make(CreateMediaTask::class);
        $media = $task->run([$file]);


        // asset the returned object is an instance of the User
        $this->assertInstanceOf(Collection::class, $media);

        $first = $media->first();
        $this->assertInstanceOf(Media::class, $first);

    }



    /**
     * @test
     */
    public function testCreateMultipleMedia_()
    {
        $arrFiles = array();

        $arrData = array(
            array(
                'uploadedName' => 'test_name_1',
                'storageType' => 'local_1',
            ),
            array(
                'uploadedName' => 'test_name_2',
                'storageType' => 'local_2',
            )
        );

        foreach ($arrData as $data)
        {
            $file = UploadedFile::fake()->image('test.png');
            $file->uploadedName = $data['uploadedName'];
            $file->storageType = $data['storageType'];

            array_push($arrFiles, $file);
        }


        $task = App::make(CreateMediaTask::class);
        $media = $task->run($arrFiles);


        // asset the returned object is an instance of the User
        $this->assertInstanceOf(Collection::class, $media);

        foreach ($arrData as $key => $data)
        {
            $first = $media->get($key);
            $this->assertInstanceOf(Media::class, $first);
        }
    }

}
