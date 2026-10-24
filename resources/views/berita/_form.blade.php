<div class="mb-3">
    <label for="judul" class="form-label fw-semibold">Judul</label>
    <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $berita->judul ?? '') }}">
    @error('judul') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
<div class="row">
    <div class="col-md-6 mb-3">
    <label for="kategori_id" class="form-label fw-semibold">Kategori</label>
    <select name="kategori_id" id="kategori_id" class="form-select">
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategoris as $k)
            <option value="{{ $k->id }}"
                @selected(old('kategori_id', $berita->kategori_id ?? null) == $k->id)>{{ $k->nama }}</option>
        @endforeach
    </select>
    @error('kategori_id') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
    <div class="col-md-6 mb-3">
        <label for="penulis" class="form-label fw-semibold">Penulis</label>
        <input type="text" name="penulis" id="penulis" class="form-control" value="{{ old('penulis', $berita->penulis ?? 'Admin') }}">
        @error('penulis') <div class="text-danger small">{{ $message }}</div> @enderror
    </div>
</div>
<div class="mb-3">
    <label for="gambar" class="form-label fw-semibold">URL Gambar (opsional)</label>
    <input type="text" name="gambar" id="gambar" class="form-control" value="{{ old('gambar', $berita->gambar ?? '') }}">
    @error('gambar') <div class="text-danger small">{{ $message }}</div> @enderror
</div>
<div class="mb-3">
    <label class="form-label fw-semibold d-block">Tag</label>
    @foreach ($tags as $tag)
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="tags[]"
                   id="tag{{ $tag->id }}" value="{{ $tag->id }}"
                   @checked(in_array($tag->id, old('tags', isset($berita) ? $berita->tags->pluck('id')->toArray() : [])))>
            <label class="form-check-label" for="tag{{ $tag->id }}">#{{ $tag->nama }}</label>
        </div>
    @endforeach
</div>
<div class="mb-3">
    <label for="isi" class="form-label fw-semibold">Isi Berita (boleh tag &lt;p&gt;, &lt;h3&gt;, &lt;ul&gt;, &lt;li&gt;)</label>
    <textarea name="isi" id="isi" rows="8" class="form-control">{{ old('isi', $berita->isi ?? '') }}</textarea>
    @error('isi') <div class="text-danger small">{{ $message }}</div> @enderror
</div>