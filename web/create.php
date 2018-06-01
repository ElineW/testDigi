<?php include "templates/header.php"; ?>
<?php include "templates/footer.php"; ?>

<?php
if (isset($_POST['submit'])) {}
    if (isset($_POST['submit'])) {
        require "../config.php";
    
        try {
            $connection = new PDO($dsn, $username, $password, $options);

$new_user = array(
	"firstname" => $_POST['firstname'],
	"lastname"  => $_POST['lastname'],
	"email"     => $_POST['email'],
	"tlf"       => $_POST['tlf'],
	"fdato"  => $_POST['fdato']
);

$sql = sprintf(
		"INSERT INTO %s (%s) values (%s)",
		"users",
		implode(", ", array_keys($new_user)),
		":" . implode(", :", array_keys($new_user))
);

$statement = $connection->prepare($sql);
$statement->execute($new_user);
        } catch(PDOException $error) {
            echo $sql . "<br>" . $error->getMessage();
        }
        <a href="index.php">Tilbake </a>
    };
?>

