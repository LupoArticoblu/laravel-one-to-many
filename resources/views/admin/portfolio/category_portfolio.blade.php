@extends('layouts.app')

@section('title')
    | Categoria
@endsection

@section('content')
<div class="container">
  <h1 class="my-3">I miei lavori</h1>

  @if (session('deleted'))
    <div class="alert-success" role="alert">{{session('deleted')}} con successo</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col"> Categoria</th>
        <th scope="col"> File</th>
        
      </tr>
    </thead>
    <tbody>
      @forelse ($categories as $category)
        <tr>
          <td>{{$category->name}}</td>
          <td>
            <ul>
              @foreach ($category->portfolios as $portfolio)
                <li><a href="{{route('admin.portfolio.show', $portfolio)}}">{{$portfolio->title}}</a></li>
              @endforeach
            </ul>
          </td>
          <td></td>
          <td class="d-flex"> </td>
        </tr>  
      @empty

        <tr>
          <td><h3>nessun risultato</h3></td>
        </tr>

      @endforelse
      
    </tbody>
  </table>
</div>
@endsection  