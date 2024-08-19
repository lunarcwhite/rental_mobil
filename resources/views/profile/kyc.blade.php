<div class="modal fade" id="lihatKyc" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Kartu Tanda Pengenal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{ url(Storage::url('kyc/'. $profile->kyc)) }}" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</div>