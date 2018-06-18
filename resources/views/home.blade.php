@extends('layouts.main')

@section('content')

<div class="container mt-4">
    <div class="row justify-content-center mb-3">
      <div class="col-md-10">
        <h1>Dashboard</h1>
        <hr>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-10" id="accordion">

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="card">
          <div class="h5 card-header accordion-header" data-toggle="collapse" data-target="#create-store-item">
            Create Store Item
            <i class="far fa-chevron-right"></i>
          </div>
          <form action="/create/item" method="post" enctype="multipart/form-data">
            @csrf
            <div id="create-store-item" class="collapse">
              <div  class="card-body">
                @include('dashboard.createItem')
              </div>
            </div>
          </form>
        </div>

        <div class="card">
          <div class="h5 card-header accordion-header" data-toggle="collapse" data-target="#logout">Logout<i class="far fa-chevron-right"></i></div>
          <form action="/logout" method="post">
            @csrf
            <div id="logout" class="collapse">
              <div  class="card-body">
                @include('dashboard.logout')
              </div>
            </div>
          </form>
        </div>

      </div>
    </div>
</div>
@endsection


@section('scripts')
<!-- <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script> -->
@endsection
