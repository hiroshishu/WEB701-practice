@extends('layouts.app')

@section('content')
    <router-view></router-view>
@endsection

@push('scripts')
<script>
    const API_TOKEN = '{{Auth::user() ? Auth::user()->api_token : ''}}';
    const USER_ID = '{{Auth::id()}}';
</script>
<script src="{{mix('js/app.js')}}"></script>
@endpush
