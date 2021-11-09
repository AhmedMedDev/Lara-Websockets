@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{--  --}}
        @foreach (DB::table('users')->get() as $item)
            @if ($item->id != Auth::user()->id)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">{{ $item->name }} box</div>
                    <div class="card-body">
                        <div>
                            <div>Name : {{ $item->name }}</div>
                            <div>Email : {{ $item->email }}</div>
                        </div>
                        <br>
                        <button class="btn btn-primary" onclick="puke({{$item->id}})"> send notification</button>
                    </div>
                </div>
            </div>
            @endif
        @endforeach
        {{--  --}}
    </div>
</div>
<script>
    function puke (user_id) {
        axios.get(`/puke/${user_id}`)
        .then((response) => {
            console.log(response.data);
        });
    }
</script>
@endsection