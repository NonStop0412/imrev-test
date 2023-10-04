@include('admin.index')
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="col-sm-12 col-md-6">
        <form action="{{route('clients.save')}}" method="POST">
            @csrf
            <div class="form-group">
                @error('name')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Name</label>
                <input type="text" required class="form-control rounded-0" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                @error('surnname')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Surname</label>
                <input type="text" required class="form-control rounded-0" id="name" name="surname" placeholder="Surname" value="{{old('surname')}}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Email</label>
                <input type="email" required class="form-control rounded-0" id="email" name="email" placeholder="Email" value="{{old('email')}}">
            <div class="card-footer h-100 d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary badge-light">Submit</button>
            </div>
        </form>
    </div>
</div>
