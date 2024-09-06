<div class="card mt-2 mb-3">
    <div class="card-header">
        <h4 class="card-title">Hapus Akun</h4>
    </div>
    <div class="card-body">
            <button type="button" data-toggle="modal"
                    data-target="#hapusAkun"
            class="btn btn-danger">Hapus Akun</button>
    </div>
</div>
<div class="modal fade" id="hapusAkun" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Akun</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('profile.destroy')}}" method="post">
                    @csrf
                    @method('delete')
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        @include('form.passwordForm')
                    </div>
                    <button type="button" class="btn btn-danger" onclick="formConfirmation('Anda akan menghapus akun?')">
                        Hapus Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>