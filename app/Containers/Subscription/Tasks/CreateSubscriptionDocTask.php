<?php

namespace App\Containers\Subscription\Tasks;

use App\Containers\Subscription\Data\Repositories\SubscriptionRepository;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\TemplateProcessor;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Config;
use PhpOffice\PhpWord\Writer\PDF\DomPDF;

class CreateSubscriptionDocTask extends Task
{

    protected $repository;

    public function __construct(SubscriptionRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run(array $data)
    {
        try {
            header('Content-Type: text/html; charset=utf-8');
            //setlocale(LC_TIME, "lt_LT.UTF-8");
             $template = new TemplateProcessor(Storage::disk('docs')->getAdapter()->getPathPrefix()."rules.docx");
             //$template = new PhpWord();
           // dump($template);
            $confirmed = 'Ne';
            if(isset($data['confirmed']) && $data['confirmed'])
            {
                $confirmed = "Taip";
            }
            $template->setValues([
                            'date' => Carbon::now()->format("Y-m-d"),
                            'plan_text' => $data['plan_text'],
                            'first_name' => $data['first_name'],
                            'last_name' => $data['last_name'],
                            'company_name' => $data['company_name'],
                            'company_number' => $data['company_number'],
                            'employees' => $data['employees'],
                            'address' => $data['address'],
                            'zip' => $data['zip'],
                            'city' => $data['city'],
                            'email' => $data['email'],
                            'phone' => $data['phone'],
                            'confirmed' => $confirmed,
                            'rules_text' => $data['rules_text'],
                ]);

            $path = Storage::disk('docs')->getAdapter()->getPathPrefix()."doc.docx";

           $save = $template->saveAs($path);
//            $phpWord = IOFactory::load($path);
//            $objWriter = IOFactory::createWriter($phpWord, "HTML");
//            $path_html = Storage::disk('local')->getAdapter()->getPathPrefix()."doc.html";
//            $objWriter->save($path_html);


            $phpWord = IOFactory::load($path);

         //   $domPdfPath = base_path().'/vendor/mpdf/mpdf/src/Mpdf.php';
            $domPdfPath = base_path().'/vendor/mpdf/mpdf/src/';

            \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
            \PhpOffice\PhpWord\Settings::setPdfRendererName('MPDF');

//            dump(\PhpOffice\PhpWord\Settings::getPdfRendererPath());
//            dump(\PhpOffice\PhpWord\Settings::getPdfRendererName());

            $objWriter = IOFactory::createWriter($phpWord, "PDF");

            $file_name = "doc_".md5(time());

            $path_pdf = Storage::disk('docs')->getAdapter()->getPathPrefix().$data['uid'].".pdf";
            $objWriter->save($path_pdf);

            return true;
        }
        catch (Exception $exception) {
           throw new NotFoundException();
        }
    }
}
