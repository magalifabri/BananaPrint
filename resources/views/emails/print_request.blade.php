<p>Hello {{ $job->printer->user->name }},</p>

<p>You have a new print request from {{ $job->user->name }}!</p>

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

<p>I offer {{ $job->exchange_offer }} in exchange</p>

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

<p>To accept this request or negotiate the terms, simply hit <i>reply</i> on this email or click the link below to email {{ $job->user->name }} at {{ $job->user->email }}!</p>

<h1><a href="mailto:{{ $job->user->email }}?subject=Response to print request" target="_blank">Reply</a></h1>

<br>

<p>Good Luck!</p>
<p>{{ config('app.name') }}</p>