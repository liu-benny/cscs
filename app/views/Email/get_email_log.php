<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/Email/send_weekly_email">For Test Purposes: Send Weekly Email!</a>
      </li>
      
    </ul>
    
   </div>
</nav>
<table class="table table-striped">
    <h3> Email Log </h3>

    <thead>
    <tr>
      <th scope="col">email_log_id</th>
      <th scope="col">location name</th>
      <th scope="col">date</th>
      <th scope="col">receiver email</th>
      <th scope="col">subject</th>
      <th scope="col">body (1st 100 characters)</th>
    </tr>
  </thead>
<tbody>
    <?php foreach ($data['email_logs'] as $email_log) : ?>
      <tr>
        <td><?= $email_log->email_log_id ?></td>
        <td><?= $email_log->location_name ?></td>
        <td><?= $email_log->date ?></td>
        <td><?= $email_log->receiver_email ?></td>
        <td><?= $email_log->subject ?></td>
        <td><?= $email_log->body ?></td>
        
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>


<?php require APPROOT . '/views/includes/footer.php'; ?>