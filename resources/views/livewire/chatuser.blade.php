<div class="flex-grow-1 ms-3">
    <h3>{{$chatuser->first_name." ".$chatuser->last_name}}</h3>  
    @if(!$isRead)
    <p style="font-weight:700">{{$lastMessage}}</p>
    @else
    <p >{{$lastMessage}}</p>
    @endif
</div>