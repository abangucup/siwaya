<div class="modal fade modal-otp" id="otp" tabindex="-1" aria-labelledby="loginLabel3" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 id="loginLabel3">Enter OTP</h4>
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
                    <div class="modal-property-details-form text-center">
                        <p>Please check your mail, We sent an OTP code</p>
                        <form class="contact-form-items row justify-content-center">
                            <div class="col-2">
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="col-2">
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                            <div class="w-100 contact-form-button">
                                <button type="submit" class="btn btn-large d-block w-100 mt-3"
                                    data-bs-target="#newPassword" data-bs-toggle="modal"
                                    data-bs-dismiss="modal">Confirm</button>
                            </div>
                            <div class="w-100 contact-form-button">
                                <button type="submit" class="btn btn-large btn-outline d-block w-100  mt-3"
                                    data-bs-target="#resetPassword" data-bs-toggle="modal" data-bs-dismiss="modal">
                                    <span> Request OTP again </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-center justify-content-center">
                <p class="bold">Remeber The Password? <a href="index.html#login" data-bs-toggle="modal"
                        data-bs-dismiss="modal">login</a> </p>
            </div>
        </div>
    </div>
</div>