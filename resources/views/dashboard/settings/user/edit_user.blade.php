<div class="modal fade" id="modalUbahUser-{{ $user->slug }}" data-bs-backdrop="static" data-bs-keyboard="false"
    tabindex="-1" aria-labelledby="modalUbahUserLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Ubah User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('settings.user.update', $user->slug) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">

                        <div class="form-group mb-4">
                            <label class="label">Nama Instansi <span class="text-danger">*</span></label>
                            <div class="form-group position-relative">
                                <select name="instansi" class="form-select form-control ps-5 text-primary"
                                    style="width: 100%;" required>
                                    <option value="{{ $user->instansi?->slug ?? '' }}"
                                        class="text-dark">{{ $user->instansi?->nama_instansi . ' - ' . $user->instansi?->kabkot->nama_kabkot ?? 'Pilih Instansi' }}
                                    </option>
                                    @foreach ($dataInstansi->where('slug', '!=', $user->instansi?->slug) as $instansi)
                                    <option value="{{ $instansi->slug }}" class="text-dark">{{
                                        $instansi->nama_instansi . ' - ' . $instansi->kabkot->nama_kabkot }}
                                    </option>
                                    @endforeach


                                </select>
                                <i
                                    class="ri-map-2-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Nama Lengkap <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5"
                                        placeholder="Masukan Nama Lengkap" name="nama_lengkap"
                                        value="{{ old('nama_lengkap', $user->biodata->nama_lengkap) }}" required>
                                    <i
                                        class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <select name="jenis_kelamin" class="form-select form-control ps-5 text-dark"
                                        style="width: 100%;" required>
                                        <option value="{{ $user->biodata->jenis_kelamin }}">{{
                                            ($user->biodata->jenis_kelamin == 'L' ? 'Laki - Laki' : 'Perempuan') }}
                                        </option>
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="L">Laki - Laki</option>
                                        <option value="P">Perempuan</option>
                                    </select>
                                    <i
                                        class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Tanggal Lahir</label>
                                <div class="form-group position-relative">
                                    <input type="date" class="form-control text-dark ps-5" placeholder="082154488769"
                                        name="tanggal_lahir"
                                        value="{{ old('tanggal_lahir', $user->biodata->tanggal_lahir) }}">
                                    <i
                                        class="ri-calendar-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Nomor Telpon <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5" placeholder="082154488769"
                                        name="nomor_telepon"
                                        value="{{ old('nomor_telepon', $user->biodata->nomor_telepon) }}" required>
                                    <i
                                        class="ri-phone-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Email <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <input type="email" class="form-control text-dark ps-5" placeholder="Masukan Email"
                                        name="email" value="{{ old('email', $user->email) }}" required>
                                    <i
                                        class="ri-mail-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Username <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <input type="text" class="form-control text-dark ps-5"
                                        placeholder="Masukan Username" name="username"
                                        value="{{ old('username', $user->username) }}" required>
                                    <i
                                        class="ri-user-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">

                            <div class="form-group mb-4">
                                <label class="label">Password</label>
                                <div class="form-group">
                                    <div class="password-wrapper position-relative">
                                        <input type="password" id="password" class="form-control text-dark ps-5"
                                            name="password" placeholder="Masukan Password"
                                            value="{{ old('password') }}">
                                        <i style="color: #A9A9C8; font-size: 16px; right: 15px !important;"
                                            class="ri-eye-off-line password-toggle-icon translate-middle-y top-50 end-0 position-absolute"
                                            aria-hidden="true"></i>
                                        <i
                                            class="ri-lock-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-6">
                            <div class="form-group mb-4">
                                <label class="label">Level User <span class="text-danger">*</span></label>
                                <div class="form-group position-relative">
                                    <select name="role" class="form-select form-control ps-5 text-dark"
                                        style="width: 100%;" required>
                                        <option value="{{ $user->role->role_level }}" class="text-dark">{{
                                            $user->role->role_name ?? 'Pilih Level' }}
                                        </option>
                                        @foreach ($dataRole->where('role_level', '!=', $user->role->role_level) as $role)
                                        <option value="{{ $role->role_level }}" class="text-dark">{{ $role->role_name }}
                                        </option>
                                        @endforeach
                                    </select>
                                    <i
                                        class="ri-user-follow-line position-absolute top-50 start-0 translate-middle-y fs-20 text-gray-light ps-20"></i>
                                </div>
                            </div>
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