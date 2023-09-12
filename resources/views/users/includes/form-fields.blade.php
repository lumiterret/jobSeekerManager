@csrf
@if(isset($user))
    @method('put')
    <input type="hidden" name="id" value="{{ $user->id }}">
@endif
<div class="row">
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="title">
            Логин
            <span class="text-danger">*</span>
        </label>
        <input
            class="form-control @error('username')is-invalid @enderror"
            type="text" id="username"
            name="username"
            @if(isset($user))
                value="{{ old('username') ?? $user->username }}"
            @else
                value="{{ old('username') }}"
            placeholder="Введите логин"
            @endif
            required
        />
        @error('username')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="title">
            Email
            <span class="text-danger">*</span>
        </label>
        <input
            class="form-control @error('email')is-invalid @enderror"
            type="text" id="email"
            name="email"
            @if(isset($user))
                value="{{ old('email') ?? $user->email }}"
            @else
                value="{{ old('email') }}"
            placeholder="Введите email"
            @endif
            required
        />
        @error('email')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6 mb-3">
        <label class="col-form-label" for="password">
            Пароль
            @if(!isset($user))
                <span class="text-danger">*</span>
            @endif
        </label>
        <input
            class="form-control @error('password')is-invalid @enderror"
            type="password" id="password"
            name="password"
            @if(!isset($user))
                required
            @endif
        />
        @error('username')
        <span class="error invalid-feedback">{{ $message }}</span>
        @enderror
    </div>
</div>
@if(user()->is_admin)
    <div class="row">
        <div class="col-md mb-3">
            <div class="form-check">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="is_admin"
                    name="is_admin"
                    value="1"
                    @if(isset($user) && $user->is_admin)
                        checked
                    @endif
                >
                <label class="form-check-label" for="is_admin">
                    Администратор
                </label>
            </div>
        </div>
    </div>
@endif
