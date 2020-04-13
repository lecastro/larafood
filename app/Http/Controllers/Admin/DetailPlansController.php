<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DetailPlans;
use App\Models\Plan;
use Illuminate\Http\Request;

class DetailPlansController extends Controller
{
    private $detailPlans;
    private $plan;

    public function __construct(DetailPlans $detailPlans, Plan $plan)
    {
        $this->detailPlans = $detailPlans;
        $this->plan = $plan;
    }

    public function index($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view('admin.pages.details.index', [
            'plan' => $plan,
            'details' => $details
        ]);
    }

    public function create($urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }

        return view('admin.pages.details.create', [
            'plan' => $plan,
        ]);
    }

    public function store(Request $request, $urlPlan)
    {
        if (!$plan = $this->plan->where('url', $urlPlan)->first()) {
            return redirect()->back();
        }
        
        $plan->details()->create($request->all());

        return redirect()->route('details.plans.index', $plan->url);
    }
}
