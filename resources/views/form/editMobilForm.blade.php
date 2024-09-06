<div class="form-group basic">
    <div class="input-wrapper">
        <label class="label" for="namaMobil">Jenis Mobil</label>
        <input type="text" name="namaMobil" value="{{ $mobil->namaMobil }}" class="form-control" id="namaMobil" placeholder="Jenis Mobil">
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
    </div>
</div>
<div class="form-group basic">
    <div class="input-wrapper">
        <label class="label" for="platMobil">Plat Mobil</label>
        <input type="text" name="platMobil" value="{{ $mobil->platMobil }}" class="form-control" id="platMobil" placeholder="Plat Mobil">
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
    </div>
</div>

<div class="form-group basic">
    <div class="input-wrapper">
        <label class="label" for="jumlahKursi">Jumlah Kursi</label>
        <input type="number" class="form-control" value="{{ $mobil->jumlahKursi }}" name="jumlahKursi" id="jumlahKursi" placeholder="Jumlah Kursi">
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
    </div>
</div>
<div class="section-title">Gigi</div>
<div class="wide-block p-0">

    <div class="input-list">
        @if ($mobil->gigi !== null && $mobil->gigi == 'Manual')
        <div class="custom-control custom-radio">
            <input type="radio" id="manual" checked name="gigi" value="Manual" class="custom-control-input">
            <label class="custom-control-label" for="manual">Manual</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="matic" name="gigi" value="Matic" class="custom-control-input">
            <label class="custom-control-label" for="matic">Matic</label>
        </div>
        @else
        <div class="custom-control custom-radio">
            <input type="radio" id="manual" name="gigi" value="Manual" class="custom-control-input">
            <label class="custom-control-label" for="manual">Manual</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="matic" checked name="gigi" value="Matic" class="custom-control-input">
            <label class="custom-control-label" for="matic">Matic</label>
        </div>
        @endif
    </div>

</div>


<div class="section-title">Bahan Bakar</div>
<div class="wide-block p-0">

    <div class="input-list">
        @if ($mobil->bahanBakar != null && $mobil->bahanBakar == 'Bensin')
        <div class="custom-control custom-radio">
            <input type="radio" id="bensin" checked name="bahanBakar" value="Bensin" class="custom-control-input">
            <label class="custom-control-label" for="bensin">Bensin</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="solar" name="bahanBakar" value="Solar" class="custom-control-input">
            <label class="custom-control-label" for="solar">Solar</label>
        </div> 
        @else
        <div class="custom-control custom-radio">
            <input type="radio" id="bensin" name="bahanBakar" value="Bensin" class="custom-control-input">
            <label class="custom-control-label" for="bensin">Bensin</label>
        </div>
        <div class="custom-control custom-radio">
            <input type="radio" id="solar" checked name="bahanBakar" value="Solar" class="custom-control-input">
            <label class="custom-control-label" for="solar">Solar</label>
        </div>
        @endif
    </div>

</div>
<div class="form-group basic">
    <div class="input-wrapper">
        <label class="label" for="harga">Harga Rental</label>
        <input type="number" value="{{ $mobil->harga }}" class="form-control" id="harga" name="harga" placeholder="Harga">
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
    </div>
</div>
<div class="form-group basic">
    <div class="input-wrapper">
        <label class="label" for="deskripsi">Deskripsi</label>
        <input type="text" value="{{ $mobil->deskripsi }}" class="form-control" name="deskripsi" id="deskripsi" placeholder="Deskripsi">
        <i class="clear-input">
            <ion-icon name="close-circle"></ion-icon>
        </i>
    </div>
</div>
<div class="section full">
    <div class="section-title">Foto Mobil</div>
    <div class="wide-block pb-2 pt-2">
        <div class="custom-file-upload">
            <input type="file" id="fileuploadInput" name="gambar" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline"></ion-icon>
                        <i>Klik Disini</i>
                    </strong>
                </span>
            </label>
        </div>
    </div>
</div>
