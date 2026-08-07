<?php require APPROOT . '/views/includes/header.php'; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">

    <div class="collapse navbar-collapse"
         id="navbarSupportedContent">

        <ul class="navbar-nav mr-3">

            <li class="nav-item">
                <a class="nav-link"
                   href="<?= URLROOT ?>/Personnel/add_personnel">
                    Add New Personnel
                </a>
            </li>

        </ul>

        <form method="GET"
              action="<?= URLROOT ?>/Personnel/index"
              class="form-inline mb-0">

            <input type="text"
                   name="search"
                   class="form-control mr-2"
                   style="width: 350px;"
                   placeholder="Search by ID, name, SSN, role, city..."
                   value="<?= htmlspecialchars(
                       $data['search_value'] ?? '',
                       ENT_QUOTES,
                       'UTF-8'
                   ) ?>">

            <button type="submit"
                    class="btn btn-primary mr-2">
                Search
            </button>

            <a href="<?= URLROOT ?>/Personnel/index"
               class="btn btn-secondary">
                Clear
            </a>

        </form>

    </div>

</nav>

<h3>List of Personnel</h3>

<table class="table table-striped">

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
            <th scope="col">role</th>
            <th scope="col">mandate</th>
            <th scope="col">actions</th>
        </tr>

    </thead>

    <tbody>

        <?php foreach ($data['personnels'] as $personnel) : ?>

            <tr>
                <td><?= htmlspecialchars($personnel->personnel_id) ?></td>
                <td><?= htmlspecialchars($personnel->first_name) ?></td>
                <td><?= htmlspecialchars($personnel->last_name) ?></td>
                <td><?= htmlspecialchars($personnel->date_of_birth) ?></td>
                <td><?= htmlspecialchars($personnel->ssn) ?></td>
                <td><?= htmlspecialchars($personnel->medicare_number) ?></td>
                <td><?= htmlspecialchars($personnel->phone_number) ?></td>
                <td><?= htmlspecialchars($personnel->address) ?></td>
                <td><?= htmlspecialchars($personnel->city) ?></td>
                <td><?= htmlspecialchars($personnel->province) ?></td>
                <td><?= htmlspecialchars($personnel->postal_code) ?></td>
                <td><?= htmlspecialchars($personnel->email) ?></td>
                <td><?= htmlspecialchars($personnel->personnel_role) ?></td>
                <td><?= htmlspecialchars($personnel->mandate) ?></td>

                <td>
                    <a class="btn btn-sm btn-secondary"
                       href="<?= URLROOT; ?>/Personnel/edit_personnel/<?= $personnel->personnel_id ?>">
                        Edit
                    </a>
                </td>
            </tr>

        <?php endforeach; ?>

    </tbody>

</table>
<?php if (
    !empty($data['search_value']) &&
    empty($data['personnels'])
): ?>

    <div class="alert alert-warning" role="alert">
        No personnel matched
        "<strong><?= htmlspecialchars(
            $data['search_value'],
            ENT_QUOTES,
            'UTF-8'
        ) ?></strong>".
    </div>

<?php endif; ?>

<?php require APPROOT . '/views/includes/footer.php'; ?>