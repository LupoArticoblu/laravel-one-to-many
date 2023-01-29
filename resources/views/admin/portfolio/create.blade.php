@extends('layouts.app')

@section('title')
    | Inserisci nuovo
@endsection

@section('content')
    <div class="container">
        <h1 class="my-3">Aggiungi file</h1>


        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-lable">Titolo</label>
                <input type="text" class="form-control @error('title')
        is-invalid
      @enderror" id="title"
                    placeholder="Titolo" value="{{ old('title') }}" name="title">
                @error('title')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-lable">Data</label>
                <input type="date" class="form-control @error('date')
                is-invalid
                @enderror" id="date"
                    value="{{ old('date', date('Y-m-d')) }}" name="date">
                @error('date')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>

            <select class="form-select" aria-label="Default select example" name="category_id">
                <option value="" >Seleziona una categoria</option>
                @foreach ($categories as $category)
                    <option 
                    @if($category->id == old('category_id')) 
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
                    @if (in_array($tag->id, old('tags', [])))
                        checked
                    @endif>
                    <label for="tag{{$loop->iteration}}">{{$tag->name}}
                    </label>
                @endforeach
            </div>

            <div class="mb-3">
                <label for="image" class="form-lable"></label>
                <input onchange="showImage(event)" type="file" class="form-control @error('image')
                is-invalid
                @enderror" id="image"
                value="{{ old('image') }}" name="image">
                @error('image')
                <p class="invalid-feedback">{{ $message }}</p>
                @enderror
                <div class="mt-2">
                    <img width="100px" id="output-image" alt="">
                </div>
            </div>
            <div class="mb-3">
                <label for="text" class="form-lable">Descrizione</label>
                <textarea id="text" name="text"
                    rows="10">{{ old('text') }}</textarea>
                @error('text')
                    <p class="invalid-feedback">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Crea</button>
        </form>



        <script>
            ClassicEditor
                .create( document.querySelector( '#text' ) )
                .catch( error => {
                    console.error( error );
                } );

            function showImage(event){
                const tagImage = document.getElementById('output-image');
                //metodo per prendere la URL virtuale (la si trova in un array tratto dal console log di event)
                tagImage.src = URL.createObjectURL(event.target.file[0]);
            }    
        </script>
    </div>
@endsection
