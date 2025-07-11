@if($sudah_memilih)
    <h2>Terima kasih, kamu sudah memilih</h2>
    <p>Kamu udah pakai hak suara kamu. Makasih banyak</p>
@else
    <h2>Silakan Pilih Kandidat:</h2>
    @foreach ($kandidats as $k)
        <div style="margin-bottom: 1rem;">
            <p>Ketua: {{ $k->nama_ketua }} | Wakil: {{ $k->nama_wakil }}</p>
            <form method="POST" action="{{ route('user.vote', $k->id) }}">
                @csrf
                <button type="submit">Vote</button>
            </form>
        </div>
    @endforeach
@endif

{{-- Pesan sukses dari redirect --}}
@if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
@endif
