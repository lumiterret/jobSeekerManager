<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cron\StoreCronJobRequest;
use App\Models\CronJob;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;

class CronJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cronJobs = CronJob::query()->paginate(10);

        return view('cron-jobs.index', compact('cronJobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('cron-jobs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCronJobRequest $request)
    {
        $validated = $request->validated();

        $cronJob = new CronJob();

        $this->fillJob($cronJob, $validated);
        return redirect()->route('cron-jobs.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CronJob $cronJob)
    {
        return view('cron-jobs.edit', compact('cronJob'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCronJobRequest $request, CronJob $cronJob)
    {
        $validated = $request->validated();

        $this->fillJob($cronJob, $validated);
        return redirect()->route('cron-jobs.index');
    }

    private function fillJob(CronJob $cronJob, array $data)
    {
        if (Arr::exists($data, 'command')) {
            $cronJob->command = $data['command'];
        }
        $cronJob->description = $data['description'];
        $cronJob->schedule_time = $data['schedule_time'];
        $isActive = false;
        if (Arr::exists($data, 'is_active')) {
            $isActive = $data['is_active'];
        }
        $cronJob->is_active = $isActive;
        $cronJob->save();
    }

    public function executeCronJob (Request $request, CronJob $cronJob)
    {
        $error = 'без ошибок';
        Artisan::call($cronJob->command);
        return redirect()->route('cron-jobs.index')->withErrors(['msg' => 'Команда ['. $cronJob->command . '] отработала ' . $error]);
    }
}
