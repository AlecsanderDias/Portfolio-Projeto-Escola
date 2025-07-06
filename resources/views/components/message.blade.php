@if($errors->any())
    <ul class="alert alert-danger">
        @foreach ($errors->all() as $item)
            <li class="list-group-item">
                {{ $item }}
            </li>
        @endforeach
    </ul>
@endif
@if(isset($message))
    <ul class="alert alert-success">
        @foreach ($message as $item)
            {{ $item }}
        @endforeach
    </ul>
@endif