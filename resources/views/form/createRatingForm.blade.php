<div class="from-group mb-3">
    <label for="">Bintang</label>
    <select name="bintang" id="bintang" class="form-control">
        @for ($i = 1; $i < 6; $i++)
            <option value="{{ $i }}">{{ $i }}</option>
        @endfor
    </select>
</div>
<div class="from-group mb-3">
    <label for="ulasan">Ulasan</label>
    <textarea name="ulasan" id="ulasan" cols="30" rows="10" class="form-control" placeholder="Ulasan"></textarea>
</div>