<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 10%">
            Расписание
        </th>
        <th>
            Команда
        </th>
        <th>
            Описание
        </th>
        <th style="width: 10%">
            Активность
        </th>
    </tr>
    </thead>
    <tbody>
    @if(count($cronJobs))
        @foreach($cronJobs as $job)
            <tr>
                <td>
                    {{ $job->schedule_time }}
                </td>
                <td>
                    <a href="{{ route('cron-jobs.edit', [$job->id]) }}">
                        {{ $job->command }}
                    </a>
                </td>
                <td>
                    {{ $job->description }}
                </td>
                <td>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" @if($job->is_active) checked @endif disabled>
                    </div>
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4">
                Ничего не найдено
            </td>
        </tr>
    @endif
    </tbody>
</table>
