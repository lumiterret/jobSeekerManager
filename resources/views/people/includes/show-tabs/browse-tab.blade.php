<div class="row">
    <div class="col col-md-3">
        <div class="text-center">
            {{-- Profile Image --}}
            <img class="profile-user-img img-fluid img-circle"
                 src="{{ Vite::asset('resources/img/avatar2.png') }}"
                 alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">
            {{ $person->full_name }}
        </h3>
        <p class="text-muted text-center">
            {{ $person->position }}
        </p>
        <a href="#" id="toggle-button" class="btn btn-primary btn-block">
            <b>Добавить контактные данные</b>
        </a>
    </div>
    <div class="col col-md-9">
        @include('contacts.index')
        <div class="card card-primary card-outline d-none mt-3" id="add-info">
            <div class="card-body">
                @include('contacts.form')
            </div>
        </div>
    </div>
</div>
