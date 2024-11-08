<div class="modal fade" id="modalUbahInstansi-{{ $instansi->slug }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalUbahInstansiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah Kabupaten
                    Kota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>

            <form action="{{ route('instansi.update', $instansi->slug) }}"
                method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Nama Kabupaten/Kota</label>
                        <div class="form-group position-relative">
                            <select name="kabkot" class="form-select form-control ps-5 text-primary" style="width: 100%;" required>
                                <option value="{{ $instansi->kabkot->slug ?? '' }}" class="text-dark">{{ $instansi->kabkot->nama_kabkot ?? 'Pilih Instansi' }}</option>
                                @foreach ($dataKabkot->where('slug', '!=', $instansi->kabkot->slug) as $kabkot)
                                <option value="{{ $kabkot->slug }}" class="text-dark">{{ $kabkot->nama_kabkot }}
                                </option>
                                @endforeach
                            </select>
                            <i class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y ps-20"></i>
                        </div>
                    </div>

                    <div class="form-group mb-4">
                        <label class="label">Nama Instansi</label>
                        <div class="form-group position-relative">
                            <input type="text" class="form-control ps-5 text-primary" placeholder="Masukan Nama Instansi {{ $instansi->id }}"
                                name="nama_instansi" value="{{ old('nama_instansi', $instansi->nama_instansi) }}" required>
                            <i class="ri-building-line position-absolute top-50 start-0 translate-middle-y ps-20"></i>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white"
                        data-bs-dismiss="modal">Batal</button>
                    <button type="submit"
                        class="btn btn-primary text-white">Kirim</button>
                </div>
            </form>

        </div>
    </div>
</div>