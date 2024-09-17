<div class="message-item message">
    <img src="{{ asset('img/profile.jpg') }}" alt="avatar" class="avatar">
    <div class="content">
        {{-- <div class="title">John</div> --}}
        <div class="bubble">
            {{ $message }}
        </div>
        <div class="footer">{{ now() }}</div>
    </div>
</div>