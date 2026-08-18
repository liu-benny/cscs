<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" id="editTeamForm" action="<?= URLROOT; ?>/Team/edit_team_formation/<?= $data['team_formation']->session_id ?>/<?= $data['team_formation']->team_id ?>">

    <h3>Edit the Team Formation information</h3>
        
    
        <div class="form-group row">
        <label for="score_input" class="col-sm-2 col-form-label">Score</label>
            <div class="col-sm-4">
                <?php if (!isset($data['team_formation']->score) || $data['team_formation']->score === 'TBA'): ?>
                    <input type="number" class="form-control" id="score_input" name="score" placeholder="TBA (since this is an upcoming session)">
                <?php else: ?>
                    <input type="number" min=0 class="form-control" id="score_input" name="score" value="<?= $data['team_formation']->score ?>">
                <?php endif; ?>
            </div>
        </div>

        <div class="form-group row">
        <label for="coach_id_input" class="col-sm-2 col-form-label">Coach of <?= $data['team_formation']->name ?>:</label>
            <div class="col-sm-4">
                <select class="form-control" id="coach1_id_input" name="coach_id" required>
                    <option value="<?= $data['team_formation']->coach_id ?>" selected ><?= $data['team_formation']->coach_first_name ?> <?= $data['team_formation']->coach_last_name ?></option>
                    <?php foreach($data['all_coaches'] as $head_coach): ?>
                        <?php if ($head_coach->personnel_id != $data['team_formation']->coach_id): ?>
                            <option value="<?= $head_coach->personnel_id ?>"><?= $head_coach->first_name . " " . $head_coach->last_name ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
    </div>

    <div class="form-group row">
        <label class="col-sm-2 col-form-label">Select Players for team <?= $data['team_formation']->name ?>: </label>
        <div class="col-sm-10">
            <?php foreach($data['all_players'] as $player): ?>
            <div class="form-check form-check-inline" style="margin-bottom: 10px;">
                <input 
                    class="form-check-input team-checkbox" 
                    type="checkbox" 
                    name="team_players[]" 
                    value="<?= $player->membership_number ?>" 
                    id="player_<?= $player->membership_number ?>"
                    <?php 
                        // Loop through assigned team players to check if already assigned to team
                        foreach($data['team_players'] as $team_player) {
                            if ($team_player->membership_number == $player->membership_number) {
                                echo 'checked';
                                break; 
                            }
                        }
                    ?>
                > 
                <label class="form-check-label" for="player_<?= $player->membership_number ?>">
                    <?= $player->first_name . " " . $player->last_name ?>
                </label>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    
    <button type="submit" class="btn btn-primary" name="submit">Next</button>
</form>
<?php require APPROOT . '/views/includes/footer.php';  ?>