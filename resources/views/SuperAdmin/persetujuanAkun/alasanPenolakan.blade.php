@if ($penolakans->count() > 0)
    <div class="card mb-3">
        <div class="card-body">
            <h4 class="m-0 font-weight-bold text-primary">Alasan Penolakan</h4>
            <hr />
            @foreach ($penolakans as $no => $penolakan)
                <h5>{{ $no + 1 }}. {{ $penolakan->alasanPenolakan }}</h5>
            @endforeach
        </div>
    </div>
@endif
