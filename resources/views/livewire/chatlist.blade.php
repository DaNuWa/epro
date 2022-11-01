<div class="modal-body">
    <div class="msg-body">
        <ul>
            @forelse($chats as $chat)
            @if($chat->sender_id==auth()->id())
            <li class="sender">
                @if($chat->type=='file')
                <p><a style="color:black" href="{{asset('media/'.$chat->message)}}">(Download attachement)</a></p>
                @else
                <p> {{$chat->message}} </p>
                @endif
                <span class="time">{{$chat->created_at->format('d M, H:mA')}}</span>
            </li>
            @else
            <li class="repaly">
                @if($chat->type=='file')
                <p><a style="color:black" href="{{asset('media/'.$chat->message)}}">(Download attachement)</a></p>
                @else
                <p> {{$chat->message}} </p>
                @endif
                <span class="time">{{$chat->created_at->format('d M, H:mA')}}</span>
            </li>
            @endif
            @empty
            @endforelse

        </ul>
    </div>
</div>