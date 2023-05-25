<div style="height: 100vh; display: grid; align-content:center; justify-content:center;">
    <form method="POST" onclick="return window.confirm('attent to office')" action="/admin/employee/attend-submit">
        @csrf

        @if ($check_in && !$checkout)
            <button
                style="background: rgb(240, 175, 175); font-size: 40px; height: 500px; width: 500px; line-height:500px; border-radius: 50%;">
                check out office time
            </button>
        @elseif($check_in && $checkout)
            <button type="button"
                style="font-size: 40px; height: 500px; width: 500px; line-height:500px; border-radius: 50%;">
                office time end
            </button>
        @else
            <button
                style="background: rgb(201, 228, 193);font-size: 40px; height: 500px; width: 500px; line-height:500px; border-radius: 50%;">
                Check in
            </button>
        @endif
    </form>
    <div>
        @if ($check_in)
            <div>
                check in: {{ Carbon\Carbon::parse($check_in->check_in_time)->format('h:i:s a') }}
            </div>
        @endif
        @if ($checkout)
            <div>
                check out: {{ Carbon\Carbon::parse($checkout->check_out_time)->format('h:i:s a') }}
            </div>
        @endif
        @if ($check_in && $checkout)
            <div>
                @php
                    $start = Carbon\Carbon::parse($check_in->date . ' ' . $check_in->check_in_time);
                    $end = Carbon\Carbon::parse($checkout->date . ' ' . $checkout->check_out_time);
                @endphp
                {{-- @dump($start->diffAsCarbonInterval($end)) --}}
                working hours:
                {{ $start->diff($end)->h . ' hours ' . $start->diff($end)->i . ' min ' . $start->diff($end)->s . ' sec' }}
            </div>
        @endif
    </div>
</div>
