@csrf
@if(isset($cronJob))
    @method('PATCH')
    <input type="hidden" name="id" value="{{$cronJob->id}}">
@endif
<div class="row">
    <div class="col-md-6 ml-auto mr-auto">
        <div class="form-group">
            <label for="command" class="col-form-label">
                Команда
                <span class="text-danger">*</span>
            </label>
            <div class="input-group">
                <input
                    class="form-control @error('command')is-invalid @enderror"
                    type="text"
                    name="command"
                    id="command"
                    @if(isset($cronJob))
                        value="{{ old('command') ?? $cronJob->command }}"
                    disabled
                    @else
                        value="{{ old('command') }}"
                    placeholder="Введите команду запуска"
                    @endif
                    required
                >
                @if(isset($cronJob))
                    <div class="input-group-append">
                        <button id="toggle-button" type="button" class="btn btn-danger">
                            <i class="fas fa-lock-open"></i>
                        </button>
                    </div>
                @endif
            </div>
            @if(isset($cronJob))
                <span class="text-danger text-sm">Перед изменением поля убедитесь что осознаёте последствия</span>
            @endif
            @error('command')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="schedule_time" class="col-form-label">
                Расписание
                <span class="text-danger">*</span>
            </label>
                <input
                    class="form-control @error('schedule_time')is-invalid @enderror"
                    type="text"
                    name="schedule_time"
                    id="schedule_time"
                    @if(isset($cronJob))
                        value="{{ old('schedule_time') ?? $cronJob->schedule_time }}"
                    @else
                        value="{{ old('schedule_time') }}"
                    placeholder="Введите код"
                    @endif
                    required
                >
            @error('schedule_time')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="description" class="col-form-label">
                Описание
                <span class="text-danger">*</span>
            </label>
            <input
                class="form-control @error('description')is-invalid @enderror"
                type="text"
                name="description"
                id="description"
                @if(isset($cronJob))
                    value="{{ old('description') ?? $cronJob->description }}"
                @else
                    value="{{ old('description') }}"
                placeholder="Введите значение"
                @endif
                required
            >
            @error('description')
            <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="is_active"
                    name="is_active"
                    value="1"
                    @if(isset($cronJob) && $cronJob->is_active)
                        checked
                    @endif
                >
                <label class="form-check-label" for="is_active">
                    Включен
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">
            @if(isset($cronJob))
                Изменить
            @else
                Создать
            @endif
        </button>
    </div>
</div>
