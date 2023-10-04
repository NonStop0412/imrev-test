@include('admin.index')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body">
        <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable dtr-inline" aria-describedby="example2_info">
                        <thead>
                        <tr>
                            <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name">Name</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Surname">Surname</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Email">Email</th>
                            <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Companies">Companies</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">{{$client->name}}</td>
                            <td>{{$client->surname}}</td>
                            <td>{{$client->email}}</td>
                            <td>
                                @foreach($client->companies as $company)
                                    <a href="{{route('companies.info', $company->id)}}">{{$company->name}}</a>
                                    <form action="{{route('clients.deleteCompany')}}" method="POST">
                                        @csrf
                                        <input value="{{$company->id}}" name="companyId" hidden="">
                                        <input value="{{$client->id}}" name="clientId" hidden="">
                                    <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
                                    </form>
                                    <br>
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
        <form action="{{route('clients.edit', $client->id)}}" method="POST">
            @csrf
            <div class="form-group">
                @error('name')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Name</label>
                <input type="text" required class="form-control rounded-0" id="name" name="name" value="{{$client->name}}">
                @error('surname')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Surname</label>
                <input type="text" required class="form-control rounded-0" id="surname" name="surname" value="{{$client->surname}}">

                @error('email')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Email</label>
                <input type="email" required class="form-control rounded-0" id="email" name="email" value="{{$client->email}}">
            <div class="card-footer h-100 d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary badge-light">Submit</button>
            </div>
            </div>
        </form>
    </div>
</div>
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="col-sm-12 col-md-6">
<form action="{{route('clients.addCompany', $client->id)}}" method="POST">
    @csrf
    <div class="form-group">
        @error('name')
        <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
        @enderror
        <div class="form-group">
            <label for="exampleSelectRounded0">Add Company</label>
            <select class="custom-select rounded-0" id="company" name="company_id">
                @foreach($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="card-footer h-100 d-flex align-items-center justify-content-center">
            <button type="submit" class="btn btn-primary badge-light">Submit</button>
        </div>
    </div>
</form>
    </div>
</div>
