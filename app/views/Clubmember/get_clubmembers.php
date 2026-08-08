<?php require APPROOT . '/views/includes/header.php';  ?>

<nav class="navbar navbar-light bg-light mb-3">

    <div class="d-flex flex-wrap align-items-center">

        <a href="<?= URLROOT ?>/ClubMember/add_clubmember"
           class="mr-4"
           style="color: #6c757d; text-decoration: none;">
            Add New Club Member
        </a>

        <form method="GET"
              action="<?= URLROOT ?>/ClubMember/index"
              class="form-inline mb-0">

            <input type="text"
                   name="search"
                   class="form-control mr-2"
                   style="width: 440px;"
                   placeholder="Search by ID, name, SSN, Medicare, city..."
                   value="<?= htmlspecialchars(
                       $data['search_value'] ?? '',
                       ENT_QUOTES,
                       'UTF-8'
                   ) ?>">

            <button type="submit"
                    class="btn btn-primary mr-2">
                Search
            </button>

            <a href="<?= URLROOT ?>/ClubMember/index"
               class="btn btn-secondary">
                Clear
            </a>

        </form>

    </div>

</nav>

<?php if (isset($_GET['deleted']) && $_GET['deleted'] === '1'): ?>

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        Club member deleted successfully!

        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>

<?php endif; ?>


<?php if (
    !empty($data['search_value']) &&
    empty($data['clubmembers'])
): ?>

    <div class="alert alert-warning" role="alert">

        No club members matched
        "<strong><?= htmlspecialchars(
            $data['search_value'],
            ENT_QUOTES,
            'UTF-8'
        ) ?></strong>".

    </div>

<?php endif; ?>


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
        <td><a class="btn btn-sm btn-success" href="<?= URLROOT; ?>/Payment/make_payment/<?= $clubmember->membership_number ?>">Make Payment</a></td>
      </tr>
    <?php endforeach; ?>
    </tr>
  </tbody>
</table>


<?php require APPROOT . '/views/includes/footer.php'; ?>