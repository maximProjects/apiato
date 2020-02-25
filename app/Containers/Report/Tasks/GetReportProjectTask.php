<?php

namespace App\Containers\Report\Tasks;

use App\Containers\Project\Models\Project;
use App\Containers\Report\Data\Repositories\ReportRepository;
use App\Containers\TimeRegistry\Models\TimeRegistry;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Tasks\Task;
use Carbon\CarbonInterval;
use Exception;
use Dompdf\Dompdf;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
//use PhpOffice\PhpWord\Writer\PDF\DomPDF;

class GetReportProjectTask extends Task
{

    protected $repository;

    public function __construct(ReportRepository $repository)
    {
        $this->repository = $repository;
    }

    public function run($data)
    {
        try {
            $project = Project::find($data['project_id']);
            $titleHtml = "<h1  style='text-align: center;'>" . $project->name . "</h1>";
            $where_query_params = [['project_id', '=', $data['project_id']]];

            if($data["date_start"]) {
                $where_query_params[] = ['date_start', '>=', $data["date_start"]];
            }

            if($data["date_end"]) {
                $where_query_params[] = ['date_end', '<=', $data["date_end"]];
            }

            $TimeRagistries = TimeRegistry::where($where_query_params)->with(['jobs','user'])->get();

            if(count($TimeRagistries->toArray()) > 0) {


                $style = "<style>";
                $style .= "table { text-align:center; }";
                $style .= "table th td { font-size:10px; text-align:center; align:center; }";
                $style .= "table tr td { font-size:10px; text-align:center;}";
                $style .= "</style>";
                $table = "<table border='1' cellspacing='0' cellpadding='0'>";
                $table .= "<tr>

                    <th>
                        <span style='font-size:12px;'>Ansatt</span> 
                    </th>
                    <th>
                        <span style='font-size:12px; '>Dato</span> 
                    </th>
                    <th>
                        <span style='font-size:12px;'>Startetid</span> 
                    </th>
                    <th>
                        <span style='font-size:12px;'>Sluttis</span> 
                    </th>
                    <th>
                        <span style='font-size:12px;'>Antal project</span> 
                    </th>
                    <th>
                       <span style='font-size:12px;'>Time Extra</span> 
                    </th>
                    <th>
                        <span style='font-size:12px;'>Stillingskategorier</span> 
                    </th>
                    <th>
                        <span style='font-size:12px;'>Arbeids Beskrivelse</span>
                    </th>
                   <th>
                        <span style='font-size:12px;'>Extra Beskrivelse</span>
                    </th>
            </tr>";
                $total_hours = 0;
                $total_extra_time = 0;
                foreach ($TimeRagistries as $tm) {
                    $jobs = "";

                    if ($tm->jobs()->count() > 0) {
                        $i = 1;
                        foreach ($tm->jobs()->get() as $j) {
                            if (!empty($j->name)) {
                                $jobs .= $j->name;
                                if ($i != $tm->jobs()->count()) {
                                    $jobs .= ", ";
                                }
                            }
                            $i++;

                        }
                    }
                    $created_at = '';
                    $date_start = '';
                    $date_end = '';
                    $hours = 0;
                    $extra_time = 0;

                    if ($tm->balance()->first()) {
                        $hours = $tm->balance()->first()->hours;

                        $total_hours = $total_hours + $hours;
                    }

                    if ($tm->balance()->first()) {
                        $extra_time = $tm->balance()->first()->extra_time;
                        $total_extra_time = $total_extra_time + $extra_time;
                    }
                    if ($tm['created_at']) {
                        $created_at = Carbon::createFromFormat('Y-m-d H:i:s', $tm->created_at)->format('Y-m-d');
                    }
                    if ($tm['date_start']) {
                        $date_start = Carbon::createFromFormat('Y-m-d H:i:s', $tm->date_start)->format('Y-m-d');
                    }
                    if ($tm['date_end']) {
                        $date_end = Carbon::createFromFormat('Y-m-d H:i:s', $tm->date_end)->format('Y-m-d');
                    }

                    $table .= "<tr>
                                <td>
                                    <span style='font-size:10px; white-space: nowrap;'>" . $tm->user()->first()->name . " </span>
                                </td>
                                
                                <td>
                                    <span style='font-size:10px; white-space: nowrap;'>" . $created_at . " </span>
                                </td>
                                
                                <td>
                                    <span style='font-size:10px; white-space: nowrap;'>" . $date_start . " </span>
                                </td>
                                
                                <td>
                                    <span style='font-size:10px; white-space: nowrap;'>" . $date_end . " </span> 
                                </td>
                                    
                                <td>
                                    <span style='font-size:10px; white-space: nowrap;'>" . hoursMinutesFromSeconds($hours) . " </span> 
                                    
                                </td>
                                
                                <td>
                                    <span style='font-size:10px; white-space: nowrap;'>" . hoursMinutesFromSeconds($extra_time) . " </span> 
                                </td>
                            
                                 <td>
                                    <span style='font-size:10px;'>" . $jobs . " </span>
                                </td>
                                
                                <td>
                                    <span style='font-size:10px;'>" . $project->description . " </span>
                                </td>
                                    
                                <td>
                                    <span style='font-size:10px;'>" . $project->additional_information . " </span>
                                </td>

                </tr>";


                }
                $table .= "</tablle>";


                $footer = '<p style="font-size: 12px; text-align: left;">';

                $footer .= "<strong>Total antail time </strong>" . hoursMinutesFromSeconds( $total_hours) . "<br>";

                $footer .= "<strong>Total extra time </strong>" . hoursMinutesFromSeconds( $total_extra_time) . "<br>";

                $footer .= "Periode: " . $data["date_start"] . " - " . $data["date_end"] . "<br>";

                $footer .= '</p>';
                $body = $style . $titleHtml . $table . $footer;

            } else {
                $body = $titleHtml ;
            }
            $dompdf = new Dompdf('report');


            $dompdf->loadHtml($body);

// (Optional) Setup the paper size and orientation
            $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
            $dompdf->render();

           // return $dompdf->stream();
// Output the generated PDF to Browser

            $output = $dompdf->output();

            $pdf = base64_encode($output);
            return response()->json([
                'pdf' => $pdf,
            ]);

        }
        catch (Exception $exception) {
            throw new NotFoundException();
        }
    }
}
