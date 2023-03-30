<div class="mb-3">
    <label class="col-form-label" for="f_name">
        Имя
        <span class="text-danger">*</span>
    </label>
    <input
        class="form-control @error('f_name')is-invalid @enderror"
        type="text"
        id="f_name"
        name="f_name"
        @if(isset($person))
            value="{{ old('f_name') ?? $person->f_name }}"
        @else
            value="{{ old('f_name') }}"
        placeholder="Введите имя"
        @endif
    />
    @error('f_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div><div class="mb-3">
    <label class="col-form-label" for="l_name">
        Фамилия
        <span class="text-danger">*</span>
    </label>
    <input
        class="form-control @error('l_name')is-invalid @enderror"
        type="text"
        id="l_name"
        name="l_name"
        @if(isset($person))
            value="{{ old('l_name') ?? $person->l_name }}"
        @else
            value="{{ old('l_name') }}"
        placeholder="Введите фамилию"
        @endif
    />
    @error('l_name')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label class="col-form-label" for="position">
        Должность
    </label>
    <input
        class="form-control @error('position')is-invalid @enderror"
        type="text"
        id="position"
        name="position"
        @if(isset($person))
            value="{{ old('position') ?? $person->position }}"
        placeholder="Введите должность"
        @else
            value="{{ old('position') }}"
        placeholder="Введите должность"
        @endif
    />
    @error('position')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
