@include('admin.index')
<div class="h-100 d-flex align-items-center justify-content-center">
    <div class="col-sm-12 col-md-6">
        <form action="{{route('companies.save')}}" method="POST">
            @csrf
            <div class="form-group">
                @error('name')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Name</label>
                <input type="text" required class="form-control rounded-0" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                @error('email')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Email</label>
                <input type="email" required class="form-control rounded-0" id="email" name="email" placeholder="Email" value="{{old('email')}}">
                @error('foundation_year')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Foundation</label>
                <input type="date" required class="form-control rounded-0" id="foundation_year" name="foundation_year" value="{{old('foundation_year')}}">
                @error('description')
                <div class="alert alert-danger">{{ $message }}<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>
                @enderror
                <label for="name">Description</label>
                <textarea class="form-control" required rows="3" name="description" placeholder="Text...">{{old('description')}}</textarea>
            </div>
            <div class="card-footer h-100 d-flex align-items-center justify-content-center">
                <button type="submit" class="btn btn-primary badge-light">Submit</button>
            </div>
        </form>
    </div>
</div>
