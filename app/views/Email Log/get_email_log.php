<?php require APPROOT . '/views/includes/header.php';  ?>
<?= "bitrch" ?>
<table class="table table-striped">
    <h3> Email Log </h3>

    <thead>
    <tr>
      <th scope="col">email_log_idasdasdasdasdasdsa</th>
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