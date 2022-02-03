@extends('backend.app')
@section('content')
    <div class="pagetitle">
      <h1>Question Page</h1>
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
              <form action="{{route('admin.question.store')}}" method="post">
                @csrf
                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b> Category <i class="text-danger">*</i> </b></label>
                  <select class="form-select" name="category_id">
                    <option value="">Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                      @error('category_id')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Question <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="question" value="{{old('question')}}">
                      @error('question')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Answer <i class="text-danger">*</i></b></label>
                  <div class="col-sm-12">
                    <textarea id="summernote" name="answer">{{old('answer')}}</textarea>
                      @error('answer')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                  </div>
                </div>

                <div class="col-md-12 mt-5 mb-5">
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