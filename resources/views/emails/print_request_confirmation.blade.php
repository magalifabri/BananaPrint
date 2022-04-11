<p>Hello {{ $job->user->name }},</p>

<p>You just submitted the following print request via {{ config('app.name') }}!</p>

<br>

<p><b>Request Details</b></p>

<hr>

<p>I would like my print to be:</p>
<ul>
    @if ($job->color)
        <li>in color</li>
    @else
        <li>in grayscale</li>
    @endif

    @if ($job->double_sided)
        <li>double-sided</li>
    @else
        <li>single-sided</li>
    @endif
</ul>


<p>About my document:</p>
<ul>
    <li>number of pages: {{ $job->num_pages }}</li>
    <li>file extension: {{ $job->file_ext }}</li>
</ul>

<p>In exchange, I offer {{ $job->exchange_offer }}</p>

<p>I can come pick up the print during these times:</p>

<ol>
    <li>between {{ $job->pickup_timeframe_start1 }}
        and {{ $job->pickup_timeframe_end1 }}
        on {{ $job->pickup_timeframe_date1 }}</li>
    <li>between {{ $job->pickup_timeframe_start2 }}
        and {{ $job->pickup_timeframe_end2 }}
        on {{ $job->pickup_timeframe_date2 }}</li>
    <li>between {{ $job->pickup_timeframe_start3 }}
        and {{ $job->pickup_timeframe_end3 }}
        on {{ $job->pickup_timeframe_date3 }}</li>
</ol>

@if ($job->message)
    <p>Additional comments:</p>

    <p><i>{{ $job->message }}</i></p>
@endif

<hr>

<br>

<p>Good Luck!</p>
<p>{{ config('app.name') }}</p>
