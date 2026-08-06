<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/Team/add_team_formation">Add New Team Formation</a>
      </li>
    </li>
   </div>

<table class="table table-striped">
  <h3>List of Personnel</h3>
  <thead>
    <tr>
      <th scope="col">team id</th>
      <th scope="col">team name</th>
      <th scope="col">head coach</th>
      <th scope="col">gender group</th>
      <th scope="col">players</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['personnels'] as $personnel) : ?>
      <tr>
        
        <td><a class="btn btn-sm btn-secondary" href="<?= URLROOT; ?>/Personnel/edit_personnel/<?= $personnel->personnel_id ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>
</nav>