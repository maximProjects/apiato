<?php

namespace App\Containers\Report\UI\API\Controllers;

use App\Containers\Report\UI\API\Requests\CreateReportRequest;
use App\Containers\Report\UI\API\Requests\DeleteReportRequest;
use App\Containers\Report\UI\API\Requests\GetAllReportsRequest;
use App\Containers\Report\UI\API\Requests\FindReportByIdRequest;
use App\Containers\Report\UI\API\Requests\GetReportProjectRequest;
use App\Containers\Report\UI\API\Requests\UpdateReportRequest;
use App\Containers\Report\UI\API\Transformers\ReportTransformer;

use App\Containers\Report\UI\API\Requests\CreateReportTypeRequest;
use App\Containers\Report\UI\API\Requests\DeleteReportTypeRequest;
use App\Containers\Report\UI\API\Requests\GetAllReportTypesRequest;
use App\Containers\Report\UI\API\Requests\FindReportTypeByIdRequest;
use App\Containers\Report\UI\API\Requests\UpdateReportTypeRequest;
use App\Containers\Report\UI\API\Transformers\ReportTypeTransformer;

use App\Ship\Parents\Controllers\ApiController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Ship\Transporters\DataTransporter;
use PhpOffice\PhpWord\Writer\PDF;

/**
 * Class Controller
 *
 * @package App\Containers\Report\UI\API\Controllers
 */
class Controller extends ApiController
{
    /**
     * @param CreateReportRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createReport(CreateReportRequest $request)
    {

        $report = Apiato::call('Report@CreateReportAction', [new DataTransporter($request)]);

        return $this->created($this->transform($report, ReportTransformer::class));
    }

    /**
     * @param FindReportByIdRequest $request
     * @return array
     */
    public function findReportById(FindReportByIdRequest $request)
    {
        $report = Apiato::call('Report@FindReportByIdAction', [$request]);

        return $this->transform($report, ReportTransformer::class);
    }

    /**
     * @param GetAllReportsRequest $request
     * @return array
     */
    public function getAllReports(GetAllReportsRequest $request)
    {

        $reports = Apiato::call('Report@GetAllReportsAction', [$request]);

        var_dump($reports);
        die("remove die Controller 63 line");

        return $this->transform($reports, ReportTransformer::class);
    }

    /**
     * @param UpdateReportRequest $request
     * @return array
     */
    public function updateReport(UpdateReportRequest $request)
    {
        $report = Apiato::call('Report@UpdateReportAction', [$request]);

        return $this->transform($report, ReportTransformer::class);
    }

    /**
     * @param DeleteReportRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteReport(DeleteReportRequest $request)
    {
        Apiato::call('Report@DeleteReportAction', [$request]);

        return $this->noContent();
    }

    /**
     * @param CreateReportTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createReportType(CreateReportTypeRequest $request)
    {
        $reporttype = Apiato::call('Report@CreateReportTypeAction',  [new DataTransporter($request)]);

        return $this->created($this->transform($reporttype, ReportTypeTransformer::class));
    }

    /**
     * @param FindReportTypeByIdRequest $request
     * @return array
     */
    public function findReportTypeById(FindReportTypeByIdRequest $request)
    {
        $reporttype = Apiato::call('Report@FindReportTypeByIdAction', [$request]);

        return $this->transform($reporttype, ReportTypeTransformer::class);
    }

    /**
     * @param GetAllReportTypesRequest $request
     * @return array
     */
    public function getAllReportTypes(GetAllReportTypesRequest $request)
    {
        $reporttypes = Apiato::call('Report@GetAllReportTypesAction', [$request]);

        return $this->transform($reporttypes, ReportTypeTransformer::class);
    }

    /**
     * @param UpdateReportTypeRequest $request
     * @return array
     */
    public function updateReportType(UpdateReportTypeRequest $request)
    {
        $reporttype = Apiato::call('Report@UpdateReportTypeAction', [$request]);

        return $this->transform($reporttype, ReportTypeTransformer::class);
    }

    /**
     * @param DeleteReportTypeRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteReportType(DeleteReportTypeRequest $request)
    {
        Apiato::call('Report@DeleteReportTypeAction', [$request]);

        return $this->noContent();
    }

    public function getProjectReport(GetReportProjectRequest $request)
    {
        $result = Apiato::call('Report@GetReportProjectAction', [new DataTransporter($request)]);
        return $result;
    }

    public function getFinancialReport(GetReportProjectRequest $request)
    {
        $result = Apiato::call('Report@GetFinancialReportAction', [new DataTransporter($request)]);
        return $result;
    }

}
