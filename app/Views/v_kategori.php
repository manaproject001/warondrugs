<!DOCTYPE html>
<html>
<head>
    <title>Select berhubungan dengan codeigniter dan ajax</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <br/>
    <div class="col-md-6 col-md-offset-3">
        <div class="thumbnail">
            <h4><center>Membuat Select berhubungan dengan codeigiter</center></h4><hr/>
            <form class="form-horizontal">
                <div class="form-group">
                    <label class="control-label col-md-3">profil</label>
                    <div class="col-md-8">
                        <select name="profil" id="profil" class="form-control" onchange="show()">
                            <option value="0">-PILIH-</option>
                            <option value="Pengguna">Pengguna</option>
                            <option value="Kurir">Kurir</option>
                            <option value="Bandar">Bandar</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Kategori</label>
                    <div class="col-md-8">
                        <select name="kategori" id="kategori" class="form-control" disabled>
                            <option value="0">-PILIH-</option>
                            <?php foreach($data as $row):?>
                                <option value="<?php echo $row['id_kasus'];?>"><?php echo $row['kasus'];?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Sub Kategori</label>
                    <div class="col-md-8">
                        <select name="subkategori" class="atasan form-control">
                            <option value="0">-PILIH-</option>
                        </select>
                    </div>
                </div>
                
            </form>
            <hr/>
            <p style="text-align: center;">Powered by <a href="">mfikri.com</a></p>
        </div>
    </div>
    <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    function show(){
        document.getElementById("kategori").disabled = false;
    }
</script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#kategori').change(function(){
            var id=$(this).val();
            var profil=$('#profil option:selected').val();
            console.log(profil);
            $.ajax({
                url : "<?php echo base_url();?>/index.php/kategori/get_kasus",
                method : "POST",
                data : {id: id, profil: profil},
                async : false,
                dataType : 'json',
                success: function(data){
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<option value='+data[i].id_pelaku+'>'+data[i].nama+'-'+data[i].profil+'-'+data[i].kasus+'</option>';
                    }
                    $('.atasan').html(html);
                     
                }
            });
        });
    });
</script>
</body>
</html>