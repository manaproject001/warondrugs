<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<!--HTML-->
<script src="https://balkan.app/js/OrgChart.js"></script>
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title"> Daftar Kasus </h3>
        <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Tables</a></li>
            <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
        </ol>
        </nav>
    </div>
    <div class="row">
        
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div id="tree"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    //JavaScript
var chart = new OrgChart(document.getElementById("tree"), {
   
    mode: 'dark',
    mouseScrool: OrgChart.none,
    nodeBinding: {
        field_0: "Employee Name",
        field_1: "Title",
        img_0: "Photo"
    },
    nodeMenu: {
        details: { text: "Details" },
        add: { text: "Add" },
        remove: { text: "Remove" }
    }
});


chart.load([
    { id: 1, "Employee Name": "Denny Curtis", Title: "CEO", Photo: "https://cdn.balkan.app/shared/2.jpg" },
    { id: 2, pid: 1, "Employee Name": "Ashley Barnett", Title: "Sales Manager", Photo: "https://cdn.balkan.app/shared/3.jpg" },
    { id: 3, pid: 1, "Employee Name": "Caden Ellison", Title: "Dev Manager", Photo: "https://cdn.balkan.app/shared/4.jpg" },
    { id: 4, pid: 2, "Employee Name": "Elliot Patel", Title: "Sales", Photo: "https://cdn.balkan.app/shared/5.jpg" },
    { id: 5, pid: 2, "Employee Name": "Lynn Hussain", Title: "Sales", Photo: "https://cdn.balkan.app/shared/6.jpg" },
    { id: 6, pid: 3, "Employee Name": "Tanner May", Title: "Developer", Photo: "https://cdn.balkan.app/shared/7.jpg" },
    { id: 7, pid: 3, "Employee Name": "Fran Parsons", Title: "Developer", Photo: "https://cdn.balkan.app/shared/8.jpg" }
]);

</script>
<?= $this->endSection() ?>