<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/Team/add_team_formation">Add New Team Formation</a>
      </li>
    </li>
   </div>
</nav>
<table class="table table-striped">
  <h3>List of Team Formations</h3>
  <thead>
    <tr>
      <th scope="col">team id</th>
      <th scope="col">session id</th>
      <th scope="col">team name</th>
      <th scope="col">head coach</th>
      <th scope="col">gender group</th>
      <th scope="col">score</th>
      <th scope="col">players</th>
      <th scope="col">date</th>
      <th scope="col">start time</th> 
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['team_formations'] as $formation): ?>
    <tr>
        <td><?= $formation->team_id ?></td>
        <td><?= $formation->session_id ?></td>>
        <td><?= $formation->name ?></td>
        <td><?= $formation->coach_first_name ?> <?= $formation->coach_last_name ?></td>
        <td><?= $formation->gender_category ?></td>
        <td><?= $formation->score ?></td>
        <td>
            <?php foreach ($formation->players as $player): ?>
                <?= $player->first_name ?> <?= $player->last_name ?> (<?= $player->position ?>)<br>
            <?php endforeach; ?>
        </td>
        <td><?php $formation->date ?> <?= $formation->date ?></td>
        <td><?php $formation->start_time ?> <?= $formation->start_time ?></td>
    </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>
