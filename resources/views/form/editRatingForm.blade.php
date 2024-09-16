<div class="from-group mb-3">
    <label for="">Bintang</label>
    <input type="text" value="{{ $dataRating->bintang }}" readonly class="form-control">
</div>
<div class="from-group mb-3">
    <label for="ulasan">Ulasan</label>
    <textarea readonly name="ulasan" id="ulasan" cols="30" rows="5" class="form-control" placeholder="Ulasan">{{ $dataRating->ulasan }}</textarea>
</div>