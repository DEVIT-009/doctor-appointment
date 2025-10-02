<div class="content">
    <div class="row">
    <div class="col-sm-4 col-3">
        <h4 class="page-title">Doctors</h4>
    </div>
    <div class="col-sm-8 col-9 text-right m-b-20">
        <a
            href="index.php?page=default&add_doctor"
            class="btn btn-primary btn-rounded float-right"
            >
            <i class="fa fa-plus"></i> Add Doctor
        </a>
    </div>
    </div>
    <div class="row doctor-grid">
        <!-- Card -->
        <?php include "src/components/card_doctor.php" ?>
    </div>
    <div class="row">
    <div class="col-sm-12">
        <div class="see-all">
            <a class="see-all-btn" href="javascript:void(0);">Load More</a>
        </div>
    </div>
    </div>
</div>


<script>

function confirmDelete(doctorId, doctorName) {
    if (confirm('Are you sure you want to delete doctor: ' + doctorName + '?')) {
        // Direct URL approach - much simpler
        window.location.href = 'index.php?page=default&delete_doctor&doctor_id=' + doctorId;
    }
}
</script>