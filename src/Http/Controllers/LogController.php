<?php
namespace Rascan\Hela\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Rascan\Hela\Models\Log;

class LogController extends Controller
{
    public function index(Request $request)
    {
        $logs = Log::latest()->paginate();

        return view('rascan::logs', compact('logs'));
    }
}
