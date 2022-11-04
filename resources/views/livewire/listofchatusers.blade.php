<div class="chat-list">
    @forelse($chatusers as $chatuser)
    <a wire:key="{{$chatuser->id}}" href="#" wire:click.prevent="updateChatUser({{$chatuser}})" class="d-flex align-items-center">
        <div class="flex-shrink-0">
            <img class="img-fluid mt-1" src="https://ui-avatars.com/api/?rounded=true&&name={{$chatuser->first_name.'+'.$chatuser->last_name}}" alt="user img">
        </div>

        <livewire:chatuser key="{{ Str::random() }}" :chatuser="$chatuser">

    </a>
    @empty
    @endforelse

</div>