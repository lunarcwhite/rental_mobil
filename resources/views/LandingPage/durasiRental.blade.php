<div class="modal fade" id="durasiRental" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Durasi Merental Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pembayaran.store', $mobil->id) }}" method="post">
                    @csrf
                    @include('form.filterMobilForm')
                    <button type="button" onclick="formConfirmation('Lanjutkan ke pembayaran?')" class="btn btn-block btn-primary">Lanjutkan Ke Pembayaran</button>
                </form>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        document.getElementById('kecamatanGroup').remove();
    </script>
@endpush
