
<div class="col col-md-3">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle"
             src="{{ Vite::asset('resources/img/avatar.png') }}"
             alt="User profile picture">
    </div>
    <h3 class="profile-username text-center">
        {{ $user->username }}
    </h3>
    <p class="text-muted text-center">
        @if($user->is_admin)
            Админ
        @else
            Пользователь
        @endif
    </p>
</div>
