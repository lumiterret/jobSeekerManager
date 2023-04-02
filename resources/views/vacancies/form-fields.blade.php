<div class="row">
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="title">
            Название вакансии
            <span class="text-danger">*</span>
        </label>
        <input
            class="form-control @error('title')is-invalid @enderror"
            type="text" id="title"
            name="title"
            @if(isset($vacancy))
                value="{{ old('title') ?? $vacancy->title }}"
            @else
                value="{{ old('title') }}"
            placeholder="Введите название"
            @endif
        />
        @error('title')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label for="employer" class="col-form-label">
            Компания
            <span class="text-danger">*</span>
        </label>
        <select
            class="form-control @error('employer_id')is-invalid @enderror"
            name="employer_id"
            id="employer"
        >
            <option value="" disabled selected>Выберите...</option>
            @if(isset($vacancy))
                @foreach($employers as $employerId => $employerTitle)
                    <option value="{{ $employerId }}"
                            @if($vacancy->employer && $vacancy->employer->id == $employerId)
                                selected
                        @endif
                    >
                        {{ $employerTitle }}
                    </option>
                @endforeach
            @else
                <option value="" disabled selected>Выберите...</option>
                @foreach($employers as $employerId => $employerTitle)
                    <option value="{{ $employerId }}">{{ $employerTitle }}</option>
                @endforeach
            @endif
        </select>
        @error('employer_id')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col mb-3">
        <label class="col-form-label" for="description">
            Описание вакансии
            <span class="text-danger">*</span>
        </label>
        <textarea
            class="form-control @error('description')is-invalid @enderror"
            name="description"
            id="description"
            rows="10"
        >@if(isset($vacancy)){{ old('description') ?? $vacancy->description }}@else{{ old('description') }}@endif</textarea>
        @error('description')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
