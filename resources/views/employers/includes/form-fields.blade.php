@csrf
@if(isset($employer))
    @method('put')
    <input type="hidden" name="id" value="{{ $employer->id }}">
@endif
<div class="mb-3">
    <label class="col-form-label" for="title">
        Название компании
        <span class="text-danger">*</span>
    </label>
    <input
        class="form-control @error('title')is-invalid @enderror"
        type="text" id="title"
        name="title"
        @if(isset($employer))
            value="{{ old('title') ?? $employer->title }}"
        @else
            value="{{ old('title') }}"
        placeholder="Введите название"
        @endif
    />
    @error('title')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label class="col-form-label" for="description">
        Описание компании
        <span class="text-danger">*</span>
    </label>
    <textarea
        class="form-control @error('description')is-invalid @enderror"
        name="description"
        id="description"
        rows="10"
    >@if(isset($employer)){{ old('description') ?? $employer->description }}@else{{ old('description') }}@endif</textarea>
    @error('description')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>

<button type="submit" class="btn btn-success">
    @if(isset($employer))
        Изменить
    @else
        Добавить
    @endif
</button>
