<div class="modal fade" id="modalHapusKabkot-{{ $instansi->slug }}"
    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalHapusKabkotLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Hapus Kabupaten
                    Kota</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <form action="{{ route('instansi.destroy', $instansi->slug) }}"
                method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menghapus Instansi "<b>{{
                            $instansi->nama_instansi }}</b>" ini?</p>
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