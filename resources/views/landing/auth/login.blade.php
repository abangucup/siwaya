<div class="modal fade modal-login" id="login" tabindex="-1" aria-labelledby="loginLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 id="loginLabel">Log In</h4>
                <button type="button" class="btn-modal-close" data-bs-dismiss="modal" aria-label="Close">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M12 21C16.9706 21 21 16.9706 21 12C21 7.02944 16.9706 3 12 3C7.02944 3 3 7.02944 3 12C3 16.9706 7.02944 21 12 21Z"
                            stroke="#1C4456" stroke-width="2.3" stroke-miterlimit="10"></path>
                        <path d="M15 9L9 15" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                        <path d="M15 15L9 9" stroke="#1C4456" stroke-width="2.3" stroke-linecap="round"
                            stroke-linejoin="round"></path>
                    </svg>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="modal-property-details-form">
                        <form class="contact-form-items row" method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="col-12">
                                @error('email_or_username')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ph-user"></i>
                                    </span>
                                    <input type="text" name="email_or_username" class="form-control"
                                        placeholder="user / email address" value="{{ old('email_or_username') }}">
                                </div>
                            </div>
                            <div class="col-12">
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="input-group">
                                    <span class="input-group-text">
                                        <i class="ph-keyhole"></i>
                                    </span>

                                    <input type="password" name="password" class="form-control" placeholder="Password"
                                        id="password" value="{{ old('password') }}">
                                    <span class="input-group-text px-3" onclick="showPassword()">
                                        <i class="ph ph-eye" id="eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="w-100 contact-form-button">
                                <button type="submit" class="btn btn-large d-block w-100">Log In</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>