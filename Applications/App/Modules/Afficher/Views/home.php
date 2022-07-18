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
                 </div><!-- .row -->
             </div><!-- .nk-block -->
         </div>
     </div>
 </div>