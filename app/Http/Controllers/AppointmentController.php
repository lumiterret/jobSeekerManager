<?php

namespace App\Http\Controllers;

use App\Http\Requests\Appointment\StoreRequest;
use App\Models\Appointment;
use App\Models\Employer;
use App\Models\Vacancy;
use App\Services\Appointment\Http\AppointmentIndexFilters;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AppointmentIndexFilters $filters)
    {
        $appointment = new Appointment();
        $query = $appointment->query()
            ->orderBy('date', 'desc');

        if (user()->is_admin === false) {
            $query->where('user_id', user()->id);
        }

        $status = [Appointment::STATUS_APPOINTED];

        if (!empty($filters->status)) {
            $status = array_merge($filters->status);
        }

        if ($filters->employer) {
            $employer = Employer::find($filters->employer);
            $vacanciesIds = $employer->vacancies->pluck('id');
            $query->whereIn('vacancy_id', $vacanciesIds);
        }

        $query->whereIn('status', $status);

        $statuses = $appointment->statuses();
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
        $appointment->status = Appointment::STATUS_APPOINTED;
        $appointment->user_id = user()->id;
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

        $this->authorize('view', $appointment);

        return view('appointments.show', compact('appointment'));
    }

    /**
     * Display the calendar view.
     */
    public function calendar()
    {
        return view('appointments.calendar');
    }

    /**
     * Display the calendar view.
     */
    public function events(Request $request)
    {
        $dates = $request->input();
        $start = Carbon::parse($dates['periodStart']);
        $end = Carbon::parse($dates['periodEnd']);
        $appointments = Appointment::query()
            ->where('user_id', user()->id)
            ->whereBetween('date',[$start,$end])
            ->get();
        $result = [];

        foreach ($appointments as $appointment) {
            $result[] = [
                'id' => $appointment->id,
                'startDate' => $appointment->date,
                'title' => $appointment->vacancy->employer->title . ' - ' . $appointment->title,
            ];
        }

        return response()->json($result);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, $id)
    {
        $data = $request->validated();
        $appointment = Appointment::findOrFail($id);

        $this->authorize('view', $appointment);

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
        if(array_key_exists('all-day', $data) || !$data['start_time']) {
            $data['all-day'] = true;
            $data['start_time'] = '00:00';
        } else {
            $data['all-day'] = false;
        }

        $appointment->title = $data['title'];
        $appointment->description = (!empty($data['description'])) ? $data['description'] : null;
        $appointment->meeting = (!empty($data['meeting'])) ? $data['meeting'] : null;
        $appointment->date = $data['date'] . ' ' . $data['start_time'];
        $appointment->is_all_day = $data['all-day'];
        $appointment->updated_at = now();
        $appointment->save();
    }
}
