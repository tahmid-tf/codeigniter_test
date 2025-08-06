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


    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo base_url('css/style.css')?>"/>
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
    <button class="btn btn-success">
        Click to add yourself in blood donor list to view all donors
    </button>
    <button class="btn btn-primary">
        Login to view & update my information!
    </button>

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
            <select id="filter-group" class="form-select select2" data-placeholder="Filter Group">
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

        <!-- Filter District -->
        <div class="col-md-3 col-sm-12">
            <select id="filter-district" class="form-select select2" data-placeholder="Filter District">
                <option></option>
                <option>Dhaka</option>
                <option>Chattogram</option>
                <option>Rajshahi</option>
                <option>Khulna</option>
            </select>
        </div>

        <!-- Filter Upazila -->
        <div class="col-md-3 col-sm-12">
            <select id="filter-upazila" class="form-select select2" data-placeholder="Choose a district first!">
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
            <th>Location</th>
            <th>Last Donation</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1</td>
            <td>01828665566</td>
            <td>Tahmid</td>
            <td>B+</td>
            <td>Dhanmondi</td>
            <td>Today</td>
        </tr>
        <tr>
            <td>2</td>
            <td>01515668259</td>
            <td>Ferdous</td>
            <td>B+</td>
            <td>Dhanmondi</td>
            <td>6m 6days ago</td>
        </tr>
        <tr>
            <td>3</td>
            <td>01515668200</td>
            <td>Niloy</td>
            <td>O+</td>
            <td>Dhanmondi</td>
            <td>1y 3m 21d ago</td>
        </tr>
        </tbody>
    </table>
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

        // Initialize DataTable
        new DataTable('#example');
    });
</script>
</body>
</html>
