<form method="get" action="{{ route('vacancies.index')}}">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="status">Статус</label>
                <select class="form-control" id="status" name="status[]" multiple>
                    <option value="" selected disabled></option>
                    @foreach($statuses as $status)
                        <option value="{{ $status }}">
                            {{ __(ucfirst($status)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="employer">Компания</label>
                <input type="text" class="form-control" id="employer" placeholder="Employer" name="employer">
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit">Поиск</button>
</form>
