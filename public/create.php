<?php require "views/header.php"; ?>

<?php

/**
 * Use an HTML form to create a new entry in the
 * users table.
 *
 */


if (isset($_POST['submit'])) {
	require "../config.php";
	require "../common.php";
	/**require "../install.php";*/

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
	
}
?>



<?php if (isset($_POST['submit']) && $statement) { ?>
	<blockquote><?php echo $_POST['firstname']; ?> successfully added.</blockquote>
<?php } ?>

<h2>Legg til en person</h2>

<form method="post">
	<label for="firstname">Fornavn</label>
	<input type="text" name="firstname" id="firstname">
	<label for="lastname">Etternavn</label>
	<input type="text" name="lastname" id="lastname">
	<label for="email">Email Addresse</label>
	<input type="text" name="email" id="email">
	<label for="tlf">Telefonnummer</label>
	<input type="text" name="tlf" id="tlf">
	<label for="fdato">Fødselsdato</label>
	<input type="text" name="fdato" id="fdato">
	<input type="submit" name="submit" value="Submit">
</form>

<a href="index.php">Back to home</a>

<?php require "templates/footer.php"; ?>