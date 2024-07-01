


<div style="height:100%;width:100%;font-family:Arial, Helvetica, sans-serif">
    <div style="background-color:#cecece;padding:12px;font-size:16px;">
        <strong>Message from {{ ucfirst($details['name']) }} &lt; {{ $details['email'] }} &gt;</strong>
    </div>

    <div style="background-color:#9c9c9c;padding:12px;font-size:14px;">
        {!! nl2br(e($details['message'])) !!}
    </div>
</div>
    