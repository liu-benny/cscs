<?php require APPROOT . '/views/includes/header.php'; ?>


<?php if (isset($_GET['deleted']) && $_GET['deleted'] === '1'): ?>

    <div class="alert alert-success alert-dismissible fade show"
         role="alert">

        Location deleted successfully!

        <button type="button"
                class="close"
                data-dismiss="alert"
                aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>

    </div>

<?php endif; ?>


<?php if (isset($_GET['delete_error'])): ?>

    <div class="alert alert-danger" role="alert">
        The location could not be deleted.
    </div>

<?php endif; ?>


<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">

    <div class="collapse navbar-collapse"
         id="navbarSupportedContent">

        <ul class="navbar-nav mr-3">

            <li class="nav-item">

                <a class="nav-link"
                   href="<?= URLROOT ?>/Location/add_location">
                    Add New Location
                </a>

            </li>

        </ul>


        <form method="GET"
              action="<?= URLROOT ?>/Location/index"
              class="form-inline mb-0">

            <input type="text"
                   name="search"
                   class="form-control mr-2"
                   style="width: 350px;"
                   placeholder="Search by ID, name, phone, city..."
                   value="<?= htmlspecialchars(
                       $data['search_value'] ?? '',
                       ENT_QUOTES,
                       'UTF-8'
                   ) ?>">

            <button type="submit"
                    class="btn btn-primary mr-2">
                Search
            </button>

            <a href="<?= URLROOT ?>/Location/index"
               class="btn btn-secondary">
                Clear
            </a>

        </form>

    </div>

</nav>


<h3>List of Locations</h3>


<?php if (
    !empty($data['search_value']) &&
    empty($data['locations'])
): ?>

    <div class="alert alert-warning" role="alert">

        No locations matched
        "<strong><?= htmlspecialchars(
            $data['search_value'],
            ENT_QUOTES,
            'UTF-8'
        ) ?></strong>".

    </div>

<?php endif; ?>


<div class="table-responsive">

    <table class="table table-striped">

        <thead>

            <tr>
                <th scope="col">ID</th>
                <th scope="col">Type</th>
                <th scope="col">Name</th>
                <th scope="col">Address</th>
                <th scope="col">City</th>
                <th scope="col">Province</th>
                <th scope="col">Postal Code</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Web Address</th>
                <th scope="col">Max Capacity</th>
                <th scope="col">Action</th>
            </tr>

        </thead>

        <tbody>

            <?php foreach ($data['locations'] as $location): ?>

                <tr>

                    <td>
                        <?= (int) $location->location_id ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->location_type,
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->location_name,
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->address ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->city ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->province ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->postal_code ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>

                        <?php if (!empty($location->phones)): ?>

                            <?php foreach (
                                $location->phones as $phone
                            ): ?>

                                <div>
                                    <?= htmlspecialchars(
                                        $phone->phone_number,
                                        ENT_QUOTES,
                                        'UTF-8'
                                    ) ?>
                                </div>

                            <?php endforeach; ?>

                        <?php else: ?>

                            <span class="text-muted">
                                No phone number
                            </span>

                        <?php endif; ?>

                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->web_address ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>
                        <?= htmlspecialchars(
                            $location->max_capacity ?? '',
                            ENT_QUOTES,
                            'UTF-8'
                        ) ?>
                    </td>

                    <td>

                        <a class="btn btn-sm btn-secondary"
                           href="<?= URLROOT ?>/Location/edit_location/<?= (int) $location->location_id ?>">
                            Edit
                        </a>

                    </td>

                </tr>

            <?php endforeach; ?>

        </tbody>

    </table>

</div>


<?php require APPROOT . '/views/includes/footer.php'; ?>