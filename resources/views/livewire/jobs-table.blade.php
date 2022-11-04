<div>

    <h1 class="container">All jobs</h1>

    <div style="margin-left:207px" wire:loading class="spinner-border text-primary" role="status">
        <span class="sr-only">Loading...</span>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Description</th>
                <th scope="col">Transaction Id</th>
                <th scope="col">Payment recived at</th>
                <th scope="col">Need to deliver at</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>

            @forelse ($allJobs as $job)
            <tr>
                <td>{{$job->description}}</td>
                <td>{{$job->transaction_id}}</td>
                <td>{{$job->created_at}}</td>
                <td>{{$job->needToDeliverAt()}}</td>
                <td><span @class(['badge badge-fill', 'badge-warning'=>$job->status=='pending',
                        'badge-success'=>$job->status=='complete',
                        'badge-secondary'=>$job->status=='reject',
                        'badge-info'=>$job->status=='in-progress',
                        'badge-danger'=>$job->expired()])>{{$job->status}}</span></td>
                @if(auth()->user()->is_provider)
                <td>
                    @if(!$job->started_at)
                    @if($job->status!='reject')
                    <button wire:click="markAsStarted({{$job->id}})" type="button" class="btn btn-primary">Mark as started</button>
                    <button wire:click="markAsRejected({{$job->id}})" type="button" class="btn btn- btn-danger mt-1">Mark as rejected</button>
                    @endif
                    @else
                    <button @if($job->status=='complete') disabled @endif wire:click="markAsCompleted({{$job->id}})" type="button" class="btn btn-primary">Mark as completed</button>
                    @endif
                </td>
                @endif
            </tr>
            @empty
            @endforelse
        </tbody>
    </table>

    {{ $allJobs->links() }}

</div>