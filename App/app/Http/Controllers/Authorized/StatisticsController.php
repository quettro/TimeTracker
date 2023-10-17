<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class StatisticsController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $collection = Auth::user()
            ->availableProjects()->withSum('tasks', 'execution_time')->withCount(['tasks', 'tasksCompleted'])->paginate(50);

        return view('main.Authorized.Statistics.index')
            ->with('collection', $collection);
    }
}
