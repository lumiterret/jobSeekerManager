<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancy\StoreRequest;
use App\Models\Employer;
use App\Models\Person;
use App\Models\Vacancy;
use App\Services\Vacancy\Http\VacancyIndexFilters;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class VacancyController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(VacancyIndexFilters $filters)
    {
        $vacancy = new Vacancy();
        $statuses = $vacancy->statuses();
        $query = Vacancy::query()->with('employer');

        if (user()->is_admin === false) {
            $query->where('user_id', user()->id);
        }

        if ($filters->employer) {
            $employer = '%' . $filters->employer . '%';
            $query->whereRelation('employer',function (Builder $builder) use ($employer) {
                $builder->where('title', 'LIKE', $employer);
            });
        }
        $query->whereIn('vacancies.status', $filters->status)->orderByDesc('vacancies.created_at');
        $vacancies = $query->paginate(20);

        return view(
            'vacancies.index',
                compact(
                'vacancies',
                'statuses'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employers = Employer::orderByDesc('created_at')->pluck('title', 'id');
        return view('vacancies.create', compact('employers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $vacancy = new Vacancy();
        $vacancy->title = $data['title'];
        $vacancy->description = $data['description'];
        $vacancy->user_id = user()->id;
        if(isset($data['employer_id'])) {
            $vacancy->employer_id = $data['employer_id'];
        }
        $vacancy->save();
        return redirect()->route('vacancies.show', [$vacancy->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $this->authorize('view', $vacancy);

        $employers = Employer::orderByDesc('created_at')->pluck('title', 'id');
        $people = Person::orderBy('f_name')->get();

        return  view(
            'vacancies.tabs',
            compact(
                'vacancy',
                'people',
                'employers',
            )
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
        $data = $request->validated();

        $this->authorize('update', $vacancy);

        $vacancy->title = $data['title'];
        $vacancy->description = $data['description'];
        $vacancy->employer_id = $data['employer_id'];
        $vacancy->save();
        return redirect()->route('vacancies.show', [$vacancy->id]);
    }

    public function assignPeople(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);

        $this->authorize('update', $vacancy);

        try{
            $vacancy->people()->sync($request['people']);
        } catch (\Throwable) {

        }
        return redirect()->back();
    }

    public function changeStatus(Request $request)
    {
        $validated = $request->validate([
            'vacancy_id' => 'required|int',
            'status' => 'required|string'
        ]);
        $vacancy = Vacancy::findOrFail($validated['vacancy_id']);

        $this->authorize('update', $vacancy);

        $vacancy->status = $validated['status'];
        $vacancy->save();

        return redirect()->back();
    }
}
