<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Team/choose_teams">
    <h3>Choose the Two <?= $data['new_session']['gender'] ?> Teams</h3>
        
        <div class="form-group row">
        <label for="team1_id_input" class="col-sm-2 col-form-label">Team 1</label>
            <div class="col-sm-4">
                <select class="form-control" id="team1_id_input" name="team1_id" required>
                    <option value="" disabled selected hidden>Please choose the first team</option>
                    <?php foreach($data['teams'] as $team): ?>
                        <option value="<?= $team->team_id ?>"><?= $team->name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="form-group row">
        <label for="team2_id_input" class="col-sm-2 col-form-label">Team 2</label>
            <div class="col-sm-4">
                <select class="form-control" id="team2_id_input" name="team2_id" required>
                    <option value="" disabled selected hidden>Please choose the second team</option>
                    <?php foreach($data['teams'] as $team): ?>
                        <option value="<?= $team->team_id ?>"><?= $team->name ?> </option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <button class="btn btn-primary" type="submit" name="submit">Next</button>
</form>

<?php require APPROOT . '/views/includes/footer.php';  ?>