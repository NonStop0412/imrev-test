@include('admin.index')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending">Foundation</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">Description</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Clients</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$company->name}}</td>
                                <td>{{$company->email}}</td>
                                <td>{{$company->foundation_year}}</td>
                                <td>{{$company->description}}</td>
                                <td>
                                    @foreach($company->clients as $client)
                                        <a href="{{route('clients.edit', $client->id)}}">{{$client->name . ' '.  $client->surname . ' ' . $client->email}}</a> <br>
                                    @endforeach
                                </td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.card-body -->
</div>
<div class="h-100 d-flex align-items-center justify-content-center">
<div class="col-sm-12 col-md-6">
    <form action="{{route('companies.edit', $company->id)}}" method="POST">
        @csrf
        <div class="form-group">
            @error('name')
            <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
            @enderror
            <label for="name">Name</label>
            <input type="text" required class="form-control rounded-0" id="name" name="name" value="{{$company->name}}">
            @error('email')
            <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
            @enderror
            <label for="name">Email</label>
            <input type="email" required class="form-control rounded-0" id="email" name="email" value="{{$company->email}}">
            @error('foundation_year')
            <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
            @enderror
            <label for="name">Foundation</label>
            <input type="date" required class="form-control rounded-0" id="foundation_year" name="foundation_year" value="{{$company->foundation_year}}">
            @error('description')
            <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
            @enderror
            <label for="name">Description</label>
            <textarea class="form-control" required rows="3" name="description">{{$company->description}}</textarea>
        </div>
        <div class="card-footer h-100 d-flex align-items-center justify-content-center">
            <button type="submit" class="btn btn-primary badge-light">Submit</button>
        </div>
    </form>
</div>
</div>
