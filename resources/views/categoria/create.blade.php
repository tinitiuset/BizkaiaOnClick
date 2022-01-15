<form action="{{ url('/categoria') }}" method="post" enctype="multipart/form-data">
@csrf
@include('categoria.form');
</form>