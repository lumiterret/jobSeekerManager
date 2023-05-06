@props([
    'users'
])


<table class="table table-striped table-bordered">
    <thead>
    <tr>
        <th style="width: 25%">
            Логин
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
                        {{ $user->created_at }}
                    </small>
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
