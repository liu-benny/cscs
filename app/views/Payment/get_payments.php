<?php require APPROOT . '/views/includes/header.php';  ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    
   </div>
</nav>
<table class="table table-striped">
  <h3>List of Payments for ClubMembers</h3>
  <thead>
    <tr>
      <th scope="col">payment id</th>
      <th scope="col">membership number</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">payment date</th>
      <th scope="col">amount</th>
      <th scope="col">payment method</th>
      <th scope="col">payment year target</th>
      <th scope="col">installment number</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['payments'] as $p): ?>
    <tr>
        <td><?= $p->payment_id ?></td>
        <td><?= $p->membership_number ?></td>
        <td><?= $p->first_name ?></td>
        <td><?= $p->last_name ?></td>
        <td><?= $p->payment_date ?></td>
        <td><?= $p->amount ?></td>
        <td><?= $p->payment_method ?></td>
        <td><?= $p->payment_year_target ?></td>
        <td><?= $p->installment_number ?></td>

    </tr>
    <?php endforeach; ?>
  </tbody>
</table>