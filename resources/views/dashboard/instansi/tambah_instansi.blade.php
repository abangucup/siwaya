<div class="modal fade" id="modalTambahInstansi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalTambahInstansiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Instansi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('instansi.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group mb-4">
                        <label class="label">Nama Kabupaten/Kota</label>
                        <div class="form-group position-relative">
                            <select name="kabkot" class="form-select form-control ps-5" style="width: 100%;" required>
                                <option value="">Pilih Kabupaten/Kota</option>
                                @foreach ($dataKabkot as $kabkot)
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
                            <input type="text" class="form-control ps-5" placeholder="Masukan Nama Instansi"
                                name="nama_instansi" value="{{ old('nama_instansi') }}" required>
                            <i class="ri-building-line position-absolute top-50 start-0 translate-middle-y ps-20"></i>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary text-white">Kirim</button>
                </div>
            </form>
        </div>
    </div>
</div>