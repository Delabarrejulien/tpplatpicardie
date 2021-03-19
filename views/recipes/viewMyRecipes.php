

<table class="table">
<thead>
  <tr>

    <th scope="col" class="text">Recettes</th>
    <th scope="col" class="text">Catégories</th>
    <th scope="col" class="text">Editer</th>
   
  </tr>
</thead>
<tbody>

  <?php 
  $i=0;
  foreach($allCooking as $cooking) {
      $i++;
      ?>
      <tr>
      
      <td><?=htmlentities($cooking->name)?></td>
      <td><?=htmlentities($cooking->categorie)?></td>
      
      
      <td>
        <a href="/controllers/viewRecipesCtrl.php?id=<?=htmlentities($cooking->id)?>"><i class="far fa-eye"></i></a>
        
        <a href="/controllers/updateRecipeCtrl.php?id=<?=htmlentities($cooking->id)?>"><i class="far fa-edit"></i></a> 

        <a href="/controllers/deleteRecipeCtrl.php?id=<?=htmlentities($cooking->id)?>"><i class="fas fa-trash-alt"></i></a> 
      </td>
      </tr>
  <?php } ?>

</tbody>
</table>

<nav aria-label="...">
<ul class="pagination pagination-sm">
  
</ul>
</nav>



