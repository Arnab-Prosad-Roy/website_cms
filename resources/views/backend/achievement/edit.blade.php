@extends('backend.app')
@section('content')
    <div class="pagetitle">
      <h1>achievement Page</h1>
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
              <h5 class="card-title">achievement Post</h5>

              <!-- Horizontal Form -->
              <form action="{{route('admin.achivement.update', $achievement->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b> Category <i class="text-danger">*</i> </b></label>
                  <select class="form-select" name="category_id">
                    <option value="">Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $achievement->category_id== $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                  </select>
                      @error('category_id')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-3">
                  <label for="inputNanme4" class="form-label"><b>Award Name <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="award_name" value="{{old('award_name', $achievement->award_name)}}">
                      @error('award_name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>  
                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Title <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="title" value="{{old('title', $achievement->title)}}">
                      @error('title')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12 mt-3">
                  <label for="inputNanme4" class="form-label"><b>Issue Date <i class="text-danger">*</i></b></label>
                  <input type="date" class="form-control" name="issue_date" value="{{old('issue_date', $achievement->issue_date)}}">
                      @error('issue_date')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-md-12 mt-3">
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
                    <option value="1" {{ $achievement->status=="1" ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $achievement->status=="0" ? 'selected' : '' }}>Draft</option>
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