@foreach ($schedules as $schedule)
<li class="d-flex justify-content-between align-items-center">
    <span>{{ $schedule->day }} {{ $schedule->dayEnd? '- '.$schedule->dayEnd : ''  }}</span>
    <span>{{ $schedule->Start }} - {{ $schedule->End }}</span>
  </li>
@endforeach
