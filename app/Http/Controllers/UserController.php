<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = new User();
        $this->authorize('viewAny', $user);
        $query = $user->query();
        $users = $query->paginate(50);
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $user = new User();
        $this->fillUser($user, $validated);
        $user->save();
        return redirect()->route('users.show',[$user->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('view', $user);

        return view('users.show', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {
        $user = User::findOrFail($id);
        $this->authorize('update', $user);
        $validated = $request->validated();
        $this->fillUser($user, $validated);
        $user->save();
        return redirect()->route('users.show', [$user->id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function fillUser(User $user, array $data)
    {
        $user->username = $data['username'];
        $user->email = $data['email'];
        if ($data['password']) {
            $user->password = bcrypt($data['password']);
        }
        $isAdmin = false;
        if (Arr::exists($data, 'is_admin')) {
            $isAdmin = $data['is_admin'];
        }
        $user->is_admin = $isAdmin;
    }
}
