<div class="content">       
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Edit Doctor</h4>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form>
                <div class="row">
                    <!-- Doctor Name -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" required>
                        </div>
                    </div>
                    <!-- Phone -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone <span class="text-danger">*</span></label>
                            <input class="form-control" type="tel" required>
                        </div>
                    </div>
                    <!-- License Number -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>License Number <span class="text-danger">*</span></label>
                            <input class="form-control" type="number">
                        </div>
                    </div>
                    <!-- Email -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Email <span class="text-danger">*</span></label>
                            <input class="form-control" type="email">
                        </div>
                    </div>
                    <!-- Password -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Password <span class="text-danger">*</span></label>
                            <input class="form-control" type="password">
                        </div>
                    </div>
                    <!-- Confirm Password -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Confirm Password <span class="text-danger">*</span></label>
                            <input class="form-control" type="password">
                        </div>
                    </div>
                    <!-- Date of Birth -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth <span class="text-danger">*</span></label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker">
                            </div>
                        </div>
                    </div>
                    <!-- Gender -->
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender <span class="text-danger">*</span></label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" class="form-check-input">Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="gender" class="form-check-input">Female
                                </label>
                            </div>
                        </div>
                    </div>
                    <!-- Hospital -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Hospital Name <span class="text-danger">*</span></label>
                            <select class="form-control select">
                                <option>Royal Phnom Penh</option>
                                <option>Angkor Hospital</option>
                                <option>Battambang Referral</option>
                                <option>Kampot Medical</option>
                                <option>Takeo Provincial</option>
                            </select>
                        </div>
                    </div>
                    <!-- Service -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Service <span class="text-danger">*</span></label>
                            <select class="form-control select">
                                <option>Pediatrics</option>
                                <option>Cardiology</option>
                                <option>Orthopedics</option>
                                <option>Gynecology</option>
                                <option>General</option>
                            </select>
                        </div>
                    </div>
                    <!-- Nationality -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Nationality <span class="text-danger">*</span></label>
                            <select class="form-control select">
                                <option>Cambodian</option>
                                <option>Singapurean</option>
                                <option>Australian</option>
                                <option>British</option>
                                <option>American</option>
                            </select>
                        </div>
                    </div>
                    <!-- Address -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Address <span class="text-danger">*</span></label>
                            <select class="form-control select">
                                <option>Phnom Penh</option>
                                <option>Siem Reap</option>
                                <option>Battambang</option>
                                <option>Kampot</option>
                                <option>Takeo</option>
                            </select>
                        </div>
                    </div>
                    <!-- Address -->
                    <!-- <div class="col-sm-12">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label>Address <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Country</label>
                                    <select class="form-control select">
                                        <option>USA</option>
                                        <option>United Kingdom</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>City</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>State/Province</label>
                                    <select class="form-control select">
                                        <option>California</option>
                                        <option>Alaska</option>
                                        <option>Alabama</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-3">
                                <div class="form-group">
                                    <label>Postal Code</label>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <!-- Photo -->
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Avatar</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="assets/img/user.jpg">
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Biography -->
                <div class="form-group">
                    <label>Doctor Biography</label>
                    <textarea class="form-control" rows="3" cols="30"></textarea>
                </div>
                <!-- <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="doctor_active" value="option1" checked>
                        <label class="form-check-label" for="doctor_active">
                        Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="status" id="doctor_inactive" value="option2">
                        <label class="form-check-label" for="doctor_inactive">
                        Inactive
                        </label>
                    </div>
                </div> -->
                <div class="m-t-20 text-center">
                    <button class="btn btn-primary submit-btn">Create Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>