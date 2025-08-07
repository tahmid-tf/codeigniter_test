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
    <a href="https://ourcomunity.org/">Join our mission today</a>
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

        <!-- Filter Thana -->
        <div class="col-md-3 col-sm-12">
            <!--            <select id="filter-upazila" class="form-select select2" data-placeholder="Filter Thana!">-->
            <!--                <option></option>-->
            <!--                <option>Mirpur</option>-->
            <!--                <option>Gulshan</option>-->
            <!--                <option>Savar</option>-->
            <!--            </select>-->

            <select id="filter-upazila" class="form-select select2" data-placeholder="Filter Thana!"></select>

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
                                <?php foreach ($blood_groups as $group): ?>
                                    <option value="<?= esc($group['blood_group']) ?>"
                                            <?= esc(session('blood_group')) == $group['blood_group'] ? 'selected="selected"' : '' ?>>
                                        <?= esc($group['blood_group']) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>


                        </div>
                        <div class="col-md-12">
                            <label class="form-label">District <span class="text-danger">*</span></label>

                            <select name="district" class="form-select">
                                <?php foreach ($districts as $district): ?>
                                    <option value="<?= esc($district['district']) ?>"><?= esc($district['district']) ?></option>
                                <?php endforeach; ?>
                            </select>


                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Thana <span class="text-danger">*</span></label>
                            <select name="thana" class="form-select">
                                <?php foreach ($thanas as $thana): ?>
                                    <option value="<?= esc($thana['thana']) ?>"><?= esc($thana['thana']) ?></option>
                                <?php endforeach; ?>
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
        // Non-AJAX select2 initialization (optional)
        $('.select2:not(#filter-upazila):not(#filter-district):not(#filter-group)').select2({
            allowClear: true,
            placeholder: function () {
                return $(this).data('placeholder');
            }
        });

        // AJAX-based select2: Blood Group
        $('#filter-group').select2({
            placeholder: 'Filter Blood Group',
            allowClear: true,
            ajax: {
                url: '/blood_group_api_data',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (group) {
                            return {
                                id: group.blood_group,
                                text: group.blood_group
                            };
                        })
                    };
                },
                cache: true
            }
        });

        // AJAX-based select2: District
        $('#filter-district').select2({
            placeholder: 'Filter District',
            allowClear: true,
            ajax: {
                url: '/districts_api_data',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (district) {
                            return {
                                id: district.district,
                                text: district.district
                            };
                        })
                    };
                },
                cache: true
            }
        });

        // AJAX-based select2: Thana/Upazila
        // $('#filter-upazila').select2({
        //     placeholder: 'Filter Thana!',
        //     allowClear: true,
        //     ajax: {
        //         url: '/index.php/thana_api_data',
        //         dataType: 'json',
        //         delay: 250,
        //         data: function (params) {
        //             return {
        //                 q: params.term
        //             };
        //         },
        //         processResults: function (data) {
        //             return {
        //                 results: $.map(data.data, function (thana) {
        //                     return {
        //                         id: thana.thana,
        //                         text: thana.thana
        //                     };
        //                 })
        //             };
        //         },
        //         cache: true
        //     }
        // });


        $('#filter-district').on('change', function () {
            $('#filter-upazila').val(null).trigger('change'); // clear upazila when district changes
        });

        // AJAX-based select2: Thana/Upazila dependent on selected district
        $('#filter-upazila').select2({
            placeholder: 'Filter Thana!',
            allowClear: true,
            ajax: {
                url: '/thana_by_district_api_data',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term,
                        district: $('#filter-district').val() // send selected district
                    };
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (thana) {
                            return {
                                id: thana.thana,
                                text: thana.thana
                            };
                        })
                    };
                },
                cache: true
            }
        });



        // Initialize DataTable
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

        // Reload table when filters change
        function reloadTableWithFilters() {
            let blood_group = $('#filter-group').val();
            let district = $('#filter-district').val();
            let thana = $('#filter-upazila').val();
            let date_filter = $('#filter-date').val();

            table.ajax.url(
                '/user_data?group=' + encodeURIComponent(blood_group || '') +
                '&district=' + encodeURIComponent(district || '') +
                '&thana=' + encodeURIComponent(thana || '') +
                '&date=' + encodeURIComponent(date_filter || '')
            ).load();
        }

        // Trigger filter
        $('#filter-group, #filter-district, #filter-upazila, #filter-date').on('change', reloadTableWithFilters);
    });

    // ------------------ get district and data dynamically for modals

    $(document).ready(function () {
        $('#update-district').on('change', function () {
            var districtId = $(this).val();

            $('#update-thana').html('<option value="">Loading...</option>');

            if (districtId) {
                $.ajax({
                    url: '/get-thanas-by-district',
                    type: 'GET',
                    data: { district_id: districtId },
                    dataType: 'json',
                    success: function (response) {
                        $('#update-thana').empty().append('<option value="">Select Thana</option>');
                        $.each(response.data, function (index, thana) {
                            $('#update-thana').append('<option value="' + thana.id + '">' + thana.thana + '</option>');
                        });
                    }
                });
            } else {
                $('#update-thana').html('<option value="">Select Thana</option>');
            }
        });
    });

</script>


</body>
</html>
