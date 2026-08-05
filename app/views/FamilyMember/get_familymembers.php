<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/FamilyMember/add_familymember">Add New Family Member</a>
      </li>
    </li>
</div>
</nav>

<table class="table table-striped">
  <h3>List of Family Members</h3>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">first name</th>
      <th scope="col">last name</th>
      <th scope="col">date of birth</th>
      <th scope="col">ssn</th>
      <th scope="col">medicare</th>
      <th scope="col">phone number</th>
      <th scope="col">address</th>
      <th scope="col">city</th>
      <th scope="col">province</th>
      <th scope="col">postal code</th>
      <th scope="col">email</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['familymembers'] as $familymember) : ?>
      <tr>
        <td><?= $familymember->family_member_id ?></td>
        <td><?= $familymember->first_name ?></td>
        <td><?= $familymember->last_name ?></td>
        <td><?= $familymember->date_of_birth ?></td>
        <td><?= $familymember->ssn ?></td>
        <td><?= $familymember->medicare_number ?></td>
        <td><?= $familymember->phone_number ?></td>
        <td><?= $familymember->address ?></td>
        <td><?= $familymember->city ?></td>
        <td><?= $familymember->province?></td>
        <td><?= $familymember->postal_code ?></td>
        <td><?= $familymember->email ?></td>
        <td><a class="btn btn-sm btn-secondary" href="<?= URLROOT; ?>/FamilyMember/edit_familymember/<?= $familymember->family_member_id ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>

<?php require APPROOT . '/views/includes/footer.php'; ?>