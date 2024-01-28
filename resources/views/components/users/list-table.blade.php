@props([
    'users'
])


<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 25%">
            Логин
        </th>
        <th>
            Дата активации
        </th>
        <th>
            Дата последнего входа
        </th>
    </tr>
    </thead>
    <tbody>
    @if(count($users))
        @foreach($users as $user)
            <tr>
                <td>
                    <a href="{{ route('users.show', [$user->id]) }}">
                        {{ $user->username }}
                    </a>
                    <br>
                    <small>
                        Зарегистрирован: {{ $user->created_at }}
                    </small>
                </td>
                <td>
                    {{ $user->email_verified_at }}
                </td>
                <td>
                    {{ $user->last_login }}
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td colspan="4">
                Ничего не найдено
            </td>
        </tr>
    @endif
    </tbody>
</table>
