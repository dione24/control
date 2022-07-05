 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">Liste des Elements</h5>
                         </div>
                         <div class="card card-bordered card-preview">
                             <div class="card-inner">
                                 <table class="datatable-init nowrap table">
                                     <thead>
                                         <tr>
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
                                             <td><?= $rapport['nomRapport']; ?></td>
                                             <td><?= $rapport['Mois']; ?></td>
                                             <td><?= $rapport['annee']; ?></td>
                                             <td><?php if ($rapport['status'] == 1) { ?>
                                                 <span class="badge badge-warning">En attente</span> <?php } else { ?>
                                                 <span class="badge badge-success">Validé</span>
                                                 <?php } ?>
                                             </td>
                                             <td class="td-actions">
                                                 <a href="/rapports/view/update/<?= $rapport['RefTypeRapport']; ?>"
                                                     class="btn btn-success"><i class="fas fa-edit"> </i></a>
                                                 <a href="/rapports/view/delete/<?= $rapport['RefTypeRapport']; ?>"
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