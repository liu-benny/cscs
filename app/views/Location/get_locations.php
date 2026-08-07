<?php require APPROOT . '/views/includes/header.php';  ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
 

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?=URLROOT; ?>/Location/add_location">Add New Location</a>
      </li>

     
    </ul>
  </div>
</nav>
<table class="table table-striped">
  <h3>List of Locations</h3>
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">type</th>
      <th scope="col">name</th>
      <th scope="col">address</th>
      <th scope="col">city</th>
      <th scope="col">province</th>
      <th scope="col">postal code</th>
      <th scope="col">phone number</th>
      <th scope="col">web address</th>
      <th scope="col">max capacity</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($data['locations'] as $location) : ?>
      <tr>
        <td><?= $location->location_id ?></td>
        <td><?= $location->location_type ?></td>
        <td><?= $location->location_name ?></td>
        <td><?= $location->address ?></td>
        <td><?= $location->city ?></td>
        <td><?= $location->province?></td>
        <td><?= $location->postal_code ?></td>
        <td>
          <?php foreach ($location->phones as $phone): ?>
            <?= $phone->phone_number ?><br>
          <?php endforeach; ?>
        </td>
        <td><?= $location->web_address ?></td>
        <td><?= $location->max_capacity ?></td>
        <td><a class="btn btn-sm btn-secondary" href="<?= URLROOT; ?>/Location/edit_location/<?= $location->location_id ?>">Edit</a></td>
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>

  

<?php require APPROOT . '/views/includes/footer.php'; ?>