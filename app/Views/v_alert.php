<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<?php
    if(session()->getFlashData('success')){
?>
<script>
    swal({
        type:"success",
        text: "<?=session()->getFlashData('success')?>",
        title: "Sukses"
    })
    // alert("Sukses")
</script>
<?php } ?>

<?php
    if(session()->getFlashData('error')){
?>
<script>
    swal({
        type:"error",
        text: "<?=session()->getFlashData('error')?>",
        title: "Gagal Login"
    })
    // alert("Sukses")
</script>
<?php } ?>
