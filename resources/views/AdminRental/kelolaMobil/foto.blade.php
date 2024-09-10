<div class="modal fade" id="lihatMobil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @if ($mobil->gambar == 'test')
                    <img src="{{ asset('img/mobil.jpg') }}" class="img-fluid" alt="image">
                @else
                <img src="{{ url(Storage::url('mobil/' . $mobil->gambar)) }}" class="img-fluid" alt="">
                @endif
            </div>
        </div>
    </div>
</div>
