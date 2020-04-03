<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;


class PlansController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;    
    }

    public function index()
    {
        return view('admin.pages.plans', ['plans' => $this->repository->get() ]);
    }
}
