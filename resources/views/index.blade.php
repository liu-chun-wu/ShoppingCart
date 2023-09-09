@extends('main')
@section('content')
    <div align="center">
        <br>
        <br>
        <br>
        <button onclick="to()">進入</button>
        <br>
        <br>
        <br>
    </div>

    <script>
        function to() {
            var url = "{{ route('page.show') }}";
            window.location.href = url;
        }
    </script>
@endsection
