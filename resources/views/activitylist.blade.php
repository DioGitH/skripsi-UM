@extends('layouts.app')

@section('content')
    <div class="m-auto" style="width: 80%">
            <div class="d-flex align-items-center mt-5" style="width:100%; height:50px; background-color: #1F304B; font-family: 'Inknut Antiqua', serif;">
                <div class="d-flex justify-content-center align-items-center text-white mx-auto" style="font-size: 40px; width: 50%; height: 50%;">
                    Aktifitas
                </div>
            </div>        
        <!-- Chart Bulanan -->
            <div class=" bg-white shadow w-100 px-5 py-3">
                <table class="w-100">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Subject</th>
                            <th>Desciption</th>
                            <th>Contribution</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                EKSPLORASI BATIK MODERN DALAM  GAUN PESTA REMAJA
                            </td>
                            <td>Batik, Gaun Pesta, Fashion Remaja</td>
                            <td>Rancangan gaun pesta remaja yang memadukan motif batik tradisional dengan cutting modern untuk menciptakan kesan anggun dan kekinian.</td>
                            <td>Windi Saputri, S.Pd.</td>
                            <td>Validasi 5-27-2025</td>
                            <td><button class="btn btn-primary">Sumbit</button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
    
    <div class="px-5">
        <a class="px-2" href="">Kembali</a>
    </div>
    
@endsection
