<div class="card card-primary">

    <h1 class="container">Update your password</h1>
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
            <label for="exampleInputEmail1">Old Password</label>
            <input wire:model="old_password" type="password" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">New Password</label>
            <input wire:model="password" type="password" class="form-control" id="exampleInputEmail1">
        </div>

        <div class="form-group">
            <label for="exampleInputEmail1">Confirm Password</label>
            <input wire:model="new_password" type="password" class="form-control" id="exampleInputEmail1">
        </div>

    </div>

    <div class="card-footer">
        <button wire:click="updatePassword" type="submit" class="btn btn-primary">Save changes</button>
    </div>
</div>

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script>
    window.addEventListener('passwordUpdated', event => {
        toastr.success('Password updated!', 'success!')
    })
</script>


@endpush