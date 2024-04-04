<form method="get" action="{{ route('employers.index')}}">
    <div class="row">
        <div class="col-sm-6">
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
@vite(['resources/js/filters/employersFilter.js'])
