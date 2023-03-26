<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vacancy\StoreRequest;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class VacancyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $vacancies = Vacancy::paginate(8);
        return view('vacancies.index',compact('vacancies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('vacancies.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $vacancy = Vacancy::create($data);
        return redirect()->route('vacancies.show', [$vacancy->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return  view('vacancies.show', compact('vacancy'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vacancy = Vacancy::findOrFail($id);
        return view('vacancies.edit', compact('vacancy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $vacancy = Vacancy::findOrFail($id);
        $vacancy->update($data);
        return redirect()->route('vacancies.show', [$vacancy->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vacancy $id)
    {
        //
    }
}
