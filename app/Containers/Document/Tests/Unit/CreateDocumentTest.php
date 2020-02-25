<?php

namespace App\Containers\Document\Tests\Unit;

use App;
use App\Containers\Document\Tasks\CreateDocumentTask;
use App\Containers\Document\Tests\TestCase;
use App\Containers\Media\Tasks\CreateMediaTask;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use App\Containers\Document\Models\Document;

/**
 * Class CreateDocumentTest.
 *
 * @group document
 * @group unit
 */
class CreateDocumentTest extends TestCase
{

    /**
     * @test
     */
    public function testCreateDocument_()
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

        $task = App::make(CreateDocumentTask::class);
        $documents = $task->run([$data]);

        // asset the returned object is an instance of the User
        $this->assertInstanceOf(Collection::class, $documents);

        $first = $documents->first();
        $this->assertInstanceOf(Document::class, $first);
    }



    /**
     * @test
     */
    public function testCreateMultipleDocuments_()
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

            $task = App::make(CreateDocumentTask::class);
            $documents = $task->run([$data]);

            // asset the returned object is an instance of the User
            $this->assertInstanceOf(Collection::class, $documents);

            $first = $documents->first();
            $this->assertInstanceOf(Document::class, $first);
        }
    }
}
