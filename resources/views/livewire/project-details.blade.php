<div class="card-body">
    <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-sm-12">
                <table id="table_id" class="table table-bordered table-striped dataTable dtr-inline" aria-describedby="example1_info">
                    <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Transaction Id</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Consumer email</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Provider email</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Status</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Deliver time</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Amount </th>
                            <!-- <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Project accepted time</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Project completed time</th>
                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Project rejected time</th> -->


                        </tr>
                    </thead>
                    <tbody>
                        @forelse($projects as $project)
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{$project->transaction_id}}</td>
                            <td>{{$project->consumer->email}}</td>
                            <td>{{$project->provider->email}}</td>
                            <td>{{$project->status}}</td>
                            <td>{{$project->created_at->addHours($project->hours)}}</td>
                            <td>{{$project->amount}}</td>
                            <!-- <td>{{$project->accepted_at}}</td>
                            <td>{{$project->completed_at}}</td>
                            <td>{{$project->rejected_at}}</td> -->
                        </tr>
                        @empty
                        @endforelse
                       
                </table>
            </div>
        </div>
       
    </div>
</div>
@push('scripts')

<script>
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>

@endpush