

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-sm-8 justify-content-center">
            <div class="col-6 col-sm-6 text-center justify-content-center">

            
            <div class="container bcontent">
        <div class="card">
            <div class="row no-gutters">
            
                <div class="col-sm-12">
                    <div class="card-body">
                        <h5 class="card-title">Id patient : <?= $user->id ?></h5>
                        <p class="card-text">Nom : <?= $user->name ?> <br>
                        Prénom : <?= $user->firstname ?> <br>
                        Date de naissance : <?= $user->birthday ?> <br>
                        mail : <?= $user->mail ?> <br>
                        pseudo : <?= $user->pseudo ?> <br></p>
                        
                        

                        <a href="/controllers/updateProfilCtrl.php?id=<?= $user->id?>">Modifer</a>

                    
                    </div>
                </div>
            </div>
        </div>
    </div>
                
                
              

                    
                  