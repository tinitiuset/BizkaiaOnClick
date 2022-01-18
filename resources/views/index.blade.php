
<!DOCTYPE html>
<html lang="en" class="h-100">
<head>

    @include('layouts.header')

    <title>BizkaiaOnClick</title>
</head>
<body class="h-100">
    <div id="app" class="h-100">
        {{-- <indexVideo video="{{asset("video/index.mp4")}}"></indexVideo> --}}
    <indexVideo></indexVideo>
    </div>
    
    
</body>
</html>


            {{-- <div class="position-relative bottom-50 text-center" style="z-index: 999;">
                <p class="text-white">hola</p>
                <a href="" class="text-white p-2 bg-success">Comenzar</a>
            </div>

      <!-- This div is  intentionally blank. It creates the transparent black overlay over the video which you can modify in the CSS -->
   {{-- <div class="overlay"></div> --}}

  <!-- The HTML5 video element that will create the background video on the header -->
  {{-- <video playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
    <source src="https://storage.googleapis.com/coverr-main/mp4/Mt_Baker.mp4" type="video/mp4">
  </video>

  <!-- The header content -->
  <div class="container h-100 position-relative" style="z-index:2;">
    <div class="d-flex h-100 text-center align-items-center">
      <div class="w-100 text-white">
        <h1 class="display-3">Video Header</h1>
        <p class="lead mb-0">Using HTML5 Video and Bootstrap</p>
      </div>
    </div>  --}}

    
    {{-- <a href="" class="position-relative top-50 left-50 text-white" style="z-index: 999;">Comenzar</a> --}}


{{-- @section ('content')
    <div class="row">
        @foreach($eventos as $key => $evento)
        <div class="col-xs-6 col-md-3 text-center">
            <a href={{route('eventos.show',$key)}}>
                @foreach($fotos as $key => $foto)
                @if ($foto['evento'] == $evento['titulo'])
                <img src="../img/{{$foto['ruta']}}" alt="{{$evento['titulo']}}" style="height:200px">
                <h4 style="min-height:45px;margin:5px 0 10px 0">
                    {{$evento['titulo']}}
                </h4>
                @endif
               
                @endforeach
            </a>
        </div>
        @endforeach
    </div>

    <script src="{{ asset('js/app.js') }}" defer></script>

@endsection --}}