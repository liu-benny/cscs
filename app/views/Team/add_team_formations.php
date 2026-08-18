<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" id="teamForm" action="<?= URLROOT; ?>/Team/add_team_formations">
    <h3>Choose the Team Formations for the Session </h3>

    <div class="form-group row">
        <label for="coach1_id_input" class="col-sm-2 col-form-label">Coach of <?= $data['team1']->name ?>:</label>
            <div class="col-sm-4">
                <select class="form-control" id="coach1_id_input" name="coach1_id" required>
                    <option value="" disabled selected hidden>Please choose the head coach</option>
                    <?php foreach($data['coaches1'] as $head_coach): ?>
                        <option value="<?= $head_coach->personnel_id ?>"><?= $head_coach->first_name . " " . $head_coach->last_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Players for team <?= $data['team1']->name ?>: </label>
        <div class="col-sm-10">
            <?php foreach($data['players1'] as $player): ?>
                <div class="form-check form-check-inline" style="margin-bottom: 10px;">
                    <input 
                        class="form-check-input team1-checkbox" 
                        type="checkbox" 
                        name="team1_players[]" 
                        value="<?= $player->membership_number ?>" 
                        id="player1_<?= $player->membership_number ?>"> 
                    <label class="form-check-label" for="player1_<?= $player->membership_number ?>">
                        <?= $player->first_name . " " . $player->last_name ?>
                    </label>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <?php if ($_SESSION['date_time'] < new DateTime()): ?>
        <div class="form-group row">
            <label for="team1_score_input" class="col-sm-2 col-form-label">Enter the score for <?= $data['team1']->name ?>:</label>
            <div class="col-sm-4">
                <input type="number" min="0" class="form-control" name="team1_score"  required>
            </div>
        </div>
    
    <?php endif; ?>
    <div class="form-group row">
        <label for="coach2_id_input" class="col-sm-2 col-form-label">Coach of <?= $data['team2']->name ?>:</label>
            <div class="col-sm-4">
                <select class="form-control" id="coach2_id_input" name="coach2_id" required>
                    <option value="" disabled selected hidden>Please choose the head coach</option>
                    <?php foreach($data['coaches2'] as $head_coach): ?>
                        <option value="<?= $head_coach->personnel_id ?>"><?= $head_coach->first_name . " " . $head_coach->last_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
    </div>

    <div class="form-group row">
    <label class="col-sm-2 col-form-label">Select Players for team <?= $data['team2']->name ?>: </label>
    <div class="col-sm-10">
        <?php foreach($data['players2'] as $player): ?>
            <div class="form-check form-check-inline" style="margin-bottom: 10px;">
                <input 
                    class="form-check-input team2-checkbox" 
                    type="checkbox" 
                    name="team2_players[]" 
                    value="<?= $player->membership_number ?>" 
                    id="player2_<?= $player->membership_number ?>">
                <label class="form-check-label" for="player2_<?= $player->membership_number ?>">
                    <?= $player->first_name . " " . $player->last_name ?>
                </label>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php if ($_SESSION['date_time'] < new DateTime()): ?>
        <div class="form-group row">
            <label for="team2_score_input" class="col-sm-2 col-form-label">Enter the score for <?= $data['team2']->name ?>:</label>
            <div class="col-sm-4">
                <input type="number" min="0" class="form-control" name="team2_score" required>
            </div>
        </div>
    
    <?php endif; ?>
<button type="submit" class="btn btn-primary" name="submit">Next</button>
</form>


<?php require APPROOT . '/views/includes/footer.php';  ?>