<?php
namespace Rascan\Hela\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Rascan\Hela\Http\Resources\LogResource;
use Rascan\Hela\Models\Log;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = Log::paginate();

        // return LogResource::collection($logs);

        return view('rascan::logs', compact('logs'));
    }
}
