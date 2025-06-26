@extends('layouts.admin')

@section('admin')
<div class="d-flex flex-column">
    <div class=" p-3 d-flex justify-content-between w-100">
        <div class="fw-bold mx-2" style="font-size: 32px">Publikasi</div>

        <div class="d-flex gap-5 mx-5">
            <button style="width:33px"><img src="{{ asset('assets/img/notif.png') }}" alt=""></button>
            <button style="width: 44px"><img src="{{ asset('assets/img/setting.png') }}" alt=""></button>
        </div>
    </div>
    <div class="" style="height: 10px; width: 100%; background-color: #1F304B;"></div>
    <div class=" p-3 px-5 mt-4" style="background-color: #efefef">
        <form method="GET" action=""class="row g-3 align-items-end">
            <div class="col-md-3">
                <label for="kategori" class="form-label">Kategori Karya</label>
                <select name="kategori" class="form-select">
                    <option value="">-- Semua Profesi --</option>
                    <option value="1" {{ request('kategori') == 1 ? 'selected' : '' }}>Guru</option>
                    <option value="2" {{ request('kategori') == 2 ? 'selected' : '' }}>Siswa</option>
                </select>
            </div>
            <div class="col-md-4">
                <label for="search" class="form-label">Cari Judul / Kreator</label>
                <input type="text" name="search" id="search" class="form-control" placeholder="Cari karya...">
            </div>
            <div class="col-md-3">
                <label for="tanggal" class="form-label">Tanggal Unggah</label>

                <input type="date" name="tanggal" value="{{ request('tanggal') }}"  id="tanggal" class="form-control">
            </div>
            <div class="col-md-1">
                <button type="submit" class="btn btn-primary w-100">Cari</button>
            </div>
        </form>
    </div>
    </div>
    <div class="table-responsive mx-5 my-4">
        <table class="table table-bordered table-striped">
            <thead class="text-white text-center" style="background-color: #1F304B">
                <tr>
                    <th>No</th>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Creator</th>
                    <th>Date</th>
                    <th>Aksi</th>
                    <th>status</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($karyas as $index => $karya)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $karya->title }}</td>
                        <td>{{ $karya->subject }}</td>
                        <td>{{ $karya->description }}</td>
                        <td>{{ $karya->creator }}</td>
                        <td>{{ $karya->date }}</td>
                        <td>
                            <a href="{{ route('karya.pratinjau', $karya->id) }}" class="btn btn-sm d-flex align-items-center gap-2">
                                <img src="{{ asset('assets/img/search.png') }}" alt="Pratinjau" style="width: 16px; height: 16px;">
                                <span>Pratinjau</span>
                            </a>
                        </td>
                        <td>
                            <div class="text-dark py-1 px-2" style="background-color: #2BE317; border-radius: 14px; font-size: 14px">
                                {{ $karya->status }}
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Belum ada karya untuk jenis ini.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
