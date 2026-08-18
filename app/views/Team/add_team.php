<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Team/add_team">
    <h3>New Team Formation</h3>
        
        <div class="form-group row">
        <label for="team_id_input" class="col-sm-2 col-form-label">Team Name</label>
            <div class="col-sm-6">
                <input type="text" class="form-control" id="name_input" name="name" placeholder="Name" required>
            </div>
        </div>


        <div class="form-group row">
        <label for="gender_input" class="col-sm-2 col-form-label">Gender Category</label>
            <div class="col-sm-4">
                <select id="gender_input" class="form-control" name="gender_category" required>
                    <option selected disable hidden>Please choose an option</option>
                    <option>Boy</option>
                    <option>Girl</option>
                </select>  
            </div>
        </div>

        <div class="form-group row">
        <label for="location_input" class="col-sm-2 col-form-label">Assign a Location</label>
            <div class="col-sm-4">
                <select id="location_input" class="form-control" name="location_id" required>
                    <option value="" disabled selected hidden>Please choose an option</option>
                    <?php foreach($data['locations'] as $location): ?>
                        <option value="<?= $location->location_id ?>"><?= $location->location_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

    <button class="btn btn-primary" type="submit" name="submit">Create Team</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>