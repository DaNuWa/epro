<div class="modal-body">
    <div class="msg-body">
        <ul>
            @forelse($chats as $chat)
            @if($chat->sender_id==auth()->id())
            <li class="sender">
                <p> {{$chat->message}} </p>
                <span class="time">10:06 am</span>
            </li>
            @else
            <li class="repaly">
                <p> {{$chat->message}}</p>
                <span class="time">10:20 am</span>
            </li>
            @endif
            @empty
            @endforelse

        </ul>
    </div>
</div>