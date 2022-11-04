<div class="col-12">
    <div class="chat-area">
        <div class="chatlist">
            <div class="modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="chat-header">


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="Open-tab" data-bs-toggle="tab" data-bs-target="#Open" type="button" role="tab" aria-controls="Open" aria-selected="true">Chats</button>
                            </li>

                        </ul>
                    </div>

                    <div class="modal-body">
                        <div class="chat-lists">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="Open" role="tabpanel" aria-labelledby="Open-tab">
                                    <livewire:listofchatusers key="{{ Str::random() }}" :chatusers="$chatusers">
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="chatbox">
            <div class="modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="msg-head">
                        <div class="row">
                            <div class="col-8 ">
                                @isset($user['first_name'])
                                <div class="d-flex align-items-center">
                                    <span class="chat-icon"><img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/arroleftt.svg" alt="image title"></span>
                                    <div class="flex-shrink-0">
                                        <img class="img-fluid" src="https://ui-avatars.com/api/?rounded=true&&name={{$user['first_name'].'+'.$user['last_name']}}" alt="user img">
                                    </div>
                                    <div class="flex-grow-1 ms-3 ml-2">
                                        <h3>{{$user['first_name']}}</h3>
                                    </div>
                                </div>
                                @endisset
                            </div>

                        </div>
                    </div>

                    <livewire:chatlist key="{{ Str::random() }}" :user="$user">


                        <div class="send-box">
                            <form action="">
                                <input wire:keydown.enter.prevent="sendMessage" @if($file) disabled @endif wire:model="message" type="text" class="form-control" aria-label="message…" placeholder="Write message…">

                                <button type="button" wire:click="sendMessage"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send</button>
                            </form>

                            <div class="send-btns">
                                <div class="attach">
                                    <div class="button-wrapper">
                                        <span class="label">
                                            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/upload.svg" alt="image title">Attach file
                                        </span><input type="file" wire:model="file" name="upload" id="upload" class="upload-box" placeholder="Upload File" aria-label="Upload File">
                                        @if($file) <span>{{$file->getClientOriginalName()}}</span> @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>


</div>