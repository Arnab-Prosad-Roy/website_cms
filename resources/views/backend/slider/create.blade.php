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
              <form action="{{route('admin.slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="col-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Title <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="title" value="{{old('title')}}">
                      @error('title')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Sub Title <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="subtitle" value="{{old('subtitle')}}">
                      @error('subtitle')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mb-3">
                  <label for="inputNanme4" class="form-label"><b>Btn URL <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="btn_url" value="{{old('btn_url')}}">
                      @error('btn_url')
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