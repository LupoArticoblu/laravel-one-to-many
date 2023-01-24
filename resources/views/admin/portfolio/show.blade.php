@extends('layouts.app')

@section('title')
    | {{$portfolio->title}}
@endsection

@section('content')
<div class="container text-center">
  <h1 class="my-3">{{$portfolio->title}} <a class="btn btn-primary" href="{{route('admin.portfolio.edit', $portfolio)}}">EDIT</a> </h1>
  <span>{{date_format(date_create($portfolio->date),'d/m/Y')}}</span>

  @if ($portfolio->image)
    <div>
      <img width="400px" src="{{asset('storage/' . $portfolio->image)}}" alt="{{$portfolio->image_original_name}}">
      <div><i>{{$portfolio->image_original_name}}</i></div>
    </div>
  @endif
  <img class="d-block m-auto my-3" src="{{$portfolio->image}}" alt="">
  <p>{!!$portfolio->text!!}</p>

  <a class="btn btn-dark" href="{{route('admin.portfolio.index')}}">torna alla Dashboard</a>


  @if (session('message'))

    <div class="alert-success" role="alert">{{session('message')}}</div>
  @endif
</div>
    
@endsection
