<div class="container">

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="form-group">
        <label for="exampleInputEmail1">Title</label>
        <input type="text" wire:model="title" class="form-control" placeholder="Title">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Rate(hourly)</label>
        <input type="number" wire:model="rate" class="form-control" placeholder="Rate">
    </div>

    <div class="form-group">
        <label for="exampleInputEmail1">Description</label>
        <textarea wire:model="description" class="form-control" placeholder="Profile description" rows="4" cols="50">
                    </textarea>
    </div>




    <label for="newsletter">Select your categories</label>
    <div class="checkbox">
        @foreach($categories as $category)
        <label>
            <input style="margin-right: 15px;margin-left:5px;" wire:model.defer="selectedCategories" type="checkbox" value="{{$category->id}}">{{$category->name}}
        </label>
        @endforeach
    </div>




    <x-input.filepond wire:model="images" multiple allowImagePreview imagePreviewMaxHeight="200" allowFileTypeValidation acceptedFileTypes="['image/png', 'image/jpg','image/jpeg']" allowFileSizeValidation maxFileSize="4mb" />

    <button wire:click="addProfile" class="btn btn-primary">Submit</button>
</div>