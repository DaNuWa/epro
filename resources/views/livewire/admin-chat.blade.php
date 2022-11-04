    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="chat-area">

                    <div class="chatbox">
                        <div class="modal-dialog-scrollable">
                            <div class="modal-content">            
                                <div class="modal-body">
                                    <div class="msg-body">
                                        <ul>
                                            @forelse($chats as $chat)
                                            @if($chat->sender_id==$this->provider->id)
                                            <li class="sender">
                                                @if($chat->type=='file')
                                                <p><a style="color:black" href="{{asset('media/'.$chat->message)}}">(Download attachement)</a></p>
                                                @else
                                                <p> {{$chat->message}} </p>
                                                @endif
                                                <span class="time"><a href="#" class="badge badge-warning">Provider</a>
                                                    {{$chat->created_at->format('d M, H:mA')}}</span>
                                            </li>
                                            @else
                                            <li class="repaly">
                                                @if($chat->type=='file')
                                                <p><a style="color:black" href="{{asset('media/'.$chat->message)}}">(Download attachement)</a></p>
                                                @else
                                                <p> {{$chat->message}} </p>
                                                @endif
                                                <span class="time"><a href="#" class="badge badge-info">Concumer</a> {{$chat->created_at->format('d M, H:mA')}}</span>
                                            </li>
                                            @endif
                                            @empty
                                            @endforelse

                                        </ul>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
