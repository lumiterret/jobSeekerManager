<div class="card card-danger card-outline">
    <div class="card-header">
        <h3 class="card-title">Сменить статус</h3>
    </div>
    <div class="card-body">
        <form method="post" action="{{ route('appointments.status-change') }}">
            @csrf
            @method('put')
            <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
            <div class="row">
                <div class="col">
                    <div class="input-group">
                        <select
                            name="status"
                            required="required"
                            class="custom-select">
                            @foreach ($appointment->statuses() as $status)
                                <option value="{{ $status }}"
                                        @if($status == $appointment->status)
                                            selected
                                    @endif
                                >
                                    {{ __(ucfirst($status)) }}
                                </option>
                            @endforeach
                        </select>
                        <div class="input-group-prepend">
                            <button type="submit" class="btn btn-primary">Обновить</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
