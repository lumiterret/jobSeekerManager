<form method="get" action="{{ route('vacancies.index')}}">
    <div class="row">
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="status">Статус</label>
                <select class="form-control" id="status" name="status[]" multiple>
                    @foreach($statuses as $status)
                        <option value="{{ $status }}">
                            {{ __(ucfirst($status)) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="employer">Компания</label>
                <input type="text" class="form-control" id="employer" placeholder="Employer" name="employer">
            </div>
        </div>
        <div class="col-sm-4 text-center">
            <div class="form-group mx-auto">
                <label class="col-form-label-sm" for="is_favorite">Избранное</label>
                <select class="form-control" id="is_favorite" name="is_favorite">
                    <option disabled selected>Выберите</option>
                        <option value="1">
                            Да
                        </option>
                        <option value="0">
                            Нет
                        </option>
                </select>

            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit">Поиск</button>
</form>

<script type="text/javascript">
    window.addEventListener("load", function() {
            $('#status').select2({
                placeholder: 'Статус вакансии'
            });
    })
</script>
