<h2>Pilih Jenis Karya ({{ ucfirst($profesi) }})</h2>
<ul>
@foreach ($jenisKaryas as $jk)
    <li>
        <a href="{{ route('jelajahi.karya', ['profesi' => $profesi, 'jenisKarya' => $jk->nama]) }}">
            {{ $jk->nama }}
        </a>
    </li>
@endforeach
</ul>
