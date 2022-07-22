 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="nk-block-between">
                     <div class="nk-block-head-content">
                         <h3 class="nk-block-title page-title">Tableau de Bord </h3>
                         <div class="nk-block-des text-soft">
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
                                                         <?php if (isset($enterprise) && $entreprise['RefEntreprise'] == $enterprise) { ?>
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
                 </div><!-- .row -->
             </div><!-- .nk-block -->
             <div class="nk-block">
                 <div class="row g-gs">
                     <div class="col-md-12 col-xxl-8">
                         <div class="card card-bordered card-full">
                             <div class="card-inner border-bottom">
                                 <div class="card-title-group">
                                     <div class="card-title">
                                         <h6 class="title">Charts</h6>
                                     </div>
                                     <div class="card-tools">
                                     </div>
                                 </div>
                             </div>
                             <?php foreach ($dash as $key => $rapport) { ?>
                             <div class="nk-block-des">
                                 <h4 class=" text-center"><?= $rapport['nomRapport']; ?></h4>
                             </div>
                             <canvas id="myChart-<?= $rapport['RefRapport']; ?>" width="100" height="25"></canvas>
                             <script>
                             const ctx<?= $rapport['RefRapport']; ?> = document.getElementById(
                                 'myChart-<?= $rapport['RefRapport']; ?>');
                             const myChart<?= $rapport['RefRapport']; ?> = new Chart(
                                 ctx<?= $rapport['RefRapport']; ?>, {
                                     type: 'bar',
                                     data: {
                                         labels: [
                                             <?php foreach ($rapport['elements'] as $intitule) { ?> '<?= $intitule['nomElement']; ?>',
                                             <?php } ?>
                                         ],
                                         datasets: [{
                                                 label: 'Mois en cours',
                                                 data: [
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <?= $intitule['moisencours']; ?>,
                                                     <?php } ?>
                                                 ],
                                                 backgroundColor: '#6ab7ff',

                                                 borderColor: '#6ab7ff',
                                                 borderWidth: 1
                                             },

                                             {
                                                 label: 'Mois N-1',
                                                 data: [
                                                     <?php foreach ($rapport['elements'] as $intitule) { ?>
                                                     <?= $intitule['moisn1']; ?>,
                                                     <?php } ?>
                                                 ],
                                                 backgroundColor: '#d05ce3',

                                                 borderColor: '#d05ce3',
                                                 borderWidth: 1
                                             }

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
                             <div class="alert alert-pro alert-primary">
                                 <div class="alert-text">
                                     <h6>COMMENTAIRES</h6>
                                     <?php foreach ($rapport['reports'] as $contenu) { ?>
                                     <p class="font-weight-bold"> <?= $contenu['nomPole']; ?></p>
                                     <p class=" font-weight-bold"">
                                         <?= $contenu['reporting']; ?>
                                                </p>
                                     <?php } ?>
                                 </div>
                             </div>
                      


                             <?php } ?>
                         </div><!-- .card -->
                     </div><!-- .col -->
                 </div>
             </div>
             <div class=" nk-block">
                                     <div class="row g-gs">
                                         <div class="col-md-12 col-xxl-8">
                                             <div class="card card-bordered card-full">
                                                 <div class="card-inner border-bottom">
                                                     <div class="card-title-group">
                                                         <div class="card-title">
                                                             <h6 class="title">Evolution</h6>
                                                         </div>
                                                         <div class="card-tools">
                                                         </div>
                                                     </div>
                                                 </div>
                                                 <?php foreach ($stats as $key => $stat) { ?>
                                                 <h4 class="text-center"><?= $stat['nomElement']; ?> </h4>
                                                 <canvas id="Evol-<?= $stat['RefRapportElements']; ?>" width="200"
                                                     height="50"></canvas>
                                                 <script>
                                                 const ct<?= $stat['RefRapportElements']; ?> = document.getElementById(
                                                     'Evol-<?= $stat['RefRapportElements']; ?>');
                                                 const mChart<?= $stat['RefRapportElements']; ?> = new Chart(
                                                     ct<?= $stat['RefRapportElements']; ?>, {
                                                         type: 'line',
                                                         data: {
                                                             labels: [
                                                                 <?php foreach ($getMois as $mois) { ?> '<?= $mois['Mois'] . ' ' . $mois['year']; ?>',
                                                                 <?php } ?>

                                                             ],
                                                             datasets: [{
                                                                     label: 'Mois en cours',
                                                                     data: [
                                                                         <?php foreach ($getMois as $ck => $mois) { ?>
                                                                         <?= number_format($content[$key][$ck]['Smoisencours'], 0, '', ''); ?>,
                                                                         <?php } ?>
                                                                     ],
                                                                     backgroundColor: [
                                                                         'rgba(255, 99, 132, 0.2)',
                                                                     ],
                                                                     borderColor: [
                                                                         'rgba(255, 99, 132, 1)',
                                                                     ],
                                                                     borderWidth: 1
                                                                 },
                                                                 {
                                                                     label: 'Mois N-1 ',
                                                                     data: [
                                                                         <?php foreach ($getMois as $ck => $mois) { ?>
                                                                         <?= number_format($content[$key][$ck]['Smoisn1'], 0, '', ''); ?>,
                                                                         <?php } ?>
                                                                     ],
                                                                     backgroundColor: [
                                                                         'rgba(54, 162, 235, 0.2)',
                                                                     ],
                                                                     borderColor: [
                                                                         'rgba(54, 162, 235, 1)',
                                                                     ],
                                                                     borderWidth: 1
                                                                 },
                                                                 {
                                                                     label: 'Précédent ',
                                                                     data: [
                                                                         <?php foreach ($getMois as $ck => $mois) { ?>
                                                                         <?= number_format($content[$key][$ck]['Sprevisions'], 0, '', ''); ?>,
                                                                         <?php } ?>
                                                                     ],
                                                                     backgroundColor: ' #c63f17',
                                                                     borderColor: '#c63f17',
                                                                     borderWidth: 1
                                                                 }

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
                                                 <?php } ?>
                                             </div><!-- .card -->
                                         </div><!-- .col -->

                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>