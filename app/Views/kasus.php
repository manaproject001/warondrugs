<?= $this->extend('layout/admin_layout') ?>
<?= $this->section('content') ?>
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
                    <h4 class="card-title">Hoverable Table</h4>
                    <div class="chart-container" style=" background-color: #0c1016"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
      var chart;
      d3.csv(
        '<?php echo base_url('data/data.csv')?>'
      ).then((dataFlattened) => {
        chart = new d3.OrgChart()
          .container('.chart-container')
          .data(dataFlattened)
          .rootMargin(100)
          .nodeWidth((d) => 210)
          .nodeHeight((d) => 140)
          .childrenMargin((d) => 130)
          .compactMarginBetween((d) => 75)
          .compactMarginPair((d) => 80)
          .linkUpdate(function (d, i, arr) {
            d3.select(this)
              .attr('stroke', (d) =>
                d.data._upToTheRootHighlighted ? '#152785' : 'lightgray'
              )
              .attr('stroke-width', (d) =>
                d.data._upToTheRootHighlighted ? 5 : 1.5
              )
              .attr('stroke-dasharray', '4,4');

            if (d.data._upToTheRootHighlighted) {
              d3.select(this).raise();
            }
          })
          .nodeContent(function (d, i, arr, state) {
            const colors = [
              '#336B33',
              '#18A8B6',
              '#F45754',
              '#96C62C',
              '#BD7E16',
              '#802F74',
            ];
            const color = colors[d.depth % colors.length];
            const imageDim = 80;
            const lightCircleDim = 95;
            const outsideCircleDim = 110;

            return `
                <div style="background-color:#373948; border-color:#fff; position:absolute;width:${
                  d.width
                }px;height:${d.height}px; border-radius:10px;" >
                   <div style="background-color:${color};position:absolute;margin-top:-${outsideCircleDim / 2}px;margin-left:${d.width / 2 - outsideCircleDim / 2}px;border-radius:100px;width:${outsideCircleDim}px;height:${outsideCircleDim}px;"></div>
                   <div style="background-color:#191c24;position:absolute;margin-top:-${
                     lightCircleDim / 2
                   }px;margin-left:${d.width / 2 - lightCircleDim / 2}px;border-radius:100px;width:${lightCircleDim}px;height:${lightCircleDim}px;"></div>
                   <img src=" ${
                     d.data.imageUrl
                   }" style="position:absolute;margin-top:-${imageDim / 2}px;margin-left:${d.width / 2 - imageDim / 2}px;border-radius:100px;width:${imageDim}px;height:${imageDim}px;" />
                   <div class="card" style="top:${
                     outsideCircleDim / 2 + 10
                   }px;position:absolute;height:30px;width:${d.width}px;">
                      <div style="background-color:${color};height:28px;text-align:center;color:#ffffff;font-weight:bold;font-size:16px">
                          ${d.data.name} 
                      </div>
                      <div style="background-color:#F0EDEF;height:28px;text-align:center;color:#424142;font-size:16px">
                          ${d.data.positionName} 
                      </div>
                   </div>
               </div>
  `;
          })
          .render();
      });
</script>

  
<?= $this->endSection() ?>