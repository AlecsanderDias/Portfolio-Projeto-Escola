@if(isset($error))
    <ul class="alert alert-danger">
        @foreach ($error as $item)
            {{ $item }}
        @endforeach
    </ul>
@else
    <ul class="alert alert-success">
        @foreach ($message as $item)
            {{ $item }}
        @endforeach
    </ul>
@endif