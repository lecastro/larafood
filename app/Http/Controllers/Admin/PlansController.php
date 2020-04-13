<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\PlansRequest;

class PlansController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        return view('admin.pages.plans.index', ['plans' => $this->repository->latest()->paginate()]);
    }

    public function create()
    {
        return view('admin.pages.plans.create');
    }

    public function store(PlansRequest $request)
    {
        $this->repository->create($request->all());

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.show', ['plans' => $plan]);
    }

    public function delete($url)
    {
        $plan = $this->repository->with('details')->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        if ($plan->details->count() > 0) {
            return redirect()
                        ->back()
                        ->with('error', 'Existem detahes vinculados a esse plano, portanto não pode deletar');
        }
        
        $plan->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }

    public function edit($url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        return view('admin.pages.plans.edit', [
            'plans' => $plan
        ]);
    }

    public function update(PlansRequest $request, $url)
    {
        $plan = $this->repository->where('url', $url)->first();

        if (!$plan) {
            return redirect()->back();
        }

        $plan->update($request->all());

        return redirect()->route('plans.index');
    }
}
