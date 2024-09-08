<div class="modal fade" id="filterMobil" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cari Mobil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('/') }}" method="get">
                  @include('form.filterMobilForm')
                  <button type="submit" class="btn btn-block btn-primary">Cari</button>
                </form>
            </div>
        </div>
    </div>
</div>