<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 19.8.2016
 * Time: 15:56
 */
require '../includes/init.php';

$starting_day = calendar_day();
$shift = new Shift();
$all_shifts = $shift->get_all_shifts_with_pause();
$worker = new Users();
$all_workers = $worker->get_all_users();


if(isset($_POST["save"])){
    $tmp_array = $_POST["selected_shift"];
    /*foreach ($tmp_array as $tmp) {
        if ($tmp > 0 ) {
            echo "$tmp <br/>";
        }
    }*/
    $curr_user = get_object_by_id(1,$all_workers);
    echo $curr_user->firstname;
}


?>
<head>
    <meta charset="UTF-8">
    <style>
        table,td, tr,select, option {
            border: solid 1px black;
            text-align: center;
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
    <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
        <tbody>
        <?php foreach( $all_workers as $aw) {?>
            <tr>
                <td name="<?php echo $aw->id?>"> <?php echo $aw->firstname.' '.$aw->lastname?></td>
                <?php
                for ($i = 0; $i < 7; $i++) {
                    $curr_day = clone $starting_day;
                    $add_day = 'P' . $i . 'D';
                    $curr_day->add(new DateInterval($add_day));
                    $curr_day_formated = $curr_day->format('d.m.Y'); ?>
                    <td value="<?php echo $curr_day_formated ?>">
                        <select name="selected_shift[]">
                            <option value="0">/</option>
                            <?php foreach ($all_shifts as $as) { ;?>

                                <option value="<?php echo $aw->id.'__'.$as->id.'__'.$curr_day_formated ;?>"><?php echo "$as->name ($as->pst)" ?></option>

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

<br>
<input type="submit" name="save" value="Sacuvaj">

</form>
</body>
</html>
