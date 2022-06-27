<div class="row">
    <div class="col-lg-12">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Liste des Clients</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-wrench"></i>
                    </a>

                    <a class="close-link">
                        <i class="fa fa-times"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content">
                <button class="btn btn-success" data-toggle="modal" data-target="#addUsers"><i class="fa fa-plus"></i>
                    Add</button><br /><br />
                <table class="table table-striped table-bordered " id="dataTable">
                    <thead>
                        <tr>
                            <th>login</th>
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ListeUsers as $key => $value) { ?>
                            <tr>
                                <td><?= $value['login']; ?></td>
                                <td><?= $value['Nom']; ?></td>
                                <td><?= $value['Prenom']; ?></td>
                                <td><?= $value['name_statut']; ?></td>
                                <td> <a href="/editUsers/<?= $value['id']; ?>" class="btn btn-warning"><i class="fa fa-minus"></i>
                                        Edit</a> <a href="/deleteUsers/<?= $value['id']; ?>" class="btn btn-danger"><i class="fa fa-minus"></i> Del</a></td>
                            </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

























<!---modalAddUsers--->
<div class="modal fade" id="addUsers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="post" action="/addUsers">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Ajouter un Utlisateur</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="login">Login </label>
                        <input type="text" class="form-control" name="login">
                    </div>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" name="Nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prenom</label>
                        <input type="text" class="form-control" name="Prenom">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>

                    <div class="form-group">
                        <label for="Statut">Statut</label>
                        <select class="form-control" name="id_statut">
                            <?php foreach ($Statut as $key => $value) { ?>
                                <option value="<?= $value['id_statut']; ?>"><?= $value['name_statut']; ?> </option>
                            <?php   } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de Passe</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>