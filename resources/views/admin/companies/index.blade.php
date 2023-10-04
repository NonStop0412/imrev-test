@include('admin.index')
<div class="card">
    <div class="mt-2 float-right">
        <a href="{{route('companies.create')}}" type="button" class="btn btn-primary float-right badge-light">Create</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Foundation">Foundation</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Description">Description</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Clients">Clients</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Info">Info</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $company)
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->foundation_year}}</td>
                            <td>{{$company->description}}</td>
                            <td> {{count($company->clients)}}</td>
                            <td class="col-auto">
                                <a href="{{route('companies.info', $company->id)}}" class="bg-info color-palette col-auto text-center">Info</a>
                                <form action="{{route('companies.delete')}}" method="POST">
                                    @csrf
                                    <input value="{{$company->id}}" name="companyId" hidden="">
                                    <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
         <div>{{$companies->links()}}</div>
    </div>
    </div>
    <!-- /.card-body -->
</div>

