<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\StoreRequest;
use App\Http\Requests\Appointment\UpdateRequest;
use App\Models\Appointment;
use App\Models\Vacancy;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\BinaryOp\SmallerOrEqual;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $appointment = new Appointment();
        $query = $appointment->query()
            ->orderByDesc('date');

        $statuses = $appointment->statuses();

        $status = [Appointment::STATUS_APPOINTED];

        if ($request->get('status')) {
            $status = array_merge($request->get('status'));
        }

        $query->whereIn('status', $status);
        $appointments = $query->paginate(10);

        return view(
            'appointments.index',
            compact(
                'appointments',
                'statuses'
            )
        );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $vacancy = Vacancy::findOrFail($data['vacancy_id']);

        $appointment = new Appointment();
        $appointment->created_at = now();
        $appointment->vacancy_id = $data['vacancy_id'];
        $appointment->date = $data['date'] . ' ' . $data['start_time'];
        $appointment->status = Appointment::STATUS_APPOINTED;
        $this->fillAppointment($data, $appointment);
        $vacancy->status = Vacancy::STATUS_ACTIVE;
        $vacancy->save();

        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $appointment = Appointment::findOrFail($id);
        return view('appointments.show', compact('appointment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $vacancy = Vacancy::findOrFail($data['vacancy_id']);

        $appointment = Appointment::findOrFail($id);
        $appointment->date = $data['date'] . ' ' . $data['start_time'];
        $this->fillAppointment($data, $appointment);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }

    public function changeStatus(Request $request)
    {
        $validated = $request->validate([
            'appointment_id' => 'required|int',
            'status' => 'required|string'
        ]);
        $appointment = Appointment::findOrFail($validated['appointment_id']);
        $appointment->status = $validated['status'];
        $appointment->save();

        return back();
    }

    /**
     * @param mixed $data
     * @param Appointment $appointment
     * @return void
     */
    private function fillAppointment(mixed $data, Appointment $appointment): void
    {
        $appointment->title = $data['title'];
        $appointment->description = (!empty($data['description'])) ? $data['description'] : null;
        $appointment->meeting = (!empty($data['meeting'])) ? $data['meeting'] : null;
        $appointment->updated_at = now();
        $appointment->save();
    }
}
