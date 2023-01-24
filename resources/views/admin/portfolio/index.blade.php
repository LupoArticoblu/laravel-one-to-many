@extends('layouts.app')

@section('title')
    | Galleria
@endsection

@section('content')
<div class="container">
  <h1 class="my-3">I miei lavori</h1>

  @if (session('deleted'))
    <div class="alert-success" role="alert">{{session('deleted')}}</div>
  @endif

  <table class="table">
    <thead>
      <tr>
        <th scope="col"> <a href="{{route('admin.portfolios.orderby', ['id', $direction])}}">Id</a></th>
        <th scope="col"> <a href="{{route('admin.portfolios.orderby', ['title', $direction])}}">Titolo</a></th>
        <th scope="col"> <a href="{{route('admin.portfolios.orderby', ['date', $direction])}}">Data</a></th>
        
      </tr>
    </thead>
    <tbody>
      @forelse ($portfolios as $portfolio)
        <tr>
          <td>{{$portfolio->id}}</td>
          <td>{{$portfolio->title}}</td>
          <td>{{date_format(date_create($portfolio->date), 'Y-m-d')}}</td>
          <td class="d-flex"> 
            <a class="btn btn-danger me-1" href="{{route('admin.portfolio.show', $portfolio)}}">SHOW</a>
            <a class="btn btn-primary me-1" href="{{route('admin.portfolio.edit', $portfolio)}}">EDIT</a>
            <form onsubmit="return confirm('eliminare {{$portfolio->title}}?')" action="{{route('admin.portfolio.destroy', $portfolio)}}" method="POST">@csrf  @method('DELETE') <button type="submit" class="btn btn-dark">DELETE</button></form>
          </td>
        </tr>  
      @empty

        <tr>
          <td><h3>nessun risultato</h3></td>
        </tr>

      @endforelse
      
    </tbody>
  </table>

  <div>{{$portfolios->links()}}</div>

  
</div>
    
@endsection
