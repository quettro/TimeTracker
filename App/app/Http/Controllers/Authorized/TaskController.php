<?php

namespace App\Http\Controllers\Authorized;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        return view('main.Authorized.Task.index')
            ->with('collection', Auth::user()->tasks()->with(['project'])->paginate(50));
    }
}
