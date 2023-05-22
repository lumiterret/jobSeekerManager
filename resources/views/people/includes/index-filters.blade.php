<form method="get" action="{{ route('people.index')}}">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group mb-3">
                <label class="col-form-label-sm" for="employer">Имя</label>
                <input type="text" class="form-control" id="employer" placeholder="Имя" name="f-name">
            </div>
        </div>
    </div>
    <button class="btn btn-success" type="submit">Поиск</button>
</form>
