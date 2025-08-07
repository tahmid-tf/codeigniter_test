<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Blood Donation Community</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.css"/>

    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
            integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>


    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css') ?>"/>
</head>
<body>

<!-- ----------------- Community Info ----------------- -->
<div class="container text-center my-4">
    <h3 class="blood_group_heading">Our Community</h3>
    <p class="blood_group_p">Let's start together</p>
    <a class="btn btn-info mt-2" href="https://ourcomunity.org/" target="_blank">
        Click to view our community Whatsapp groups and become a beneficial member!
    </a>
</div>

<!-- ----------------- Blood Donation Welfare ----------------- -->
<div class="container text-center my-4">
    <p class="h5 blood_donation_welfare_title">Blood Donation Welfare Bangladesh</p>
</div>

<!-- ----------------- Mission Statement ----------------- -->
<div class="container text-center my-4">
  <span>
    Connecting blood donors across Bangladesh to save lives! -
    <a href="#">Join our mission today</a>
  </span>
</div>

<!-- ----------------- Call-to-Action Buttons ----------------- -->
<div class="container text-center my-4">

    <?php if (!session()->get('logged_in')): ?>

        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#registrationModal">
            Click to add yourself in blood donor list to view all donors
        </button>

        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#LoginModal">
            Login to view & update my information!
        </button>

    <?php else: ?>

        <div style="display: flex; justify-content: center">
            <button class="btn btn-info" style="color: white" data-bs-toggle="modal" data-bs-target="#UpdateModal">
                Click to update my information
            </button>

            <form action="<?= base_url('logout') ?>" method="get" style="margin-left: 10px">
                <button class="btn btn-danger" style="color: white" type="submit">
                    Logout
                </button>
            </form>
        </div>


    <?php endif; ?>


    <br><br>
    <p class="blood_group_p">You don't have to be a doctor to save lives!</p>
    <p class="blood_group_p text-danger fw-bold">Just Donate Blood!</p>
    <p class="blood_group_p">It's safe, It's simple, And it saves lives.</p>
    <p class="blood_group_p text-danger fw-bold">Never refuse to donate blood if you can, as you may be the next
        needy</p>
</div>

<!-- ----------------- Filter Dropdowns ----------------- -->
<div class="container my-4">
    <div class="row g-3">
        <!-- Filter Group -->
        <div class="col-md-3 col-sm-12">
<!--            <select id="filter-group" class="form-select select2" data-placeholder="Filter Group">-->
<!--                <option></option>-->
<!--                <option>A+</option>-->
<!--                <option>A-</option>-->
<!--                <option>B+</option>-->
<!--                <option>B-</option>-->
<!--                <option>AB+</option>-->
<!--                <option>AB-</option>-->
<!--                <option>O+</option>-->
<!--                <option>O-</option>-->
<!--            </select>-->


            <select id="filter-group" class="form-select select2" data-placeholder="Filter Group">
                <option></option>
            </select>


        </div>

        <!-- -------------- Filter District -------------- -->


        <div class="col-md-3 col-sm-12">
<!--            <select id="filter-district" class="form-select select2" data-placeholder="Filter District">-->
<!--                <option></option>-->
<!--                <option>Dhaka</option>-->
<!--                <option>Chattogram</option>-->
<!--                <option>Rajshahi</option>-->
<!--                <option>Khulna</option>-->
<!--            </select>-->

            <select id="filter-district" class="form-select select2" data-placeholder="Filter District"></select>


        </div>

        <!-- Filter Upazila -->
        <div class="col-md-3 col-sm-12">
            <select id="filter-upazila" class="form-select select2" data-placeholder="Filter Thana!">
                <option></option>
                <option>Mirpur</option>
                <option>Gulshan</option>
                <option>Savar</option>
            </select>
        </div>

        <!-- Donation Date -->
        <div class="col-md-3 col-sm-12">
            <select id="filter-date" class="form-select select2" data-placeholder="Donation date">
                <option></option>
                <option>Last 7 days</option>
                <option>Last 30 days</option>
                <option>3 months ago</option>
                <option>6+ months ago</option>
            </select>
        </div>
    </div>
</div>

<!-- ----------------- DataTable Example ----------------- -->
<div class="container my-4">
    <table id="example" class="display" style="width:100%">
        <thead>
        <tr>
            <th>ID</th>
            <th>Phone</th>
            <th>Name</th>
            <th>Group</th>
            <th>District</th>
            <th>Thana</th>
            <th>Last Donation</th>
        </tr>
        </thead>
        <tbody>
        <!-- ----------------------- data will render here ----------------------- -->
        </tbody>
    </table>
</div>


<!-- ---------------------- registration modal ---------------------- -->

<div class="modal fade" id="registrationModal" tabindex="-1" aria-labelledby="registrationModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="registrationForm" action="<?= base_url('register') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="registrationModalLabel">Register Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required name="name">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" required name="contact">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                            <select class="form-select" name="blood_group">
                                <option></option>
                                <option>A+</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B-</option>
                                <option>AB+</option>
                                <option>AB-</option>
                                <option>O+</option>
                                <option>O-</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <select class="form-select" required name="district">
                                <option></option>
                                <option>Dhaka</option>
                                <option>Chattogram</option>
                                <option>Rajshahi</option>
                                <option>Khulna</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Thana <span class="text-danger">*</span></label>
                            <select class="form-select" required name="thana">
                                <option></option>
                                <option>Mirpur</option>
                                <option>Gulshan</option>
                                <option>Savar</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Last Donation Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required name="donation_date">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" required name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ---------------------- Update modal ---------------------- -->

<div class="modal fade" id="UpdateModal" tabindex="-1" aria-labelledby="UpdateModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="updateForm" action="<?= base_url('update-user') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">

                            <input type="hidden" value="<?= esc(session('user_id')) ?>" name="id">

                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required name="name"
                                   value="<?= esc(session('name')) ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Contact Number <span class="text-danger">*</span></label>
                            <input type="tel" class="form-control" required name="contact"
                                   value="<?= esc(session('contact')) ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Blood Group <span class="text-danger">*</span></label>
                            <select class="form-select" name="blood_group">
                                <option></option>
                                <option value="A+" <?= esc(session('blood_group')) == 'A+' ? 'selected="selected"' : '' ?>>
                                    A+
                                </option>
                                <option value="A+" <?= esc(session('blood_group')) == 'A+' ? 'selected="selected"' : '' ?>>
                                    A+
                                </option>
                                <option value="A-" <?= esc(session('blood_group')) == 'A-' ? 'selected="selected"' : '' ?>>
                                    A-
                                </option>
                                <option value="B+" <?= esc(session('blood_group')) == 'B+' ? 'selected="selected"' : '' ?>>
                                    B+
                                </option>
                                <option value="B-" <?= esc(session('blood_group')) == 'B-' ? 'selected="selected"' : '' ?>>
                                    B-
                                </option>
                                <option value="AB+" <?= esc(session('blood_group')) == 'AB+' ? 'selected="selected"' : '' ?>>
                                    AB+
                                </option>
                                <option value="AB-" <?= esc(session('blood_group')) == 'AB-' ? 'selected="selected"' : '' ?>>
                                    AB-
                                </option>
                                <option value="O+" <?= esc(session('blood_group')) == 'O+' ? 'selected="selected"' : '' ?>>
                                    O+
                                </option>
                                <option value="O-" <?= esc(session('blood_group')) == 'O-' ? 'selected="selected"' : '' ?>>
                                    O-
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <select class="form-select" required name="district">
                                <option value="" <?= session('district') == '' ? 'selected="selected"' : '' ?>></option>
                                <option value="Dhaka" <?= session('district') == 'Dhaka' ? 'selected="selected"' : '' ?>>
                                    Dhaka
                                </option>
                                <option value="Chattogram" <?= session('district') == 'Chattogram' ? 'selected="selected"' : '' ?>>
                                    Chattogram
                                </option>
                                <option value="Rajshahi" <?= session('district') == 'Rajshahi' ? 'selected="selected"' : '' ?>>
                                    Rajshahi
                                </option>
                                <option value="Khulna" <?= session('district') == 'Khulna' ? 'selected="selected"' : '' ?>>
                                    Khulna
                                </option>
                            </select>

                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Thana <span class="text-danger">*</span></label>
                            <select class="form-select" required name="thana">
                                <option value="" <?= session('thana') == '' ? 'selected="selected"' : '' ?>></option>
                                <option value="Mirpur" <?= session('thana') == 'Mirpur' ? 'selected="selected"' : '' ?>>
                                    Mirpur
                                </option>
                                <option value="Gulshan" <?= session('thana') == 'Gulshan' ? 'selected="selected"' : '' ?>>
                                    Gulshan
                                </option>
                                <option value="Savar" <?= session('thana') == 'Savar' ? 'selected="selected"' : '' ?>>
                                    Savar
                                </option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Last Donation Date <span class="text-danger">*</span></label>
                            <input type="date" class="form-control" required name="donation_date"
                                   value="<?= esc(session('donation_date')) ?>">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- ---------------------- Login modal ---------------------- -->

<div class="modal fade" id="LoginModal" tabindex="-1" aria-labelledby="LoginModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <form id="registrationForm" action="<?= base_url('login') ?>" method="post">
                <div class="modal-header">
                    <h5 class="modal-title" id="LoginModalLabel">Login Information</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row g-3">
                        <div class="col-md-12">
                            <label class="form-label">Phone<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" required name="phone">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" required name="password">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- ----------------- Scripts Section ----------------- -->

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/2.3.2/js/dataTables.js"></script>

<!-- Initialization Scripts -->

<script>
    $(document).ready(function () {
        // Initialize all select2 filters
        $('.select2').select2({
            allowClear: true,
            placeholder: function () {
                return $(this).data('placeholder');
            }
        });

        // Initialize DataTable with AJAX
        let table = $('#example').DataTable({
            ajax: {
                url: '/user_data',
                dataSrc: 'data.users'
            },
            columns: [
                {data: 'id'},
                {data: 'contact'},
                {data: 'name'},
                {data: 'blood_group'},
                {data: 'district'},
                {data: 'thana'},
                {data: 'donation_date'}
            ]
        });


        // Reload DataTable with filters
        function reloadTableWithFilters() {
            let blood_group = $('#filter-group').val();
            let district = $('#filter-district').val();
            let thana = $('#filter-upazila').val();
            let date_filter = $('#filter-date').val();

            table.ajax.url(
                '/user_data?group=' + encodeURIComponent(blood_group) +
                '&district=' + encodeURIComponent(district) +
                '&thana=' + encodeURIComponent(thana) +
                '&date=' + encodeURIComponent(date_filter)
            ).load();
        }

        // Trigger filter
        $('#filter-group, #filter-district, #filter-upazila, #filter-date').on('change', function () {
            reloadTableWithFilters();
        });
    });
</script>



<!-- -------------------------------- Filter group, filter district, filter upazilla action test --------------------------------  -->

<!-- blood group portion -->
<script>
    $(document).ready(function () {
        $('#filter-group').select2({
            placeholder: $('#filter-group').data('placeholder'),
            allowClear: true,
            minimumInputLength: 1, // require at least 1 character before sending AJAX request
            ajax: {
                url: '/blood_group_api_data',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // search term sent as 'q'
                    };
                },
                processResults: function (data) {
                    return {
                        results: data.data.map(function (item) {
                            return {
                                id: item.blood_group,
                                text: item.blood_group
                            };
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>

<!-- --- district portion --- -->

<script>
    $(function () {
        // District select2 with AJAX
        $('#filter-district').select2({
            placeholder: 'Filter District',
            allowClear: true,
            ajax: {
                url: '/districts_api_data',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term // search query
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (district) {
                            return {
                                id: district.district,    // assuming the column name is `district`
                                text: district.district
                            };
                        })
                    };
                },
                cache: true
            }
        });
    });
</script>


</body>
</html>
