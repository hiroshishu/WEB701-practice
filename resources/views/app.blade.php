@extends('layouts.app')

@section('content')
    <router-view></router-view>
@endsection

@push('scripts')
<script>
    const API_TOKEN = '{{Auth::user() ? Auth::user()->api_token : ''}}';
    const USER_ID = '{{Auth::id()}}';
    @if (Auth::user())
    const USER_INFO = {
        is_grower:  {{Auth::user()->is_grower}},
        phone:      '{{Auth::user()->phone}}',
        address:    '{{preg_replace("/\r|\n/", " ", Auth::user()->address)}}',
        intro:      '{{preg_replace("/\r|\n/", " ", Auth::user()->intro)}}'
    };
    @endif
</script>
<script src="{{asset('js/app.js')}}"></script>
@endpush
