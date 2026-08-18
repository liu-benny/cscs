<?php require APPROOT . '/views/includes/header.php';  ?>

<form method="post" action="<?= URLROOT; ?>/Team/assign_positions">
    <h3>Assign Positions for Team 1: <?= $_SESSION['team1']->name ?></h3>
    <div class="form-group">
        <?php foreach($_SESSION['players1'] as $player): ?>
            <!-- Defined variable -->
            <?php $membership_number = $player->membership_number; ?>
            
            <?php if(in_array($membership_number, $data['team1_players'] ?? [])): ?>
                <div class="form-group row">
                    <label class="col-sm-4">Select Position for <?= $player->first_name . " " . $player->last_name ?></label>
                    <div class="col-sm-4">
                        <!-- FIXED: Changed key to use the local $membership_number variable -->
                        <select name="team1_positions[<?= $membership_number ?>]" class="form-control" required>
                            <option value="" disabled selected hidden>Please choose a position</option>
                            <option value="Goalkeeper">Goalkeeper</option>
                            <option value="Right fullback">Right fullback</option>
                            <option value="Left fullback">Left fullback</option>
                            <option value="Center Back">Center back</option>
                            <option value="Sweeper">Sweeper</option>
                            <option value="Holding Midfielder">Holding Midfielder</option>
                            <option value="Right Winger">Right Winger</option>
                            <option value="Central Midfielder">Central Midfielder</option>
                            <option value="Striker">Striker</option>
                            <option value="Attacking Midfielder">Attacking Midfielder</option>
                            <option value="Left Winger">Left Winger</option>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>


    <h3>Assign Positions for Team 2: <?= $_SESSION['team2']->name ?></h3>
    <div class="form-group">
        <?php foreach($_SESSION['players2'] as $player): ?>
            <?php $membership_number = $player->membership_number; ?>
            <!-- Check if this specific player ID was chosen by the user in the previous step -->
            <?php if(in_array($membership_number, $data['team2_players'] ?? [])): ?>
                <div class="form-group row">
                    <label class="col-sm-4">Select Position for <?= $player->first_name . " " . $player->last_name ?></label>
                    <div class="col-sm-4">
                        <!-- Dropdown to select their position for this session -->
                        <select name="team2_positions[<?= $player->membership_number ?>]" class="form-control" required>
                            <option value="" disabled selected hidden>Please choose a position</option>
                            <option value="Goalkeeper">Goalkeeper</option>
                            <option value="Right fullback">Right fullback</option>
                            <option value="Left fullback">Left fullback</option>
                            <option value="Center Back">Center back</option>
                            <option value="Sweeper">Sweeper</option>
                            <option value="Holding Midfielder">Holding Midfielder</option>
                            <option value="Right Winger">Right Winger</option>
                            <option value="'Central Midfielder">Central Midfielder</option>
                            <option value="Striker">Striker</option>
                            <option value="Attacking Midfielder">Attacking Midfielder</option>
                            <option value="Left Winger">Left Winger</option>
                        </select>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Submit Positions</button>
</form>


<?php require APPROOT . '/views/includes/footer.php';  ?>