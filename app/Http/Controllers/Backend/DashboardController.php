<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Command;
use Illuminate\Support\Facades\DB;

/**
 * Class DashboardController.
 */
class DashboardController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $views = DB::table("views")->where("variable","views")->first();
        if(is_null($views)){
            $views = 0;
        }else{
            $views = $views->valuevariable;
        }
        $countCommands = DB::table('commands')->count('id');
        $commands = Command::paginate(15);
        return view('backend.dashboard',[
            'views'=>$views,
            'countCommands'=>$countCommands,
            'commands'=>$commands
        ]);
    }
}
