<?php
/**
 * Created by PhpStorm.
 * User: petar
 * Date: 24.8.2016
 * Time: 13:40
 */

require '../../includes/init.php';


//
//echo $user->print_user();
$un="";$fn="";$ln="";$em="";$pw="";$mc="";
$user = new Users();
$all_users = $user->get_all_users();
$role = new Role();
$all_roles = $role->get_all_roles();

if (isset($_POST["save"])) {
    $un = $_POST["uname"];
    $fn = $_POST["fname"];
    $ln = $_POST["lname"];
    $ri = $_POST["role"];
    $em = $_POST["email"];
    $pw = crypt($_POST["pwd"]);
    $mc = $_POST["code"];

    $new_user = new Users($un, $fn, $ln, $ri, $em, $pw, $mc);
    if ($new_user->check_username() == true ){
        echo "Izabrano korisnicko ime vec postoji molimo vas unesite drugo!";
    } else {
        $new_user->add_user();

        $un="";$fn="";$ln="";$em="";$pw="";$mc="";

        header("Location: users.php");
    }
}

if (isset($_POST["delete"])) {
    $delete_id = $_POST["delete"];
    $user->delete_user_by_id($delete_id);
    header("Location: users.php");
}

?>

<html>
<head>

</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
    <h3>Dodaj novog zaposlenog:</h3>
    <h4>* Obavezna polja :</h4>

    Korisnicko ime :
    <input type="text" name="uname" value="<?php echo $un?>" required>
    Ime :
    <input type="text" name="fname" value="<?php echo $fn?>" required>
    Prezime :
    <input type="text" name="lname" value="<?php echo $ln?>" required>
    Rola/uloga :
    <select name="role">
        <?php foreach ($all_roles as $ar) { ?>
            <option
                value="<?php echo $ar->id ?>" <?php echo ($ar->id == 3) ? "selected" : ""; ?>><?php echo $ar->name ?></option>
        <?php } ?>
    </select><br/>
    <h4>Ostala polja :</h4>
    Email :
    <input type="email" name="email" value="<?php echo $em?>" >
    Sifra :
    <input type="password" name="pwd" value="<?php echo $pw?>" required>
    Mozzart kod :
    <input type="text" name="code" value="<?php echo $mc?>" ><br/><br/>
    <input type="submit" value="Sacuvaj" name="save">

</form>

<br>
<?php if (!empty($all_users)) { ?>
    <h2>Postojeci korisnici</h2>
    <table border="1px ">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <thead>
            <tr><strong>
                    <td>Ime</td>
                    <td>Prezime</td>
                    <td>Korisnicko ime</td>
                    <td>Rola/Uloga</td>
                    <td>email</td>
                    <td>Mozzart kod</td>
                </strong>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($all_users as $au) { ?>
                <tr>
                    <td><?php echo $au->firstname ?></td>
                    <td><?php echo $au->lastname?></td>
                    <td><?php echo $au->username?></td>
                    <td><?php echo $au->name?></td>
                    <td><?php echo $au->email?></td>
                    <td><?php echo $au->mzcode?></td>
                    <td>
                        <button type="submit" value="<?php echo $au->id; ?>" name="delete">Obrisi</button>
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
