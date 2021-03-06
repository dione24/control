 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">KPI | <?= $name['nomRapport']; ?></h5>
                         </div>
                         <form method="POST">
                             <input type="hidden" name="RefRapport" value="<?= $name['RefRapport']; ?>" />
                             <input type="hidden" name="RefTypeRapport" value="<?= $name['RefTypeRapport']; ?>" />
                             <div class="row g-4">

                                 <?php if ($_SESSION['Statut'] == 'user') { ?>
                                 <input type="hidden" name="RefEntreprise" value="<?= $name['RefEntreprise']; ?>" />
                                 <?php } else { ?>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Entreprise</label>
                                         <div class="form-control-wrap">

                                             <select class="form-control" id="full-name-1" name="RefEntreprise">
                                                 <?php foreach ($entreprises as $entreprise) { ?>
                                                 <option value="<?= $entreprise['RefEntreprise']; ?>"
                                                     <?php if ($name['RefEntreprise'] == $entreprise['RefEntreprise']) { ?>
                                                     selected <?php } ?>>
                                                     <?= $entreprise['nomEntreprise']; ?></option>

                                                 </option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <?php } ?>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Mois</label>
                                         <div class="form-control-wrap">
                                             <select class="form-control" id="full-name-1" name="RefMois">
                                                 <?php foreach ($mois as $month) { ?>
                                                 <option value="<?= $month['RefMois']; ?>"
                                                     <?php if ($name['RefMois'] == $month['RefMois']) { ?> selected
                                                     <?php } ?>>

                                                     <?= $month['Mois']; ?>
                                                 </option>
                                                 <?php } ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Annee</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="full-name-1" name="annee"
                                                 value="<?= $name['annee']; ?>">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             </br>
                             <?php foreach ($elements as $key => $element) { ?>
                             <input type="hidden" name="RefRapportElements[]" multiple
                                 value="<?= $element['RefRapportElements']; ?>" />
                             <div class="row g-4">
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label"
                                             for="full-name-1"><?= $element['nomElement']; ?></label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="full-name-1"
                                                 value="<?= $element['nomElement']; ?>" readonly>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="email-address-1">Mois en Cours</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="email-address-1" multiple
                                                 name="moisencours[]"
                                                 value="<?= $element['content']['moisencours']; ?>">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="phone-no-1">Mois N-1</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="phone-no-1" multiple
                                                 name="moisn1[]" value="<?= $element['content']['moisn1']; ?>">
                                         </div>
                                     </div>
                                 </div>
                                 <div class=" col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="phone-no-1">Mois Precedent</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="phone-no-1" multiple
                                                 name="moisprecedent[]"
                                                 value="<?= $element['content']['moisprecedent']; ?>">
                                         </div>
                                     </div>
                                 </div>

                                 <div class=" col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="phone-no-1">Pr??visions</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="phone-no-1" multiple
                                                 name="previsions[]" value="<?= $element['content']['previsions']; ?>">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             </br></br>
                             <?php } ?>

                             <?php if ($_SESSION['Statut'] == 'user') { ?>
                             <div class=" col-12">
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-lg btn-primary"
                                         <?php if ($name['status'] == 2) { ?> disabled <?php } ?>>Modifier</button>
                                 </div>
                             </div>
                             <?php } ?>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>