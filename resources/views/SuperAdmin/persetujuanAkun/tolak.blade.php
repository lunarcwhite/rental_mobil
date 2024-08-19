<div class="modal fade" id="tolakAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tolak Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superAdmin.persetujuanAkun.tolak', $profile->userId) }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <textarea name="alasanPenolakan" required class="form-control" id="exampleInputPassword1"
                            placeholder="Alasan akun tidak disetujui" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info"
                        onclick="formConfirmation('Anda akan menolak persetujuan akun?')">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
