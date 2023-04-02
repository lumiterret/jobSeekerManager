<ul class="list-group list-group-unbordered mb-3">
    @if($person->contacts)
        @foreach($person->contacts as $contact)
            @switch($contact->type)
                @case('phone')
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <b>{{ $contact->type }}:</b>
                            </div>
                            <div class="col-5">
                                <a class="text-nowrap float-right" href="tel:{{ preg_replace('/[^0-9]/','',$contact->value) }}">
                                    {{ $contact->value }}
                                </a>
                            </div>
                            <div class="col-3">
                                @include('contacts.delete')
                            </div>
                        </div>
                    </li>
                    @break
                @case('email')
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <b>{{ $contact->type }}:</b>
                            </div>
                            <div class="col-5">
                                <a class="text-nowrap float-right" href="mailto:{{ $contact->value }}">
                                    {{ $contact->value }}
                                </a>
                            </div>
                            <div class="col-3">
                                @include('contacts.delete')
                            </div>
                        </div>
                    </li>
                    @break
                @case('whatsapp')
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <b>{{ $contact->type }}:</b>
                            </div>
                            <div class="col-5">
                                <a class="text-nowrap float-right"
                                   href="https://api.whatsapp.com/send/?phone={{ preg_replace('/[^0-9]/','',$contact->value) }}">
                                    {{ $contact->value }}
                                </a>
                            </div>
                            <div class="col-3">
                                @include('contacts.delete')
                            </div>
                        </div>
                    </li>
                    @break
                @case('telegram')
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <b>{{ $contact->type }}:</b>
                            </div>
                            <div class="col-5">
                                <a class="text-nowrap float-right"
                                   href="https://t.me/+{{ preg_replace('/[^0-9]/','',$contact->value) }}">
                                    {{ $contact->value }}
                                </a>
                            </div>
                            <div class="col-3">
                                @include('contacts.delete')
                            </div>
                        </div>
                    </li>
                    @break
                @case('url')
                    <li class="list-group-item">
                        <div class="row">
                            <div class="col-4">
                                <b>{{ $contact->type }}:</b>
                            </div>
                            <div class="col-5">
                                <a class="text-nowrap float-right"
                                   href="{{ $contact->value }}">
                                    {{ $contact->value }}
                                </a>
                            </div>
                            <div class="col-3">
                                @include('contacts.delete')
                            </div>
                        </div>
                    </li>
                    @break
            @endswitch
        @endforeach
    @endif
</ul>
{{--<a href="#" class="btn btn-primary btn-block"><b>Добавить</b></a>--}}
