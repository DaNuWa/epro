<div class="card card-primary">


    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card-body">
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input disabled type="email" value="{{auth()->user()->email}}" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Holder name</label>
            <input wire:model="holder_name" type="text" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Bank name</label>
            <input wire:model="bank_name" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Branch name</label>
            <input wire:model="branch_name" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Branch card</label>
            <input wire:model="branch_code" type="text" class="form-control" id="exampleInputEmail1">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Account number</label>
            <input wire:model="account_number" type="text" class="form-control" id="exampleInputEmail1">
        </div>

    </div>

    <div class="card-footer">
        <button wire:click="updateCard" type="submit" class="btn btn-primary">Update</button>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
	window.addEventListener('cardUpdated', event => {
		toastr.success('Card details updated!', 'success!')
	})	
</script>


@endpush