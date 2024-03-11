<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employer\StoreRequest;
use App\Models\Employer;
use App\Services\Employer\Http\EmployerIndexFilters;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EmployerIndexFilters $filters)
    {
        $employers = Employer::when(!user()->is_admin, function ($search) {
            return $search->where('user_id', user()->id);
        })
            ->when($filters->employer_id, function ($search) use ($filters) {
                return $search->where('id', $filters->employer_id);
            })->paginate(config('app.pagination'));

        foreach ($employers as $employer) {
            $employer->activeVacancies = 'active';
            if (
                $employer
                    ->vacancies()
                    ->where('user_id', user()->id)
                    ->whereStatus('active')->count() === 0
            ) {
                $employer->activeVacancies = 'no active';
            }
        }
        return view('employers.index', compact('employers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $employer = new Employer($data);
        $employer->user_id = user()->id;
        $employer->save();
        return redirect()->route('employers.show', [$employer->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employer = Employer::findOrFail($id);
        return  view('employers.show', compact('employer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $employer = Employer::findOrFail($id);

        $this->authorize('update', $employer);

        return view('employers.edit', compact('employer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $employer = Employer::findOrFail($id);

        $this->authorize('update', $employer);

        $employer->update($data);
        return redirect()->route('employers.show', [$employer->id]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');
        $query = Employer::query();
        if (user()->is_admin === false) {
            $query->where('user_id', user()->id);
        }

        $employers = $query->where('title', 'like', '%' . $searchTerm . '%')->get();

        $result = [];
        foreach ($employers as $employer) {
            $result[] = ['id' => $employer->id, 'text' => $employer->title];
        }

        return response()->json($result);
    }
}
