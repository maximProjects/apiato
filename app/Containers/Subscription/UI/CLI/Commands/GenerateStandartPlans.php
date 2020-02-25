<?php

namespace App\Containers\Subscription\UI\CLI\Commands;

use Apiato\Core\Foundation\Apiato;
use App\Ship\Parents\Commands\ConsoleCommand;
use App\Containers\Authorization\Models\Permission;
use Rennokki\Plans\Models\PlanModel;

/**
 * Class HelloWorldCommand
 *
 * @author  Mahmoud Zalt  <mahmoud@zalt.me>
 */
class GenerateStandartPlans extends ConsoleCommand
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'apiato:generate:plans';

    /**
     * The console command description.
     *
     * @var string:
     */
    protected $description = 'Generate plans';

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
                //$permissons = Permission::all()->count();
        $plansCount = PlanModel::where('id', '<>', 1)->count();
        if($plansCount > 0) {
           // echo "Plans already generated \n";
           // exit;
        }

        $apiato = new Apiato();

        $permissons = Permission::all()->toArray();
        $featuresMini = [];
        $featuresMidi = [];
        $featuresMaxi = [];

        foreach ($permissons as $key => $permisson) {
            $pArr = explode("-", $permisson["name"]);
            $permissons[$key]["container"] = end($pArr);
        }



        foreach($permissons as $p) {
            $featuresMidi[] = [
                "name" => $p['name'],
    	        "code" => $p['name'],
    	        "type" => "feature"
            ];

            $featuresMaxi[] = [
                "name" => $p['name'],
                "code" => $p['name'],
                "type" => "feature"
            ];
        }


        $planMiniBlock = [
            "workincapacitytypes",
            "workincapacities",
            "timeregistries",
            "reports",
            "deviations",
            "discrepancities",
            "checklists",
            "checkpoints"

        ];
        foreach($permissons as $p) {
            if(!in_array($p["container"], $planMiniBlock)) {
                $featuresMini[] = [
                    "name" => $p['name'],
                    "code" => $p['name'],
                    "type" => "feature"
                ];
            }
        }

                $plan = PlanModel::where('name', '=', 'Mini')->first();

               $features = $apiato->call("Subscription@SubscriptionUpdatePlanTask", [$plan->id, ['features' => $featuresMini]]);

               echo "Mini plan generated ok \n";

                $plan = PlanModel::where('name', '=', 'Midi')->first();
                $features = $apiato->call("Subscription@SubscriptionUpdatePlanTask", [$plan->id, ['features' => $featuresMidi]]);

                echo "Midi plan generated ok \n";

                $plan = PlanModel::where('name', '=', 'Maxi')->first();

                echo "Maxi plan generated ok \n";

                $features = $apiato->call("Subscription@SubscriptionUpdatePlanTask", [$plan->id, ['features' => $featuresMaxi]]);

                echo "All plans generated \n";
    }
}
