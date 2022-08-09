@extends('layout')
@section('content')
  <h2>Judul Video : <span class="text-primary">{{$product->title}}</span> </h2>
  <a href="/" class="btn btn-primary">Kembali</a>
  <div class="row mt-4">
    @foreach ($images as $image)
        <div class="col-md-3">
          <div class="card text-white bg-secondary mb-3" style="max-width: 20rem;">
            <div >
              <video  controls autoplay height="720" width="480" style="object-fit: fill">
                  <source src="/product_images/{{$image->image}}" type="video/mp4" />
              </video>
          </div>
          </div>
        </div>
    @endforeach
  </div>
@endsection

