@extends('backend.app')
@section('content')
    <div class="pagetitle">
      <h1>Certification Page</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Pages</li>
          <li class="breadcrumb-item active">Blank</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Certification Post</h5>

              <!-- Horizontal Form -->
              <form action="{{route('admin.certification.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="col-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Name <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="name" value="{{old('name')}}">
                      @error('name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Issue Date <i class="text-danger">*</i></b></label>
                  <input type="date" class="form-control" name="issue_date" value="{{old('issue_date')}}">
                      @error('issue_date')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-md-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Image <i class="text-danger">*</i></b></label>
                  <input type="file" class="form-control" name="image">
                      @error('image')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-md-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Status <i class="text-danger">*</i></b></label>
                  <select class="form-select" name="status">
                    <option value="">Choose...</option>
                    <option value="1">Publish</option>
                    <option value="0">Draft</option>
                  </select>
                      @error('status')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection