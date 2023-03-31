<form method="post" action="{{ route('contact.store') }}">
    @csrf
    <input type="hidden" name="person_id" value="{{ $person->id }}">
    <div class="mb-3">
        <label class="col-form-label" for="type">
            Тип
            <span class="text-danger">*</span>
        </label>
        <select
            name="type"
            id="type"
            required="required"
            class="form-select form-control-sm @error('f_name')is-invalid @enderror">
            <option value=""></option>
            @foreach ($contact->types() as $type)
                <option value="{{ $type }}">
                    {{ __(ucfirst($type)) }}
                </option>
            @endforeach
        </select>
        @error('type')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-3">
        <label class="col-form-label" for="value">
            Значение
            <span class="text-danger">*</span>
        </label>
        <input
            class="form-control @error('value')is-invalid @enderror"
            type="text"
            id="value"
            name="value"
            required="required"
            value=""
            placeholder="Введите..."
        />
        @error('value')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <button class="btn btn-sm btn-success" type="submit">Добавить</button>
</form>
