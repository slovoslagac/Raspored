<!DOCTYPE html>
<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 23.8.2016
 * Time: 10:50
 */

require '../../includes/init.php';


$start = "";
$end = "";
$shift = new Shift();
$all_shifts = $shift->get_all_shifts_with_pause();
$pause = new Pause();
$all_pauses = $pause->get_all_pauses();


if (isset($_POST["save"])) {
    $start = $_POST["start"];
    $end = $_POST["end"];
    $parts = explode(";",$_POST["pwdid"]);
    $pid=$parts[0];
    $pids=$parts[1];
    $pide=$parts[2];
    if ($end > $start) {
        if($end > $pide && $pids > $start ) {
            $new_shift = new Shift($start, $end, $pid);
            $new_shift->add_shift();
            header("Location: shifts.php");
        } else {
            echo "Pauza mora da bude u okviru radnog vremena";
        }
    } else {
        echo "Kraj smene mora da bude posle pocetka smene";
    }
}

if (isset($_POST["brisanje"])) {
    $delete_id = $_POST["brisanje"];
    $shift->delete_shift_by_id($delete_id);
    header("Location: shifts.php");
}
?>
<html>
<head>

</head>
<body>
<h3>Dodaj novu smenu :</h3>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="time" name="start" value="<?php echo $start ?>">
    <input type="time" name="end">
    <select name="pwdid">
        <?php foreach ($all_pauses as $ap) { ?>
            <option value="<?php echo "$ap->id;$ap->start_time;$ap->end_time"?>"><?php echo "$ap->start_time - $ap->end_time" ?></option>

        <?php } ?>
    </select>
    <input type="submit" name="save" value="Sacuvaj">
</form>
<br/>

<?php if (!empty($all_shifts)) { ?>
    <h2>Postojece smene :</h2>
    <table border="1px ">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <thead>
            <tr><strong>
                <td>Pocetak smene</td>
                <td>Kraj smene</td>
                <td>Pauza</td>
                </strong>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_shifts as $as) { ?>
                <tr>
                    <td><?php echo $as->sst; ?></td>
                    <td><?php echo $as->sset; ?></td>
                    <td> <?php echo "$as->pst - $as->pet"; ?></td>
                    <td>
                        <button type="submit" value="<?php echo $as->id; ?>" name="brisanje">Obrisi</button>
                    </td>
                </tr>
                <?php
            }

            ?>
            </tbody>
        </form>
    </table>
<?php } ?>
</body>
</html>


