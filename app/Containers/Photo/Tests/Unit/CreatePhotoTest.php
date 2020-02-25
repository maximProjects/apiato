<?php

namespace App\Containers\Photo\Tests\Unit;

use App;
use App\Containers\Photo\Tasks\CreatePhotoTask;
use App\Containers\Photo\Tests\TestCase;
use Illuminate\Support\Collection;
use App\Containers\Media\Tasks\CreateMediaTask;
use Illuminate\Http\UploadedFile;
use App\Containers\Photo\Models\Photo;

/**
 * Class CreatePhotoTest.
 *
 * @group photo
 * @group unit
 */
class CreatePhotoTest extends TestCase
{

    /**
     * @test
     */
    public function testCreatePhoto_()
    {
        //Create test Media
        $data = array(
            'uploadedName' => 'test_name',
            'storageType' => 'local',
        );
        $file = UploadedFile::fake()->image('test.png');
        $file->uploadedName = $data['uploadedName'];
        $file->storageType = $data['storageType'];

        $task = App::make(CreateMediaTask::class);
        $media = $task->run([$file]);


        //Create Document with Media attachment
        $data = array(
            'media_id' => $media->first()->id,
            'title' => 'Test title',
            'description' => 'Test description',
            'alt' => 'Test alt',
            'meta' => 'Test meta'
        );

        $task = App::make(CreatePhotoTask::class);
        $documents = $task->run([$data]);

        // asset the returned object is an instance of the User
        $this->assertInstanceOf(Collection::class, $documents);

        $first = $documents->first();
        $this->assertInstanceOf(Photo::class, $first);
    }



    /**
     * @test
     */
    public function testCreateMultiplePhotos_()
    {
        //Create test Media
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

        foreach ($arrData as $data) {

            $file = UploadedFile::fake()->image('test.png');
            $file->uploadedName = $data['uploadedName'];
            $file->storageType = $data['storageType'];

            $task = App::make(CreateMediaTask::class);
            $media = $task->run([$file]);

            //Create Document with Media attachment
            $data = array(
                'media_id' => $media->first()->id,
                'title' => 'Test title',
                'description' => 'Test description',
                'alt' => 'Test alt',
                'meta' => 'Test meta'
            );

            $task = App::make(CreatePhotoTask::class);
            $documents = $task->run([$data]);

            // asset the returned object is an instance of the User
            $this->assertInstanceOf(Collection::class, $documents);

            $first = $documents->first();
            $this->assertInstanceOf(Photo::class, $first);
        }
    }
}
