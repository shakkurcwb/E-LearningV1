@php

$now = now()->setTimezone(Auth::user()->settings->timezone);
$hour = $now->format('H');

if ($hour > 4 && $hour < 12) {
    $time_of_day = "morning";
} else if ($hour > 12 && $hour < 18) {
    $time_of_day = "evening";
} else {
    $time_of_day = "night";
}

$nick = str_replace('-', ' ', Auth::user()->name);

@endphp

<!-- Greetings -->
<span>@lang('general.greetings', [ 'time' => $time_of_day, 'nick' => Str::title($nick) ])</span>
<!-- END Greetings -->