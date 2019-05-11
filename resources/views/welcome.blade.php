@extends('layouts.app')

@section('content')
    <router-view></router-view>
@endsection

@push('scripts')

<script src="/js/home.js"></script>

@endpush
