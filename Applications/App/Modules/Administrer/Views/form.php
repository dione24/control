 <div class="container-fluid">
     <div class="nk-content-inner">
         <div class="nk-content-body">
             <div class="nk-block-head nk-block-head-sm">
                 <div class="card card-bordered">
                     <div class="card-inner">
                         <div class="card-head">
                             <h5 class="card-title">KPI | <?= $rapport['nomRapport']; ?></h5>
                         </div>
                         <form method="POST">
                             <input type="hidden" name="RefTypeRapport" value="<?= $rapport['RefTypeRapport']; ?>" />
                             <div class="row g-4">
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="full-name-1">Mois</label>
                                         <div class="form-control-wrap">
                                             <select class="form-control" id="full-name-1" name="RefMois">
                                                 <?php foreach ($mois as $month) { ?>
                                                 <option value="<?= $month['RefMois']; ?>"><?= $month['Mois']; ?>
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
                                             <input type="text" class="form-control" id="full-name-1" name="annee">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             </br>
                             <?php foreach ($elements as $key => $element) { ?>
                             <input type="hidden" name="RefRapportElements"
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
                                                 name="moisencours[]">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="phone-no-1">Mois N-1</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="phone-no-1" multiple
                                                 name="moisn1[]">
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="phone-no-1">Mois Precedent</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="phone-no-1" multiple
                                                 name="moisprecedent[]">
                                         </div>
                                     </div>
                                 </div>

                                 <div class="col-lg-2">
                                     <div class="form-group">
                                         <label class="form-label" for="phone-no-1">Prévisions</label>
                                         <div class="form-control-wrap">
                                             <input type="text" class="form-control" id="phone-no-1" multiple
                                                 name="previsions[]">
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             </br></br>
                             <?php } ?>
                             <div class="col-12">
                                 <div class="form-group">
                                     <button type="submit" class="btn btn-lg btn-primary">Envoyer</button>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </div>