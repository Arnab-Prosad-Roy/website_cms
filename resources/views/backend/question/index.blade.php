@extends('backend.app')
@section('content')
    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Datatables</h5>
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($questions as $question)
                  <tr>
                    <th scope="row">{{$loop->iteration}}</th>
                    <td>{{$question->question}}</td>
                    <td>{{$question->answer}}</td>

                    <td>@if($question->status == '1')
                          <span class="text-success">Published</span>
                          @else
                          <span class="text-danger">Draft</span>
                        @endif</td>
                    <td>
					<a href="{{route('admin.question.edit', $question->id)}}"><button class="btn-group btn-group-lg btn-warning" role="group" aria-label="...">Edit</button></a>
					<button class="btn-group btn-group-sm btn-danger" role="group" aria-label="...">Delete</button>
                    </td>
                  </tr>
                @empty
                  <tr>
                    <th colspan="5">
						<div class="alert alert-warning" role="alert">
						  No Data Found!!
						</div>
                    </th>
                  </tr>
                @endforelse
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>
@endsection