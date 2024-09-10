<div class="modal fade action-sheet inset" id="actionSheetShare" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Share with</h5>
            </div>
            <div class="modal-body">
                <ul class="action-button-list">
                    <li>
                        <a href="javascript:void(0)" onclick="salinLink()" class="btn btn-list" data-dismiss="modal">
                            <span>
                                <ion-icon name="clipboard"></ion-icon>
                                Salin
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="page-blogpost.html#" class="btn btn-list" data-dismiss="modal">
                            <span>
                                <ion-icon name="logo-facebook"></ion-icon>
                                Facebook
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="page-blogpost.html#" class="btn btn-list" data-dismiss="modal">
                            <span>
                                <ion-icon name="logo-whatsapp"></ion-icon>
                                WhatsApp
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="page-blogpost.html#" class="btn btn-list" data-dismiss="modal">
                            <span>
                                <ion-icon name="logo-instagram"></ion-icon>
                                Instagram
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@push('js')
    <script>
        // Fungsi untuk menyalin link
        function salinLink() {
            var link = `{{ url()->current() }}`;

            navigator.clipboard.writeText(link).then(function() {
                // Menampilkan pesan setelah menyalin
                toastbox('toast-12', 1500)
            }).catch(function(err) {
                // Menampilkan pesan error jika ada masalah
                var message = document.getElementById("message");
                message.innerHTML = "Gagal menyalin link: " + err;
            });
        }
    </script>
@endpush
