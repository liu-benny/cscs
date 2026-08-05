<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/ClubMember/add_clubmember">Add New Club Member</a>
      </li>
    </li>
</div>
</nav>

<table class="table table-striped">
  <h3>List of Club Members</h3>
  <thead>
    <tr>
      <th scope="col">membership number</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">date of birth</th>
      <th scope="col">gender</th>
      <th scope="col">height</th>
      <th scope="col">weight</th>
      <th scope="col">SSN</th>
      <th scope="col">medicare</th>
      <th scope="col">phone number</th>
      <th scope="col">address</th>
      <th scope="col">city</th>
      <th scope="col">province</th>
      <th scope="col">postal code</th>
      
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['clubmembers'] as $clubmember) : ?>
      <tr>
        <td><?= $clubmember->membership_number ?></td>
        <td><?= $clubmember->first_name ?></td>
        <td><?= $clubmember->last_name ?></td>
        <td><?= $clubmember->date_of_birth ?></td>
        <td><?= $clubmember->gender ?></td>
        <td><?= $clubmember->height_cm?> cm</td>
        <td><?= $clubmember->weight_kg?> kg</td>
        <td><?= $clubmember->ssn ?></td>
        <td><?= $clubmember->medicare_number ?></td>
        <td><?= $clubmember->phone_number ?></td>
        <td><?= $clubmember->address ?></td>
        <td><?= $clubmember->city ?></td>
        <td><?= $clubmember->province?></td>
        <td><?= $clubmember->postal_code ?></td>
        <td><a class="btn btn-sm btn-secondary" href="<?= URLROOT; ?>/ClubMember/edit_clubmember/<?= $clubmember->membership_number ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>

<?php require APPROOT . '/views/includes/footer.php'; ?>