<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
<div style="padding-top:30px;background-color:none;margin-left:1px;height:${d.height}px;border-radius:2px;overflow:visible">
                    <div style="height:${d.height - 32}px;padding-top:0px;background-color:white;border:1px solid lightgray;">
                        <img src=" ${d.data.imageUrl}" style="margin-top:-30px;margin-left:${d.width / 2 - 30}px;border-radius:100px;width:60px;height:60px;" />
                        <div style="margin-right:10px;margin-top:15px;float:right">${d.data.id}</div>
                        <div style="margin-top:-30px;background-color:#3AB653;height:10px;width:${ d.width - 2}px;border-radius:1px"></div>
                        <div style="padding:20px; padding-top:35px;text-align:center">
                            <div style="color:#111672;font-size:16px;font-weight:bold"> ${d.data.name} </div>
                            <div style="color:#3AB653;font-size:16px;margin-top:4px"> ${d.data.positionName} </div>
                        </div> 
                        <div style="display:flex;justify-content:space-between;padding-left:15px;padding-right:15px;">
                            <div> <p style="color:red">Narkoba:</p>  ${d.data.narkoba} </div>  <br>
                            <div> <p style="color:red">berat:</p> ${d.data.berat} </div>    
                        </div>
                    </div>     
                </div>
<?= $this->endSection() ?>
