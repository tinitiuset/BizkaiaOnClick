@extends('layouts.app')
@section('content')

<div class="container">
    
    <div class="row">
        <div class="col-md-5">
            <create-evento></create-evento>

        </div>
    </div>


{{-- <script>
    import CreateEvento from "../js/components/CreateEvento";
    export default {
        components: {CreateEvento}
    }
</script> --}}
@endsection

