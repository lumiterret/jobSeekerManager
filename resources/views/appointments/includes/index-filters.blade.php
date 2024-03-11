<form method="get" action="{{ route('appointments.index')}}">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="status">Статус</label>
                <div>
                    <select class="form-control" id="status" name="status[]" multiple>
                        @foreach($statuses as $status)
                            <option value="{{ $status }}">
                                {{ __(ucfirst($status)) }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="status">Компания</label>
                <div>
                    <select
                        class="form-control"
                        id="employer-search"
                        name="employer_id"
                    >
                    </select>
                </div>
            </div>
        </div>
    </div>

    <button class="btn btn-success" type="submit">Поиск</button>
</form>
<script>
    window.addEventListener("load", function() {
        $('#status').select2({
            placeholder: 'Статус назначения',
            width: '100%'
        });
    })
</script>
@vite(['resources/js/filters/employersFilter.js'])
