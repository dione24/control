 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="nk-block-between">
                     <div class="nk-block-head-content">
                         <h3 class="nk-block-title page-title">Tableau de Bord </h3>
                         <div class="nk-block-des text-soft">
                             <p>Groupe</p>
                         </div>
                     </div><!-- .nk-block-head-content -->
                     <div class="nk-block-head-content">
                         <div class="toggle-wrap nk-block-tools-toggle">
                             <a href="#" class="btn btn-icon btn-trigger toggle-expand me-n1" data-target="pageMenu"><em
                                     class="icon ni ni-more-v"></em></a>

                             <form method="POST">
                                 <div class="toggle-expand-content" data-content="pageMenu">
                                     <ul class="nk-block-tools g-3">
                                         <li>
                                             <div class="form-group">
                                                 <select class="form-control" name="month">
                                                     <option value="">Mois...</option>
                                                     <?php foreach ($mois as $value) { ?>
                                                     <option value="<?= $value['RefMois'] ?>"
                                                         <?php if ($value['RefMois'] == $month) { ?> selected
                                                         <?php } ?>>
                                                         <?= $value['Mois'] ?> </option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="form-group">
                                                 <select class="form-control" name="year">
                                                     <option value="">Année...</option>
                                                     <option value="2020" <?php if ($year == '2020') { ?> selected
                                                         <?php } ?>>2020</option>
                                                     <option value="2021" <?php if ($year == '2021') { ?> selected
                                                         <?php } ?>>2021</option>
                                                     <option value="2022" <?php if ($year == '2022') { ?> selected
                                                         <?php } ?>>2022</option>

                                                 </select>
                                             </div>
                                             <?php if ($_SESSION['Statut'] != 'user') { ?>
                                         <li>
                                             <div class="dropdown">
                                                 <select class="form-control" name="RefPole">
                                                     <option value="">Pole</option>
                                                     <?php foreach ($poles as $pole) { ?>
                                                     <option value="<?= $pole['RefPole']; ?>"
                                                         <?php if (isset($pool) && $pole['RefPole'] == $pool) { ?>
                                                         selected <?php  } ?>>
                                                         <?= $pole['nomPole']; ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                         </li>
                                         <li>
                                             <div class="dropdown">
                                                 <select class="form-control" name="RefEntreprise">
                                                     <option value="">Entreprise</option>
                                                     <?php foreach ($entreprises as $key => $entreprise) { ?>
                                                     <option value="<?= $entreprise['RefEntreprise']; ?>"
                                                         <?php if (isset($entreprise) && $entreprise['RefEntreprise'] == $entreprise) { ?>
                                                         selected <?php } ?>>
                                                         <?= $entreprise['nomEntreprise']; ?></option>
                                                     <?php } ?>
                                                 </select>
                                             </div>
                                         </li>
                                         <?php } ?>

                                         <li class="nk-block-tools-opt"><button type="submit"
                                                 class="btn btn-primary"><em
                                                     class="icon ni ni-search"></em><span></span></button>
                                         </li>

                                     </ul>
                                 </div>
                             </form>
                         </div>
                     </div><!-- .nk-block-head-content -->
                 </div><!-- .nk-block-between -->
             </div><!-- .nk-block-head -->
             <div class="nk-block">
                 <div class="row g-gs">
                     <div class="col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title"><span class="me-2">KPIs</span>
                                     </div>

                                 </div>
                             </div>
                             <div class="card-inner p-1 border-top">
                                 <table class="datatable-init-export nowrap table" data-export-title="Export">
                                     <thead>
                                         <tr>
                                             <th>KPI</th>
                                             <th>Intitulés</th>
                                             <th>Mois en cours</th>
                                             <th>Mois N-1</th>
                                             <th>Mois précédent</th>
                                             <th>Mois Prévisions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($dash as $rapport) { ?>
                                         <tr>
                                             <td><?= $rapport['nomRapport']; ?></td>
                                             <td>
                                                 <ul>
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <li>
                                                         <?= $intitule['nomElement']; ?>
                                                     </li>
                                                     <?php } ?>

                                                 </ul>
                                             </td>
                                             <td>
                                                 <ul>
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <li>
                                                         <?= $intitule['moisencours']; ?>
                                                     </li>
                                                     <?php } ?>
                                                 </ul>
                                             </td>
                                             <td>
                                                 <ul>
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <li>
                                                         <?= $intitule['moisn1']; ?>
                                                     </li>
                                                     <?php } ?>
                                                 </ul>
                                             </td>
                                             <td>
                                                 <ul>
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <li>
                                                         <?= $intitule['moisprecedent']; ?>
                                                     </li>
                                                     <?php } ?>
                                                 </ul>
                                             </td>
                                             <td>
                                                 <ul>
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <li>
                                                         <?= $intitule['previsions']; ?>
                                                     </li>
                                                     <?php } ?>
                                                 </ul>
                                             </td>

                                         </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>

                         </div><!-- .card -->
                     </div>
                     <div class="nk-block nk-block-lg">
                         <div class="nk-block-head">
                             <div class="nk-block-head-content">
                                 <h4 class="nk-block-title">KPI FINANCIER </h4>
                                 <div class="nk-block-des">
                                     <p>A bar chart provides a way of comparison of multiple data sets side by side or
                                         with stacked view.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-gs">
                             <div class="col-md-6">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head">
                                             <h6 class="title">CA</h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="bar-chart chartjs-render-monitor" id="barChartMultiple"
                                                 width="848" height="360"
                                                 style="display: block; width: 424px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                             <div class="col-md-6">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head">
                                             <h6 class="title">RESULTAT NET</h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="bar-chart chartjs-render-monitor" id="barChartStacked"
                                                 width="848" height="360"
                                                 style="display: block; width: 424px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                         </div>
                     </div>

                     <div class="nk-block nk-block-lg">
                         <div class="nk-block-head">
                             <div class="nk-block-head-content">
                                 <h4 class="nk-block-title">PARTICIPATION /POOL </h4>
                                 <div class="nk-block-des">
                                     <p>Pie and doughnut charts are probably the most commonly used charts. It use to
                                         show relational proportions between data.</p>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-gs">
                             <div class="col-md-4">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head text-center">
                                             <h6 class="title">CA </h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="pie-chart chartjs-render-monitor" id="pieChartData"
                                                 width="518" height="360"
                                                 style="display: block; width: 259px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                             <div class="col-md-4">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head text-center">
                                             <h6 class="title">RESULTAT NET</h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="doughnut-chart chartjs-render-monitor"
                                                 id="doughnutChartData" width="518" height="360"
                                                 style="display: block; width: 259px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                             <div class="col-md-4">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head text-center">
                                             <h6 class="title">Polar Chart</h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="polar-chart chartjs-render-monitor" id="polarChartData"
                                                 width="518" height="360"
                                                 style="display: block; width: 259px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                         </div>
                     </div>



                     <div class="nk-block nk-block-lg">
                         <div class="nk-block-head">
                             <div class="nk-block-head-content">
                                 <h4 class="nk-block-title">NIVEAU DE PROGRESSION </h4>
                                 <div class="nk-block-des">
                                     <p>Alternetly, you can use line chart with some background to display more visualy.
                                     </p>
                                 </div>
                             </div>
                         </div>
                         <div class="row g-gs">
                             <div class="col-md-6">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head">
                                             <h6 class="title">Rounded Chart</h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="line-chart chartjs-render-monitor" id="filledLineChart"
                                                 width="848" height="360"
                                                 style="display: block; width: 424px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                             <div class="col-md-6">
                                 <div class="card card-bordered card-preview">
                                     <div class="card-inner">
                                         <div class="card-head">
                                             <h6 class="title">Straight Chart</h6>
                                         </div>
                                         <div class="nk-ck-sm">
                                             <div class="chartjs-size-monitor">
                                                 <div class="chartjs-size-monitor-expand">
                                                     <div class=""></div>
                                                 </div>
                                                 <div class="chartjs-size-monitor-shrink">
                                                     <div class=""></div>
                                                 </div>
                                             </div>
                                             <canvas class="line-chart chartjs-render-monitor" id="straightLineChart"
                                                 width="848" height="360"
                                                 style="display: block; width: 424px; height: 180px;"></canvas>
                                         </div>
                                     </div>
                                 </div><!-- .card-preview -->
                             </div>
                         </div>
                     </div>




                     <div class="col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title"><span class="me-2">KPIs</span>
                                     </div>

                                 </div>
                             </div>
                             <div class="card-inner p-0 border-top">
                                 <div class="nk-tb-list nk-tb-orders">
                                     <div class="nk-tb-item nk-tb-head">
                                         <div class="nk-tb-col"><span>Entreprise</span></div>
                                         <div class="nk-tb-col"><span>Nom</span></div>
                                         <div class="nk-tb-col"><span>Element</span></div>
                                         <div class="nk-tb-col tb-col-sm"><span>Mois en cours</span></div>
                                         <div class="nk-tb-col tb-col-md"><span>Mois N-1</span></div>
                                         <div class="nk-tb-col tb-col-lg"><span>Mois Precedent</span></div>
                                         <div class="nk-tb-col"><span>Previsions</span></div>
                                     </div>

                                     <?php foreach ($kpis as $kpi) { ?>

                                     <div class="nk-tb-item">
                                         <div class="nk-tb-col">
                                             <span class="tb-lead"><?= $kpi['nomEntreprise']; ?></span>
                                         </div>

                                         <div class="nk-tb-col">
                                             <span class="tb-lead"><?= $kpi['nomRapport']; ?></span>
                                         </div>


                                         <div class="nk-tb-col">
                                             <span class="tb-lead"><?= $kpi['Smoisencours']; ?></span>
                                         </div>
                                         <div class="nk-tb-col tb-col-md">
                                             <span class="tb-lead"><?= $kpi['Smoisn1']; ?></span>
                                         </div>
                                         <div class="nk-tb-col tb-col-lg">
                                             <span class="tb-lead "><?= $kpi['Smoisprecedent']; ?></span>
                                         </div>
                                         <div class="nk-tb-col">
                                             <span class="tb-lead "><?= $kpi['Sprevisions']; ?></span>
                                         </div>

                                     </div>
                                     <?php } ?>

                                 </div>
                             </div>

                         </div><!-- .card -->
                     </div><!-- .col -->
                     <div class="col-md-12 col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner border-bottom">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title">COMMENTAIRES</h6>
                                     </div>
                                     <div class="card-tools">
                                     </div>
                                 </div>
                             </div>
                             <canvas id="myChart" width="400" height="100"></canvas>
                             <script>
                             const ctx = document.getElementById('myChart');
                             const myChart = new Chart(ctx, {
                                 type: 'bar',
                                 data: {
                                     labels: [
                                         <?php foreach ($kpis as $kpi) { ?> '<?= $kpi['nomEntreprise']; ?>',
                                         <?php } ?>
                                     ],
                                     datasets: [
                                         <?php foreach ($charts as $key => $chart) { ?> {
                                             label: '<?= $chart['nomElement']; ?>',
                                             data: [12, 19, 3, 5, 2, 3],
                                             backgroundColor: [
                                                 'rgba(255, 99, 132, 0.2)',
                                                 'rgba(54, 162, 235, 0.2)',
                                                 'rgba(255, 206, 86, 0.2)',
                                                 'rgba(75, 192, 192, 0.2)',
                                                 'rgba(153, 102, 255, 0.2)',
                                                 'rgba(255, 159, 64, 0.2)'
                                             ],
                                             borderWidth: 1
                                         },
                                         <?php } ?>
                                     ]
                                 },
                                 options: {
                                     scales: {
                                         y: {
                                             beginAtZero: true
                                         }
                                     }
                                 }
                             });
                             </script>

                         </div><!-- .card -->
                     </div><!-- .col -->




                     <div class="col-md-12 col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner border-bottom">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title">COMMENTAIRES</h6>
                                     </div>
                                     <div class="card-tools">
                                     </div>
                                 </div>
                             </div>
                             <ul class="nk-activity">
                                 <li class="nk-activity-item">
                                     <div class="nk-activity-media user-avatar bg-success"><img
                                             src="/images/avatar/c-sm.jpg" alt=""></div>
                                     <div class="nk-activity-data">
                                         <div class="label">Keith Jensen requested to Widthdrawl.
                                         </div>
                                         <span class="time">2 hours ago</span>
                                     </div>
                                 </li>

                             </ul>
                         </div><!-- .card -->
                     </div><!-- .col -->


                 </div><!-- .row -->
             </div><!-- .nk-block -->
         </div>
     </div>
 </div>