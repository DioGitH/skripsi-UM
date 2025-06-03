@extends('layouts.app')

@section('content')
    <div class="m-auto" style="width: 80%">
        <a href="{{route('activitylist')}}">
            <div class="d-flex align-items-center mt-5" style="width:15%; height:50px; background-color: #1F304B; font-family: 'Inknut Antiqua', serif;">
                <div class="d-flex justify-content-center align-items-center text-white mx-auto" style="font-size: 40px; width: 50%; height: 50%;">
                    Aktifitas
                </div>
            </div>
        </a>        
        <!-- Chart Bulanan -->
            <div class="p-6 mt-5 bg-white rounded shadow w-75">
            </div>
    </div>
    
    <div class="px-5">
        <a class="px-2" href="">Kembali</a>
    </div>
    
@endsection
