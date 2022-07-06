 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">Liste des Rapports</h5>
                         </div>
                         <div class="card card-bordered card-preview">
                             <div class="card-inner">
                                 <table class="datatable-init nowrap table">
                                     <thead>
                                         <tr>
                                             <th>Entreprise</th>
                                             <th>Rapport</th>
                                             <th>Mois</th>
                                             <th>Année</th>
                                             <th>Statut</th>
                                             <th>Actions</th>
                                         </tr>
                                     </thead>
                                     <tbody>
                                         <?php foreach ($rapports as $rapport) { ?>
                                         <tr>
                                             <td><?= $rapport['nomEntreprise']; ?></td>
                                             <td><?= $rapport['nomRapport']; ?></td>
                                             <td><?= $rapport['Mois']; ?></td>
                                             <td><?= $rapport['annee']; ?></td>
                                             <td><?php if ($rapport['status'] == 1) { ?>
                                                 <a href="/rapports/update/statut/2/<?= $rapport['RefRapport']; ?>"><span
                                                         class="badge bg-warning">En
                                                         attente</span></a> <?php } else { ?>
                                                 <a href="/rapports/update/statut/1/<?= $rapport['RefRapport']; ?>""> <span
                                                         class=" badge bg-success">Validé</span></a>
                                                 <?php } ?>
                                             </td>

                                             <td class="td-actions">
                                                 <a href="/rapports/view/display/<?= $rapport['RefRapport']; ?>"
                                                     class="btn btn-primary"><i class="fas fa-eye"> </i></a>
                                                 <a href="/rapports/view/delete/<?= $rapport['RefRapport']; ?>"
                                                     class="btn btn-danger "
                                                     onclick="return confirm('Voulez-vous vraiment supprimer cet élément ?');"><i
                                                         class="fas fa-trash-alt"> </i></a>
                                             </td>

                                         </tr>
                                         <?php } ?>
                                     </tbody>
                                 </table>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>