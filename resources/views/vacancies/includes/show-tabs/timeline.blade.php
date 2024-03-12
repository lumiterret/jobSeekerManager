<div class="row"> {{-- Назначения --}}
    <div class="col-12"> {{-- Список назначений --}}
        <div class="timeline timeline-inverse">
            {{-- timeline time label --}}
            @if(count($vacancy->appointments))
                @foreach($vacancy->appointments as $appointment)
                <div class="time-label">
                <span class="bg-danger">
                  {{ $appointment->date->format('d / M / Y') }}
                </span>
                </div>
                {{-- /.timeline-label --}}
                {{-- timeline item --}}
                <div>
                    <i class="fas fa-handshake bg-primary"></i> {{-- Иконка типа назначения цвет зависит от статуса --}}

                    <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> {{$appointment->date->format(' H:i')}}</span> {{-- Время назначения --}}

                        <h3 class="timeline-header">
                            <b>{{ $appointment->title }}</b> {{-- Заголовок со ссылкой на просмор? назначения --}}
                        </h3>

                        <div class="timeline-body"> {{-- Описание события --}}
                            @markdown{{ $appointment->description }}@endmarkdown
                            @if($appointment->meeting)
                                <a href="{{$appointment->meeting}}">{{$appointment->meeting}}</a>
                            @endif
                        </div>
                        <div class="timeline-footer">
                            <a href="{{ route('appointments.show',[$appointment->id]) }}" class="btn btn-primary btn-sm">Просмотреть</a>
                        </div>
                    </div>
                </div>
                {{-- END timeline item --}}
                @endforeach
            @else
            <div class="time-label">
                <span class="bg-danger">
                  -- / -- / ----
                </span>
            </div>
            {{-- /.timeline-label --}}
            {{-- timeline item --}}
            <div>
                <i class="fas fa-handshake bg-secondary"></i> {{-- Иконка типа назначения цвет зависит от статуса --}}

                <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> --:--</span> {{-- Время назначения --}}

                    <h3 class="timeline-header">
                        Ничего не найдено  {{-- Заголовок со ссылкой на просмор? назначения --}}
                    </h3>

                    <div class="timeline-body"> {{-- Описание события --}}
                        Назначьте встречу
                    </div>
                    <div class="timeline-footer">

                    </div>
                </div>
            </div>
            {{-- END timeline item --}}
            @endif
            <div>
                <i class="far fa-clock bg-gray"></i>
            </div>
        </div>
    </div>{{-- /Список событий --}}
</div> {{-- События --}}
