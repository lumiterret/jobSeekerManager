<div class="row"> {{-- Встречи --}}
    <div class="col-12"> {{-- Список встреч --}}
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
                    <i class="fas fa-handshake bg-primary"></i> {{-- Иконка типа встречи цвет зависит от статуса --}}

                    <div class="timeline-item">
                        <span class="time"><i class="far fa-clock"></i> {{$appointment->date->format(' H:m')}}</span> {{-- Время встречи --}}

                        <h3 class="timeline-header">
                            <b>{{ $appointment->title }}</b> {{-- Заголовок со ссылкой на просмор? аппойнтмента --}}
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
                <i class="fas fa-handshake bg-secondary"></i> {{-- Иконка типа встречи цвет зависит от статуса --}}

                <div class="timeline-item">
                    <span class="time"><i class="far fa-clock"></i> --:--</span> {{-- Время встречи --}}

                    <h3 class="timeline-header">
                        Назначьте встречу  {{-- Заголовок со ссылкой на просмор? аппойнтмента --}}
                    </h3>

                    <div class="timeline-body"> {{-- Описание события --}}
                        Ничего не найдено назначьте встречу
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
