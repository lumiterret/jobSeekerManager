<?php

namespace App\Http\Controllers;

use App\Http\Requests\Person\StoreRequest;
use App\Models\Contact;
use App\Models\Person;
use App\Services\Person\Http\PersonIndexFilters;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PersonIndexFilters $filters)
    {
        $query = Person::orderBy('f_name');

        if (user()->is_admin === false) {
            $query->where('user_id', user()->id);
        }

        if ($filters->firstName) {
            $fName = '%' . $filters->firstName . '%';
            $query->where('f_name', 'LIKE', $fName);
        }

        $people = $query->paginate(50);
        return view('people.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('people.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $person = new Person($data);
        $person->user_id = user()->id;
        $person->save();
        return redirect()->route('people.show', [$person->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $person = Person::findOrFail($id);
        $vacancies = $person->vacancies()->get();
        $contact = new Contact();
        return  view('people.show', compact('person', 'contact', 'vacancies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $person = Person::findOrFail($id);
        $person->update($data);
        return redirect()->route('people.show', [$person->id]);
    }

    public function search(Request $request)
    {
        $searchTerm = $request->input('searchTerm');

        $people = Person::when(!user()->is_admin, function ($search) {
            return $search->where('user_id', user()->id);
        })
            ->when($searchTerm, function ($search) use ($searchTerm) {
                return $search->where('f_name', 'LIKE', '%' . $searchTerm . '%')
                    ->orWhere('l_name', 'LIKE', '%' . $searchTerm . '%');
            })->get();

        $result = [];

        foreach ($people as $person) {
            $result[] = ['id' => $person->id, 'text' => $person->full_name];
        }
        return response()->json($result);
    }
}
