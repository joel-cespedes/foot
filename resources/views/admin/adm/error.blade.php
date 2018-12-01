@if (count($errors) > 0)
    <div class="alert alert-danger">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        @foreach ($errors->all() as $error)

            <div>{{ $error }}</div>
        @endforeach
    </div>
@endif
