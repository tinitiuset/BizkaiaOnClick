
    @extends ('adminlte::page')

    @section('title','Categorias')
    
    @section('content')
    <div class="container">
        <div id="app">
        <div class="row justify-content-center">
            
            <a href="{{ url('/admin/eventos/create')}}" class="btn btn-success"> Registrar un nuevo evento </a>
            
            <div class="col-md-10">
                <Eventos></Eventos>
            </div>
        </div>
    </div>
</div>

{{--</div>--}}

<script async src="{{mix('js/app.js')}}"></script>
</body>
</html>
<script>
    import Eventos from "../js/components/Eventos";
    import CreateEvento from "../js/components/CreateEvento";
    export default {
        components: {CreateEvento, Eventos}
    }
</script>
@endsection