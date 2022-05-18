<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.pages.dashboard.index');
    }

    public function cacheClear()
    {
            $commands = ['route:cache', 'config:cache', 'cache:clear', 'view:clear'];
            foreach ($commands as $command) {
                Artisan::call($command);
            }
            Cache::flush();
            $response['status'] = true;
        return response()->json($response);
    }
}
