@component('mail::message')

<h3></h3>

<h3> Hello Austin </h3>



<p>
    A user placed a withdrawal request on <b>SPORTYBANG</b>
</p>

<div>
    @component('mail::table')
        | name              | phone               | bank name               | account number                | account name             | amount                   |
        | ------------------|:-------------------:|------------------------:|------------------------------:|-------------------------:|-------------------------:|
        | {{$data['name']}} | {{$data['phone']}}  | {{$data['bank_name']}}  | {{$data['account_number']}}   | {{$data['account_name']}}| {{$data['total_amount']}}|

    @endcomponent
</div>

<p>
    Best Regards,<br>
    {{ config('app.name') }}
</p>

@endcomponent
