<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/Personnel/add_personnel">Add New Personnel</a>
      </li>
    </li>
</div>
</nav>

<table class="table table-striped">
  <h3>List of Personnel</h3>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">date of birth</th>
      <th scope="col">ssn</th>
      <th scope="col">medicare_number</th>
      <th scope="col">phone number</th>
      <th scope="col">address</th>
      <th scope="col">city</th>
      <th scope="col">province</th>
      <th scope="col">postal code</th>
      <th scope="col">email</th>
      <th scope="col">role</th>
      <th scope="col">mandate</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['personnels'] as $personnel) : ?>
      <tr>
        <td><?= $personnel->personnel_id ?></td>
        <td><?= $personnel->first_name ?></td>
        <td><?= $personnel->last_name ?></td>
        <td><?= $personnel->date_of_birth ?></td>
        <td><?= $personnel->ssn ?></td>
        <td><?= $personnel->medicare_number ?></td>
        <td><?= $personnel->phone_number ?></td>
        <td><?= $personnel->address ?></td>
        <td><?= $personnel->city ?></td>
        <td><?= $personnel->province?></td>
        <td><?= $personnel->postal_code ?></td>
        <td><?= $personnel->email ?></td>
        <td><?= $personnel->personnel_role ?></td>
        <td><?= $personnel->mandate ?></td>
        <td><a class="btn btn-sm btn-secondary" href="<?= URLROOT; ?>/Personnel/edit_personnel/<?= $personnel->personnel_id ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>

<?php require APPROOT . '/views/includes/footer.php'; ?>