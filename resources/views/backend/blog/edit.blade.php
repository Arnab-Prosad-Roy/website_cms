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
              <form action="{{route('admin.blog.update', $blog->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b> Category <i class="text-danger">*</i> </b></label>
                  <select class="form-select" name="category">
                    <option value="">Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $blog->category_id== $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                  </select>
                      @error('category')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Title <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="title" value="{{old('title', $blog->title)}}">
                      @error('title')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Slug <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="slug" value="{{old('slug', $blog->slug)}}">
                      @error('slug')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Excerpt <i class="text-danger">*</i></b></label>
                  <textarea class="form-control" name="excerpt">{{old('excerpt', $blog->excerpt)}}</textarea>
                      @error('excerpt')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div> 
                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Description <i class="text-danger">*</i></b></label>
                  <div class="col-sm-12">
                    <textarea id="summernote" name="description">{{old('description', $blog->description)}}</textarea>
                      @error('description')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
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
                @include('backend.components.seo-edit', ['obj' => $blog])

                <div class="col-md-12 mt-5 mb-5">
                  <label for="inputNanme4" class="form-label"><b>Status <i class="text-danger">*</i></b></label>
                  <select class="form-select" name="status">
                    <option value="">Choose...</option>
                    <option value="1" {{ $blog->status=="1" ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $blog->status=="0" ? 'selected' : '' }}>Draft</option>
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