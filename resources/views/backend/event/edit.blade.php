@extends('backend.app')
@section('content')
    <div class="pagetitle">
      <h1>event Page</h1>
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
              <h5 class="card-title">Event Post</h5>

              <!-- Horizontal Form -->
              <form action="{{route('admin.event.update', $event->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b> Category <i class="text-danger">*</i> </b></label>
                  <select class="form-select" name="category_id">
                    <option value="">Choose...</option>
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" {{ $event->category_id== $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                    @endforeach
                  </select>
                      @error('category_id')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Title <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="title" value="{{old('title', $event->title)}}">
                      @error('title')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>                

                <div class="col-12">
                  <label for="inputNanme4" class="form-label"><b>Slug <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="slug" value="{{old('slug', $event->slug)}}">
                      @error('slug')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Excerpt <i class="text-danger">*</i></b></label>
                  <textarea class="form-control" name="excerpt">{{old('excerpt', $event->excerpt)}}</textarea>
                      @error('excerpt')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div> 
                <div class="col-md-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Description <i class="text-danger">*</i></b></label>
                  <div class="col-sm-12">
                    <textarea id="summernote" name="description">{{old('description', $event->description)}}</textarea>
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
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Event Date <i class="text-danger">*</i></b></label>
                  <input type="date" class="form-control" name="event_date" value="{{old('event_date', $event->event_date)}}">
                      @error('date')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Event Time <i class="text-danger">*</i></b></label>
                  <input type="time" class="form-control" name="event_time" value="{{old('event_time',$event->event_time)}}">
                      @error('event_time')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Event Venue <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="event_venue" value="{{old('event_venue', $event->event_venue)}}">
                      @error('event_venue')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Event Location <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="venue_location" value="{{old('venue_location', $event->venue_location)}}">
                      @error('venue_location')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Organizer Name <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="organizer_name" value="{{old('organizer_name', $event->organizer_name)}}">
                      @error('organizer_name')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Organizer Email <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="organizer_email" value="{{old('organizer_email', $event->organizer_email)}}">
                      @error('organizer_email')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Organizer Phone <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="organizer_phone" value="{{old('organizer_phone', $event->organizer_phone)}}">
                      @error('organizer_phone')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                <div class="col-12 mt-5">
                  <label for="inputNanme4" class="form-label"><b>Organizer Website <i class="text-danger">*</i></b></label>
                  <input type="text" class="form-control" name="organizer_website" value="{{old('organizer_website', $event->website)}}">
                      @error('organizer_website')
                        <span class="text-danger" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                </div>
                @include('backend.components.seo-edit', ['obj' => $event])

                <div class="col-md-12 mt-5 mb-5">
                  <label for="inputNanme4" class="form-label"><b>Status <i class="text-danger">*</i></b></label>
                  <select class="form-select" name="status">
                    <option value="">Choose...</option>
                    <option value="1" {{ $event->status=="1" ? 'selected' : '' }}>Publish</option>
                    <option value="0" {{ $event->status=="0" ? 'selected' : '' }}>Draft</option>
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