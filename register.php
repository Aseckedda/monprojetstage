<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
include("connexion.php");
$req = $pdo->prepare("SELECT * FROM agent");
$req->execute();
$resultat = $req->fetchALL(PDO::FETCH_ASSOC);
?>

<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Affecter un agent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="affecter.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Nom du projet :</label>
                <input type="text" name="nom_projet" class="form-control" placeholder="Enter projet">
            </div>
            <div class="form-group">
                <label> Id de l'agent </label>
                <input type="text" name="agent" class="form-control" placeholder="Enter agent">
            </div>
            <div class="form-group">
                <label>Date debut</label>
                <input type="date" name="date_debut" class="form-control" placeholder="date debut">
            </div>
            <div class="form-group">
                <label>Date fin</label>
                <input type="date" name="date_fin" class="form-control" placeholder="Enter date fin">
            </div>
    
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Enregistrer</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Agent
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
              Ajouter
            </button>
    </h6>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Nom</th>
            <th>Prenom </th>
            <th>Email </th>
            <th>Experience </th>
            <th>Projet</th>
            <th>AFFECTER</th>
          </tr>
        </thead>
        <tbody>
     
        <?php foreach($resultat as $data)
							{
							  ?>
							  <tr>
							  <td><?php echo $data['nom']; ?></td>
							  <td><?php echo $data['prenom']; ?></td>
							  <td><?php echo $data['email']; ?></td>
							  <td><?php echo $data['experience']; ?></td>
                <td><?php echo $data['projet']; ?></td>
						
            
            <td>
                <form action="affecter_projet.html" method="post">
                <input type="hidden" name="edit_id" value="">
                    <button  type="submit" name="edit_btn" class="btn btn-success"> AFFECTER</button>
                </form>
            </td>
          </tr>
          <?php
						  }
						  ?>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>