<?php require APPROOT . '/views/includes/header.php';  ?>
<form method="post" action="<?= URLROOT; ?>/ClubMember/change_location/<?= $data['clubmember']->membership_number ?>">
    <h3>Change Club Member Assigned location for <?= $data['clubmember']->first_name ?> <?= $data['clubmember']->last_name ?></h3>
    <h4>Current Location: <?= $data['current_location']->location_name ?></h4>
    <div class="form-group row">
    <label for="location_input" class="col-sm-2 col-form-label">Assign a new Location</label>
        <div class="col-sm-4">
            <select id="location_input" class="form-control" name="location_id" required>
                <option value="" disabled selected hidden>Please choose an option</option>
                <?php foreach ($data['locations'] as $location): ?>
                    <?php if ($location->location_id == $data['current_location']->location_id) continue; ?>
                    <option value="<?= $location->location_id ?>"><?= $location->location_name ?></option>
                <?php endforeach; ?>
            </select>
        </div>
    </div>

    <div class="form-group row">
        <label for="start_date_input" class="col-sm-2 col-form-label">New Start Date</label>
            <div class="col-sm-4">
                <input type="date" class="form-control" id="start_date_input" name="start_date" required>
            </div>
    </div>
    <script>
        document.getElementById('start_date_input').min = new Date().toISOString().split('T')[0];
    </script>

    
    <button type="button" class="btn btn-secondary" onclick="window.location.href='<?= URLROOT; ?>/ClubMember/edit_clubmember/<?= $data['clubmember']->membership_number ?>'">Back</button>
    <button type="submit" class="btn btn-primary" name="submit">Change Location</button>

</form>
<?php require APPROOT . '/views/includes/footer.php'; ?>