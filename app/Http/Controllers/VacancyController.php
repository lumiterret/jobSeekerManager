<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancy\StoreRequest;
use App\Models\Employer;
use App\Models\Person;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $vacancy = new Vacancy();
        $statuses = $vacancy->statuses();
        $query = Vacancy::orderByDesc('created_at');
        $status = [Vacancy::STATUS_ACTIVE];

        if ($request->get('status')) {
            $status = array_merge($request->get('status'));
        }
        $query->whereIn('status', $status);
        $vacancies = $query->paginate(50);

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
        $data = $request->validated();
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->title = $data['title'];
        $vacancy->description = $data['description'];
        $vacancy->employer_id = $data['employer_id'];
        $vacancy->save();
        return redirect()->route('vacancies.show', [$vacancy->id]);
    }

    public function assignPeople(Request $request, $id)
    {
        $vacancy = Vacancy::findOrFail($id);
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
        $vacancy->status = $validated['status'];
        $vacancy->save();

        return redirect()->back();
    }
}
