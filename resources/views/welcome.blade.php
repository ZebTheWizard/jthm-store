@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row">

      <div class="col-12 my-3">
        <input type="text" name="search" class="search" placeholder="search...">
      </div>
      @forelse($items as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card my-1">
          <img class="card-img-top" src="{{ $item->image }}" alt="Card image cap">
          <div class="card-body">
            <h5 class="card-title">{{ $item->name }}</h5>
            <p class="card-text">{{ $item->description }}</p>
            <button type="button" class="btn btn-success linkable" url="add/cart" onsuccess="addedToCart" method="post" params='{"id": "{{$item->id}}" }'>
              <i class="fas fa-dollar-sign mr-1"></i>
              {{ money($item->price) }}
            </button>
          </div>
        </div>
      </div>
      @empty
      @endforelse

    </div>
</div>

@endsection
