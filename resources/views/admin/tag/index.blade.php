@extends('layouts.app')

@section('title')
    | Tags
@endsection

@section('content')
<div class="container">
  <h1 class="my-3">Gestione dei Tag</h1>

  @if (session('message'))
    <div class="alert alert-success" role="alert">{{session('message')}}</div>
  @endif

  <form action="{{route('admin.tag.store')}}" class="table w-50">
    @csrf
    <div class="input-group mb-3">
      <input name="name" type="text" class="form-control" placeholder="Nuovo Tag" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Aggiungi</button>
    </div>
  </form>

  <table class="table w-50">
    <thead>
      <tr>
        <th scope="col">Tag</th>
        <th scope="col">File count</th>
  
      </tr>
      
    </thead>
    <tbody>
      @forelse ($tags as $portfolio)
      <tr>
          <td class="d-flex">
            <form action="{{route('admin.tag.update', $portfolio)}}" method="POST">
              @csrf
              {{-- PATC cambia solo ciò che va modificato, PUT cambia tutto --}}
              @method('PATCH')
              <input class="border-0" type="text" name="name" value="{{$portfolio->name}}">
              <button type="submit" class="btn btn-primary me-1">UPDATE</button>
            </form>
            
            <form onsubmit="return confirm('eliminare {{$portfolio->title}}?')" 
              action="{{route('admin.tag.destroy', $portfolio)}}" method="POST">
              @csrf  @method('DELETE') 
              <button type="submit" class="btn btn-dark">DELETE</button>
            </form>
          </td>
          <td> 
            {{count($portfolio->portfolios)}}
          </td>
          
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
