<form method="get" action="{{ route('appointments.index')}}">
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
    <button class="btn btn-success" type="submit">Поиск</button>
</form>
