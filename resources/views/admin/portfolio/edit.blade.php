@extends('layouts.app')

@section('title')
    | Edita file
@endsection

@section('content')
<div class="container">
  <h1>Modifica Portfolio</h1>

  <form action="{{route('admin.portfolio.update', $portfolio)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-3">
      <label for="title" class="form-lable">Titolo</label>
      <input type="text" class="form-control @error('title')
        is-invalid
      @enderror" id="title" placeholder="Titolo" value="{{old('title', $portfolio->title)}}" name="title">
      @error('title')
        <p class="invalid-feedback">{{message}}</p>
      @enderror
    </div>
    <div class="mb-3">
      <label for="date" class="form-lable">Data</label>
      <input type="date" class="form-control @error('date')
      is-invalid
    @enderror" id="date" value="{{old('date', $portfolio->date)}}" name="date">
    @error('date')
        <p class="invalid-feedback">{{message}}</p>
      @enderror
    </div>
    <select class="form-select" aria-label="Default select example" name="category_id">
      <option value="" >Seleziona una categoria</option>
       @foreach ($categories as $category)
          <option 
          @if($category->id == old('category_id', $portfolio->category? $portfolio->category->id : '')) 
              selected 
          @endif
          value="{{$category->id}}">{{$category->name}}</option>
      @endforeach
    </select> 

    <div class="mb-3">
      <p class="form-lable mt-1">Tags</p>
      @foreach ($tags as $tag)

      {{-- $Loop->iteration è una proprietà di laravel per rendere dinamici gli id sconosciuti --}}
          <input id="tag{{$loop->iteration}}" type="checkbox" name="tags[]" value="{{$tag->id}}"

          {{-- metodo del model per verificare i contenuti di un dato array: contain() --}}
          @if (!$errors->all() && in_array($portfolio->tags->contain($tag)))
              checked
          @elseif ($errors->all() && in_array($tag->id, old('tags',[])))    
          @endif>
          <label for="tag{{$loop->iteration}}">{{$tag->name}}</label>
      @endforeach
    </div>

    <div class="mb-3">
      <label for="image" class="form-lable"></label>
      <input onchange="showImage(event)" type="file" class="form-control @error('image')
      is-invalid
    @enderror" id="image" value="{{old('image', $portfolio->image)}}" name="image" placeholder="exemple: https\\girasole-immagine.jpeg">
    @error('image')
        <p class="invalid-feedback">{{message}}</p>
      @enderror
      <div class="mt-2">
        <img width="100px" id="output-image" src="{{asset('storage/' . $portfolio->image)}}" alt="{{$portfolio->image_original_name}}">
      </div>
    </div>
    <div class="mb-3">
      <label for="text" class="form-lable">Descrizione</label>
      <textarea class="form-control @error('text')
      is-invalid
    @enderror" id="text" name="text" rows="3">{{old('text')}}</textarea>
    @error('text')
        <p class="invalid-feedback">{{message}}</p>
      @enderror
    </div>
    <button type="submit" class="btn btn-primary">Crea</button>
  </form>
</div>
@endsection  