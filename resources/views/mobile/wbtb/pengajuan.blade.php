@extends('mobile.layouts.app')

@section('title', 'Pengajuan')

@section('header', 'Pengajuan WBTB')
    
@section('content')

<div class="page-content">
    <div class="content-inner pt-0">
        <div class="container fb">

            <!-- Dashboard Area -->
            <div class="dashboard-area">

                <div class="list item-list recent-jobs-list">
                    <ul>
                        {{-- @foreach ($provinsis as $provinsi) --}}
                        <li>
                            <div class="item-content d-flex justify-content-between">
                                <span class="item-media d-flex align-items-center">
                                    <svg class="text-primary" width="60" height="60" viewBox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12.75 2C12.75 1.58579 12.4142 1.25 12 1.25C11.5858 1.25 11.25 1.58579 11.25 2V3.5H6.70399C6.04642 3.5 5.71764 3.5 5.41593 3.5982C5.28282 3.64152 5.15463 3.6987 5.03346 3.76879C4.75882 3.92767 4.53915 4.1723 4.09981 4.66156C3.24911 5.60893 2.82376 6.08262 2.72136 6.63619C2.67687 6.87669 2.67687 7.12331 2.72136 7.36381C2.82376 7.91738 3.24911 8.39107 4.09981 9.33844C4.53915 9.8277 4.75882 10.0723 5.03346 10.2312C5.15463 10.3013 5.28282 10.3585 5.41593 10.4018C5.71764 10.5 6.04642 10.5 6.70399 10.5H11.25V12.5H6.5C5.09554 12.5 4.39331 12.5 3.88886 12.8371C3.67048 12.983 3.48298 13.1705 3.33706 13.3889C3 13.8933 3 14.5955 3 16C3 17.4045 3 18.1067 3.33706 18.6111C3.48298 18.8295 3.67048 19.017 3.88886 19.1629C4.39331 19.5 5.09554 19.5 6.5 19.5H11.25V21.25H10C9.58579 21.25 9.25 21.5858 9.25 22C9.25 22.4142 9.58579 22.75 10 22.75H14C14.4142 22.75 14.75 22.4142 14.75 22C14.75 21.5858 14.4142 21.25 14 21.25H12.75V19.5H17.296C17.9536 19.5 18.2824 19.5 18.5841 19.4018C18.7172 19.3585 18.8454 19.3013 18.9665 19.2312C19.2412 19.0723 19.4608 18.8277 19.9002 18.3384C20.7509 17.3911 21.1762 16.9174 21.2786 16.3638C21.3231 16.1233 21.3231 15.8767 21.2786 15.6362C21.1762 15.0826 20.7509 14.6089 19.9002 13.6616C19.4608 13.1723 19.2412 12.9277 18.9665 12.7688C18.8454 12.6987 18.7172 12.6415 18.5841 12.5982C18.2824 12.5 17.9536 12.5 17.296 12.5H12.75V10.5H17.5C18.9045 10.5 19.6067 10.5 20.1111 10.1629C20.3295 10.017 20.517 9.82952 20.6629 9.61114C21 9.10669 21 8.40446 21 7C21 5.59554 21 4.89331 20.6629 4.38886C20.517 4.17048 20.3295 3.98298 20.1111 3.83706C19.6067 3.5 18.9045 3.5 17.5 3.5H12.75V2Z"
                                            fill="#1C274C" />
                                    </svg>
                                </span>
                                <a href="{{ route('mobile.admin.provinsi.show', $provinsi->slug) }}">
                                    <div class="item-inner">
                                        <div class="item-title-row">
                                            <div class="item-subtitle">{{ $provinsi->kode_provinsi }}</div>
                                            <h6 class="item-title">{{ $provinsi->nama_provinsi }}</h6>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <svg class="text-primary" width="20" height="20" viewBox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M21 16.8292V11.1625C21 10.1189 21 9.5971 20.7169 9.20427C20.4881 8.88694 20.1212 8.71828 19.4667 8.49121C19.3328 10.0974 18.8009 11.7377 17.9655 13.1734C16.9928 14.845 15.5484 16.3395 13.697 17.1472C12.618 17.6179 11.382 17.6179 10.303 17.1472C8.45164 16.3395 7.00718 14.845 6.03449 13.1734C5.40086 12.0844 4.9418 10.8778 4.69862 9.65752C4.31607 9.60117 4.0225 9.63008 3.76917 9.77142C3.66809 9.82781 3.57388 9.89572 3.48841 9.97378C3 10.4199 3 11.2493 3 12.9082V17.8379C3 18.8815 3 19.4033 3.28314 19.7961C3.56627 20.189 4.06129 20.354 5.05132 20.684L5.43488 20.8118L5.43489 20.8118C7.01186 21.3375 7.80035 21.6003 8.60688 21.6018C8.8498 21.6023 9.09242 21.5851 9.33284 21.5503C10.131 21.4347 10.8809 21.0597 12.3806 20.3099C13.5299 19.7352 14.1046 19.4479 14.715 19.3146C14.9292 19.2678 15.1463 19.2352 15.3648 19.2169C15.9875 19.1648 16.6157 19.2695 17.8721 19.4789C19.1455 19.6911 19.7821 19.7972 20.247 19.5303C20.4048 19.4396 20.5449 19.321 20.6603 19.1802C21 18.7655 21 18.1201 21 16.8292Z"
                                                    fill="#1C274C" />
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 2C8.68629 2 6 4.55211 6 7.70031C6 10.8238 7.91499 14.4687 10.9028 15.7721C11.5993 16.076 12.4007 16.076 13.0972 15.7721C16.085 14.4687 18 10.8238 18 7.70031C18 4.55211 15.3137 2 12 2ZM12 10C13.1046 10 14 9.10457 14 8C14 6.89543 13.1046 6 12 6C10.8954 6 10 6.89543 10 8C10 9.10457 10.8954 10 12 10Z"
                                                    fill="#1C274C" />
                                            </svg>
                                            <div class="item-price">{{ $provinsi->kabkots_count }} Kabupaten / Kota
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <div class="d-flex flex-column justify-content-center">
                                    <button class="btn btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#formUbahProvinsi-{{ $provinsi->slug }}">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M3.25 22C3.25 21.5858 3.58579 21.25 4 21.25H20C20.4142 21.25 20.75 21.5858 20.75 22C20.75 22.4142 20.4142 22.75 20 22.75H4C3.58579 22.75 3.25 22.4142 3.25 22Z"
                                                fill="#fb8500" />
                                            <path
                                                d="M11.5201 14.929L11.5201 14.9289L17.4368 9.01225C16.6315 8.6771 15.6777 8.12656 14.7757 7.22455C13.8736 6.32238 13.323 5.36846 12.9879 4.56312L7.07106 10.4799L7.07101 10.48C6.60932 10.9417 6.37846 11.1725 6.17992 11.4271C5.94571 11.7273 5.74491 12.0522 5.58107 12.396C5.44219 12.6874 5.33894 12.9972 5.13245 13.6167L4.04356 16.8833C3.94194 17.1882 4.02128 17.5243 4.2485 17.7515C4.47573 17.9787 4.81182 18.0581 5.11667 17.9564L8.38334 16.8676C9.00281 16.6611 9.31256 16.5578 9.60398 16.4189C9.94775 16.2551 10.2727 16.0543 10.5729 15.8201C10.8275 15.6215 11.0584 15.3907 11.5201 14.929Z"
                                                fill="#fb8500" />
                                            <path
                                                d="M19.0786 7.37044C20.3071 6.14188 20.3071 4.14999 19.0786 2.92142C17.85 1.69286 15.8581 1.69286 14.6296 2.92142L13.9199 3.63105C13.9296 3.6604 13.9397 3.69015 13.9502 3.72028C14.2103 4.47 14.701 5.45281 15.6243 6.37602C16.5475 7.29923 17.5303 7.78999 18.28 8.05009C18.31 8.0605 18.3396 8.07054 18.3688 8.08021L19.0786 7.37044Z"
                                                fill="#fb8500" />
                                        </svg>
                                    </button>

                                    {{-- MODAL UBAH --}}
                                    <div class="modal fade" id="formUbahProvinsi-{{ $provinsi->slug }}">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Form Ubah Provinsi</h5>
                                                    <button class="btn-close" data-bs-dismiss="modal">
                                                        <i class="fa-solid fa-xmark"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('mobile.admin.provinsi.update', $provinsi->slug) }}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <label for="kode_provinsi" class="form-label">Kode Provinsi
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" id="kode_provinsi" name="kode_provinsi"
                                                                placeholder="75" value="{{ $provinsi->kode_provinsi }}" class="form-control" required>
                                                        </div>

                                                        <label for="nama_provinsi" class="form-label">Nama Provinsi
                                                            <span class="text-danger">*</span>
                                                        </label>
                                                        <div class="input-group">
                                                            <input type="text" id="nama_provinsi" name="nama_provinsi"
                                                                placeholder="Gorontalo" value="{{ $provinsi->nama_provinsi }}" class="form-control" required>
                                                        </div>

                                                        <label for="deskripsi" class="form-label">Deskripsi</label>
                                                        <div class="input-group">
                                                            <textarea name="deskripsi" id="deskripsi" rows="4"
                                                                class="form-control"
                                                                placeholder="Deskripsi Singkat">{{ $provinsi->deskripsi }}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-sm btn-danger light"
                                                            data-bs-dismiss="modal">Batal</button>
                                                        <button type="submit" class="btn btn-sm btn-warning">Ubah
                                                            Data</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- END MODAL UBAH --}}

                                    <a href="{{ route('mobile.admin.provinsi.destroy', $provinsi->slug) }}" class="btn btn-sm" data-confirm-delete="true">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3 6.38597C3 5.90152 3.34538 5.50879 3.77143 5.50879L6.43567 5.50832C6.96502 5.49306 7.43202 5.11033 7.61214 4.54412C7.61688 4.52923 7.62232 4.51087 7.64185 4.44424L7.75665 4.05256C7.8269 3.81241 7.8881 3.60318 7.97375 3.41617C8.31209 2.67736 8.93808 2.16432 9.66147 2.03297C9.84457 1.99972 10.0385 1.99986 10.2611 2.00002H13.7391C13.9617 1.99986 14.1556 1.99972 14.3387 2.03297C15.0621 2.16432 15.6881 2.67736 16.0264 3.41617C16.1121 3.60318 16.1733 3.81241 16.2435 4.05256L16.3583 4.44424C16.3778 4.51087 16.3833 4.52923 16.388 4.54412C16.5682 5.11033 17.1278 5.49353 17.6571 5.50879H20.2286C20.6546 5.50879 21 5.90152 21 6.38597C21 6.87043 20.6546 7.26316 20.2286 7.26316H3.77143C3.34538 7.26316 3 6.87043 3 6.38597Z"
                                                fill="#c1121f" />
                                            <path fill-rule="evenodd" clip-rule="evenodd"
                                                d="M11.5956 22.0001H12.4044C15.1871 22.0001 16.5785 22.0001 17.4831 21.1142C18.3878 20.2283 18.4803 18.7751 18.6654 15.8686L18.9321 11.6807C19.0326 10.1037 19.0828 9.31524 18.6289 8.81558C18.1751 8.31592 17.4087 8.31592 15.876 8.31592H8.12404C6.59127 8.31592 5.82488 8.31592 5.37105 8.81558C4.91722 9.31524 4.96744 10.1037 5.06788 11.6807L5.33459 15.8686C5.5197 18.7751 5.61225 20.2283 6.51689 21.1142C7.42153 22.0001 8.81289 22.0001 11.5956 22.0001ZM10.2463 12.1886C10.2051 11.7548 9.83753 11.4382 9.42537 11.4816C9.01321 11.525 8.71251 11.9119 8.75372 12.3457L9.25372 17.6089C9.29494 18.0427 9.66247 18.3593 10.0746 18.3159C10.4868 18.2725 10.7875 17.8856 10.7463 17.4518L10.2463 12.1886ZM14.5746 11.4816C14.9868 11.525 15.2875 11.9119 15.2463 12.3457L14.7463 17.6089C14.7051 18.0427 14.3375 18.3593 13.9254 18.3159C13.5132 18.2725 13.2125 17.8856 13.2537 17.4518L13.7537 12.1886C13.7949 11.7548 14.1625 11.4382 14.5746 11.4816Z"
                                                fill="#c1121f" />
                                        </svg>
                                    </a>

                                </div>
                            </div>
                        </li>
                        {{-- @endforeach --}}
                    </ul>
                </div>
                <!-- Recent Jobs End -->

            </div>
        </div>
    </div>
</div>

@include('mobile.layouts.partials.floatActionButton')

{{-- MODAL TAMBAH --}}
@section('modalTitle', 'Form Tambah Provinsi')

@section('modalForm')
<form action="{{ route('mobile.admin.provinsi.store') }}" method="post">
    @csrf
    <div class="modal-body">
        <label for="kode_provinsi" class="form-label">Kode Provinsi
            <span class="text-danger">*</span>
        </label>
        <div class="input-group">
            <input type="text" id="kode_provinsi" name="kode_provinsi" placeholder="75" class="form-control" required>
        </div>

        <label for="nama_provinsi" class="form-label">Nama Provinsi
            <span class="text-danger">*</span>
        </label>
        <div class="input-group">
            <input type="text" id="nama_provinsi" name="nama_provinsi" placeholder="Gorontalo" class="form-control"
                required>
        </div>

        <label for="deskripsi" class="form-label">Deskripsi</label>
        <div class="input-group">
            <textarea name="deskripsi" id="deskripsi" rows="4" class="form-control"
                placeholder="Deskripsi Singkat"></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-danger light" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-primary">Simpan Data</button>
    </div>
</form>
@endsection

@endsection