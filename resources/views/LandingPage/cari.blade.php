<div class="modal fade" id="cariMobil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('landingPage') }}" method="get">
                  @include('form.cariMobilForm')
                  <button type="submit" class="btn btn-block btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>