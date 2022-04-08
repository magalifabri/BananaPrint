@component('mail::message')

Hello {{ $job->user->name }},

You just submitted the following print request via {{ config('app.name') }}!

<br>

**Request Details**

---

I would like my print to be:

@if ($job->color)
- in color
@else
- in grayscale
@endif
@if ($job->double_sided)
- double-sided
@else
- single-sided
@endif


About my document:
- number of pages: {{ $job->num_pages }}
- file extension: {{ $job->file_ext }}


I offer {{ $job->exchange_offer }} in exchange

I can come pick up the print during these times:
1. between {{ $job->pickup_timeframe_start1 }}
and {{ $job->pickup_timeframe_end1 }}
on {{ $job->pickup_timeframe_date1 }}
2. between {{ $job->pickup_timeframe_start2 }}
and {{ $job->pickup_timeframe_end2 }}
on {{ $job->pickup_timeframe_date2 }}
3. between {{ $job->pickup_timeframe_start3 }}
and {{ $job->pickup_timeframe_end3 }}
on {{ $job->pickup_timeframe_date3 }}


Additional Comments

*{{ $job->message }}*

---

<br>

Good Luck!<br>
{{ config('app.name') }}
@endcomponent
