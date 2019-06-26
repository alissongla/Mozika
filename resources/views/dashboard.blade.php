@extends('layouts.app')

@section('content')
<div class="bg-black">
    @include('layouts.headers.cards')
</div>    

    

@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush