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
                        id="employer"
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
        $('#employer').select2({
            ajax: {
                url: '/employers/search',
                dataType: 'json',
                type: "get",
                data: function (params) {
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
            minimumInputLength: 3,
            placeholder: 'Название компании',
            width: '100%'
        });
    })
</script>
