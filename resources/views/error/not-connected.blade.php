@extends('layouts.main')

@section('content') 
  <div class="container-fluid">
      <!-- Error Text -->
      <div class="text-center">
        <div class="error mx-auto" data-text="Error">Error</div>
        <p class="text-gray-500 mb-0">Please make sure you have internet connection, Thank you!</p>
      <a style="color:#FF5055" href="{{route('home')}}">&larr; Back to Home</a>
      </div>
  </div>
@endsection