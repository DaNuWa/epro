<div class="flex-grow-1 ms-3">
    <h3>{{$chatuser->first_name." ".$chatuser->last_name}}</h3>
    <p @class([ 'font-weight-bold' => !$isRead,]) >{{$lastMessage}}</p>
</div>