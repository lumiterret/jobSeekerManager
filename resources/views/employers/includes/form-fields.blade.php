@csrf
@if(isset($employer))
    @method('put')
    <input type="hidden" name="id" value="{{ $employer->id }}">
@endif
<div class="mb-3">
    <label class="col-form-label" for="employer-title">
        Название компании
        <span class="text-danger">*</span>
    </label>
    <select
        id="employer-title"
        class="form-control @error('title')is-invalid @enderror"
        type="text"
        name="title"
    >
        <option
            @if(isset($employer))
                value="{{ old('title') ?? $employer->title }}"
            @else
                value="{{ old('title') }}"
            @endif
            selected="selected">
            @if(isset($employer))
                {{ old('title') ?? $employer->title }}
            @else
                {{ old('title') }}
            @endif
        </option>
    </select>
    @error('title')
    <span class="error invalid-feedback">{{ $message }}</span>
    @enderror
</div>
<div class="mb-3">
    <label class="col-form-label" for="description">
        Описание компании
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

<script type="text/javascript">
    window.addEventListener("load", function() {
        $('#employer-title').select2({
            ajax: {
                url: '/employers/search',
                dataType: 'json',
                type: "get",
                data: function (params) {
                    console.log(params)
                    return {
                        searchTerm: params.term
                    };
                },
                processResults: function (data) {
                    return { results: data };
                },
                error: function (jqXHR, exception) {
                    if (jqXHR.status === 0) {
                        console.log('Not connect. Verify Network.');
                    } else if (jqXHR.status == 404) {
                        console.log('Requested page not found (404).');
                    } else if (jqXHR.status == 500) {
                        console.log('Internal Server Error (500).');
                    } else if (exception === 'parsererror') {
                        console.log('Requested JSON parse failed.');
                    } else if (exception === 'timeout') {
                        console.log('Time out error.');
                    } else if (exception === 'abort') {
                        console.log('Ajax request aborted.');
                    } else {
                        console.log('Uncaught Error. ' + jqXHR.responseText);
                    }
                }
            },
            placeholder: 'Название компании',
            minimumInputLength: 2,
            width: '100%',
            tags: true
        });
    })
</script>
