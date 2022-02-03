@extends('backend.app')
@section('content')
    <div class="pagetitle">
      <h1>Blog Page</h1>
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
              <h5 class="card-title">Blog Post</h5>

              <!-- Horizontal Form -->
              <form action="{{route('admin.testimonial.update', $testimonial->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Name <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="name" value="{{old('name', $testimonial->name)}}">
                      @error('name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Designation <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="designation" value="{{old('designation', $testimonial->designation)}}">
                      @error('designation')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Image <i class="text-danger">*</i></b></label>
                  <input type="file" class="form-control" name="image">
                      @error('image')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-md-12 mt-5 mb-5">
                  <label for="inputNanme4" class="form-label"><b>Status <i class="text-danger">*</i></b></label>
                  <select class="form-select" name="status">
                    <option value="">Choose...</option>
                    <option value="1" {{ $testimonial->status=="1" ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $testimonial->status=="1" ? 'selected' : '' }}>Draft</option>
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