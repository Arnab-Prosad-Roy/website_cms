@extends('backend.app')
@section('content')
    <div class="pagetitle">
      <h1>{{$pageTitle}}</h1>
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
              <h5 class="card-title">{{$pageTitle}}</h5>

              <!-- Horizontal Form -->
              <form action="{{route('admin.category.update', $category->id)}}" method="post">
                @csrf
                @method('PUT')

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Category Name <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="name" value="{{old('name', $category->name)}}">
                  <input type="hidden" class="form-control" name="category_head_id" value="{{$category->category_head_id}}">
                  <input type="hidden" class="form-control" name="slug_url" value="{{$categoryHead->slug}}">
                      @error('name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Slug <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="slug" value="{{old('slug', $category->slug)}}">
                      @error('slug')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-md-12 mt-5 mb-5">
                  <label for="inputNanme4" class="form-label"><b>Status <i class="text-danger">*</i></b></label>
                  <select class="form-select" name="status">
                    <option value="">Choose...</option>
                    <option value="1"  {{ $category->status=="1" ? 'selected' : '' }}>Publish</option>
                    <option value="0"  {{ $category->status=="0" ? 'selected' : '' }}>Draft</option>
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