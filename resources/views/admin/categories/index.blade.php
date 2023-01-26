@extends('layouts.app')

@section('title')
    | Categorie
@endsection

@section('content')
<div class="container">
  <h1 class="my-3">Gestione categorie</h1>

  @if (session('message'))
    <div class="alert alert-success" role="alert">{{session('message')}}</div>
  @endif

  <form action="{{route('admin.categories.store')}}" class="table w-50">
    <div class="input-group mb-3">
      <input name="name" type="text" class="form-control" placeholder="Nuova categoria" aria-label="Recipient's username" aria-describedby="button-addon2">
      <button class="btn btn-outline-secondary" type="button" id="burron-addon2">Aggiungi</button>
    </div>
  </form>

  <table class="table w-50">
    <thead>
      <tr>
        <th scope="col">Categoria</th>
        <th scope="col">File count</th>
  
      </tr>
      
    </thead>
    <tbody>
      @forelse ($categories as $portfolio)
      <tr>
          <td class="d-flex">
            <form action="{{route('admin.categories.update', $portfolio)}}" method="POST">
              @csrf
              {{-- PATC cambia solo ciò che va modificato, PUT cambia tutto --}}
              @method('PATCH')
              <input class="border-0" type="text" name="name" value="{{$portfolio->name}}">
              <button type="submit" class="btn btn-primary">UPDATE</button>
            </form>
            
            <form onsubmit="return confirm('eliminare {{$portfolio->title}}?')" 
              action="{{route('admin.categories.destroy', $portfolio)}}" method="POST">
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
