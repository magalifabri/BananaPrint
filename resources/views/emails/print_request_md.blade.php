@component('mail::message')

Hello {{ $job->printer->user->name }},

You have a new print request from {{ $job->user->name }}!

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

<p style="text-align: center; font-weight: bold">Want to accept this request or negotiate the terms? Hit the Reply button below!</p>

@component('mail::button', ['url' => 'mailto:' . $job->user->email . '?subject=Response to Print Request' ])
Reply
@endcomponent

<p style="text-align: center;font-size: smaller">(Or start an email manually to {{ $job->user->email }} if the button is on a break)</p>

<br>

Thanks,<br>
{{ config('app.name') }}
@endcomponent
