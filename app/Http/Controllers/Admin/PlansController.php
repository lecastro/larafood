<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlansController extends Controller
{
    private $repository;

    public function __construct(Plan $plan)
    {
        $this->repository = $plan;
    }

    public function index()
    {
        return view('admin.pages.index', ['plans' => $this->repository->latest()->paginate()]);
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $data['url'] = Str::kebab($request->name);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($url)
    {
        $data = $this->repository->where('url', $url)->first();

        if (!$data) {
            return redirect()->back();
        }

        return view('admin.pages.show', ['plans' => $data]);
    }

    public function delete($url)
    {
        $data = $this->repository->where('url', $url)->first();

        if (!$data) {
            return redirect()->back();
        }

        $data->delete();

        return redirect()->route('plans.index');
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.index', [
            'plans' => $plans,
            'filters' => $filters
        ]);
    }

    public function edit($url)
    {
        $data = $this->repository->where('url', $url)->first();

        if (!$data) {
            return redirect()->back();
        }

        return view('admin.pages.edit', [
            'plans' => $data
        ]);
    }

    public function update(Request $request, $url)
    {
        $data = $this->repository->where('url', $url)->first();

        if (!$data) {
            return redirect()->back();
        }

        $data->update($request->all());

        return redirect()->route('plans.index');
    }
}
