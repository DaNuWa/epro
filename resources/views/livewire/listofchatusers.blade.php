<div class="chat-list">
    @forelse($chatusers as $chatuser)
    <a wire:key="{{$chatuser->id}}" href="#" wire:click.prevent="updateChatUser({{$chatuser}})" class="d-flex align-items-center">
        <div class="flex-shrink-0">
            <img class="img-fluid" src="https://mehedihtml.com/chatbox/assets/img/user.png" alt="user img">
            <span class="active"></span>
        </div>

        <livewire:chatuser key="{{ Str::random() }}" :chatuser="$chatuser">

    </a>
    @empty
    @endforelse

</div>