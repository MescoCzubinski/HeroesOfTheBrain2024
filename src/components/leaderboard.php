<div class="w-32 text-left m-2">
        <div class=" text-secondary-100 text-center text-xl pb-2">Top players</div>
        <?php
            $sql = "SELECT id, score, games FROM users ORDER BY score/games DESC LIMIT 9";
            $result = $DB->query(query: $sql);

            $pleace = 0;
            while($row = $result->fetch_assoc()):
                $pleace += 1;
        ?>
        <div class=" border-t-2 mb-2 pt-1 border-primary-300 player">
            <div class=" flex justify-between">
                <div class=" text-2xl pl-1 player-place gap-3"> <?php echo $pleace."." ?></div>
                <div class=" text-2xl text-secondary-100 pr-1"><?php echo $row['id'] ?></div>
            </div>
            <div>
                <div class=" flex justify-between player-stats">
                    <div class=" pl-1">
                        <i class="demo-icon icon-crown"></i>
                    <?php echo $row['score'] ?></div>
                    <div class=" pr-1">
                        <i class="demo-icon icon-gamepad"></i>
                    <?php echo $row['games'] ?></div>
                </div>
            </div>
        </div>
        <?php
            endwhile;
        ?> 
    </div>