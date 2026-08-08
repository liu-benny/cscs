<?php require APPROOT . '/views/includes/header.php';  ?>
<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Team/add_team_formations">
    <h3>New Team Formation</h3>
        
        <div class="form-group row">
        <label for="team_id_input" class="col-sm-2 col-form-label">Team</label>
            <div class="col-sm-10">
                <select class="form-control" id="team_id_input" name="team_id" required>
                    <option value="" disabled selected hidden>Please choose an option</option>
                    <?php foreach($data['teams'] as $team): ?>
                        <option value="<?= $team->team_id ?>"><?= $team->name ?> (<?= $team->gender_category ?>)</option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

    <button class="btn btn-primary" type="submit" name="submit">Add Location</button>
</form>


<?php require APPROOT . '/views/includes/footer.php'; ?>