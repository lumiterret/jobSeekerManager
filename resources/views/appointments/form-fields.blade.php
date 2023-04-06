
<div class="form-row">
    <div class="col">
        <label for="title">
            Название
            <span class="text-danger">*</span>
        </label>
        <input
            type="text"
            class="form-control @error('title')is-invalid @enderror"
            name="title"
            id="title"
            required=""
            @if(isset($appointment))
                value="{{ old('title') ?? $appointment->title }}"
            @else
                value="{{ old('title') }}"
            placeholder="Введите название"
            @endif
        >
        @error('title')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
<div>
    <div class="form-row">
        <div class="col">
            <label for="date" class="form-label">Дата</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                </div>
                <input
                    type="date"
                    name="date"
                    id="date"
                    required=""
                    class="form-control @error('date')is-invalid @enderror"
                    @if(isset($appointment))
                        value="{{ old('date') ?? $appointment->date->format('Y-m-d') }}"
                    @else
                        value="{{ old('date') }}"
                    @endif
                >
                @error('date')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col">
            <label for="start_time" class="form-label">
                Время
            </label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"><i class="fas fa-clock"></i></span>
                </div>
                <input
                    type="time"
                    class="form-control @error('start_time')is-invalid @enderror"
                    name="start_time"
                    id="start_time"
                    @if(isset($appointment))
                        value="{{ old('start_time') ?? $appointment->date->format('H:m') }}"
                    @else
                        value="{{ old('start_time') }}"
                    @endif
                >
                @error('start_time')
                <span class="error invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>
    <div class="form-row mb-2">
    </div>

    <div class="form-row">
        <div class="col">
            <label for="description" class="form-label">Описание</label>
            <textarea class="form-control mb-2" name="description" id="description" cols="30" rows="5">@if(isset($appointment)){{ old('description') ?? $appointment->description }}@else{{ old('description') }}@endif</textarea>
        </div>
    </div>
    <div class="form-row">
        <div class="col">
            <label for="meeting" class="form-label">URL</label>
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text">
                        <i class="fas fa-video"></i>
                    </span>
                </div>
                <input
                    type="text"
                    class="form-control"
                    name="meeting"
                    id="meeting"
                    @if(isset($appointment))
                        value="{{ old('meeting') ?? $appointment->meeting }}"
                    @else
                        value="{{ old('meeting') }}"
                    @endif
                >
            </div>
        </div>
    </div>
</div>

<div class="form-row">
    <div class="col">
        <button type="submit" class="btn btn-primary float-right">Сохранить</button>
    </div>
</div>
