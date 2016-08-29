<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 23.8.2016
 * Time: 10:50
 */

require '../../includes/init.php';
$starting_day = calendar_day();
$shift = new Shift();
$all_shifts = $shift->get_all_shifts_with_pause();
?>
<head>
    <style>
        table,td, tr {
            border: solid 1px black;
        }

    </style>

</head>
<html>
<head>

</head>
<body>
<table>
    <thead>
    <tr>
        <td>Radnik</td>
        <?php
        for ($i = 0; $i < 7; $i++) {
            $curr_day = clone $starting_day;
            $add_day = 'P' . $i . 'D';
            $curr_day->add(new DateInterval($add_day));
            $curr_day_formated = $curr_day->format('d.m.Y'); ?>
            <td><?php echo $curr_day_formated ?></td>

            <?php
        }
        ?>
    </tr>
    </thead>
    <tbody>
    <?php $worker = new Users(); $all_workers = $worker->get_all_users(); foreach( $all_workers as $aw) {?>
    <tr>
        <td name="<?php echo $aw->id?>"> <?php echo $aw->firstname.' '.$aw->lastname?></td>
        <?php
        for ($i = 0; $i < 7; $i++) {
            $curr_day = clone $starting_day;
            $add_day = 'P' . $i . 'D';
            $curr_day->add(new DateInterval($add_day));
            $curr_day_formated = $curr_day->format('d.m.Y'); ?>
            <td value="<?php echo $curr_day_formated ?>">
                <select>
                    <?php foreach ($all_shifts as $as) {$pause = $as->pst; echo $pause_formated = $pause->format('hh') ;?>

                        <option value="<?php echo "$as->id"?>"><?php echo "$as->sst - $as->sset ($pause_formated)" ?></option>

                    <?php } ?>
                </select>

            </td>

            <?php
        }
        ?>
    </tr>
    <?php } ?>
    </tbody>
</table>

</body>
</html>
