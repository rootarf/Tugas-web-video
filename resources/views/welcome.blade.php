@extends('layout')
@section('content')
<h1 head center> Website Upload Video </h1 head center>
<div class="row justify-content-between">
    @if(session('success'))
    <div class="alert alert-dismissible alert-success">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        <h4 class="alert-heading">Berhasil!</h4>
        <p class="mb-0">Video Berhasil Terupload!</p>
    </div>
    @endif
    <div class="col-md-5">
        <form action="/add-product" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="title" class="mt-4" >Judul Video :</label>
                <input 
                    type="text" 
                    class="form-control @error('title') is-invalid @enderror " 
                    name="title" 
                    placeholder="Masukan Judul Video"
                >
                <span class="text-danger">
                    @error('title')
                        {{$message}}
                    @enderror
                </span>

            </div>

            <div class="form-group">
                <label for="files" class="form-label mt-4">Upload Video :</label>
                <input 
                    type="file" 
                    name="images[]"
                    class="form-control" 
                    accept="image/*"
                    multiple
                >
            </div>
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Simpan Video</button>
            </div>
        </form>
    </div>
    <div class="col-md-6">
        <h3>Daftar Video</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Judul Video</th>

                    <th>Tampilkan Video</th>
                </tr>
            </thead>
            <tbody>
                @php $i=1; @endphp
                @forelse ($products as $product)
                    <tr>
                        <td>{{$i++;}}</td>
                        <td>{{$product->title}}</td>

                        <td>
                            <a href={{route('product.images',$product->id)}} class="btn btn-outline-dark">Putar</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Belum Ada Video!</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection