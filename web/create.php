<?php include "templates/header.php"; ?>
<?php include "templates/footer.php"; ?>
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

<a href="index.php">Tilbake</a>