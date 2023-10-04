@include('admin.index')
<div class="card">
    <!-- /.card-header -->
    <div class="mt-2 float-right">
        <a href="{{route('clients.create')}}" type="button" class="btn btn-primary float-right badge-light">Create</a>
    </div>
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Surname">Surname</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Companies">Companies</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Info">Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($clients as $client)
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$client->name}}</td>
                                <td>{{$client->surname}}</td>
                                <td>{{$client->email}}</td>
                                <td>{{count($client->companies)}}</td>
                                <td class="col-auto"><a href="{{route('clients.edit', $client->id)}}" class="bg-info color-palette col-2 text-center">Info</a>
                                    <form action="{{route('clients.delete')}}" method="POST">
                                        @csrf
                                        <input value="{{$client->id}}" name="clientId" hidden="">
                                        <button type="submit" class="btn btn-block bg-gradient-danger btn-sm mt-2">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
            <div>{{$clients->links()}}</div>
        </div>
    </div>
</div>


