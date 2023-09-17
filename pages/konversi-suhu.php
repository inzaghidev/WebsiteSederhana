<?php
    $page_title = "Temperature Conversion Calculator" ;
    include('../layouts/header.php') ;
    echo '<h1>Konversi Suhu</h1>';
?>

<form method="post">
		<label for="temperature">Enter temperature:</label>
		<input type="number" name="temperature" id="temperature" required>
		<select name="conversion" id="conversion">
            <option value="c_to_f" <?php if(isset($_POST['conversion']) && $_POST['conversion'] == 'c_to_f') echo 'selected'; ?>>Celsius to Fahrenheit</option>
			<option value="f_to_c" <?php if(isset($_POST['conversion']) && $_POST['conversion'] == 'f_to_c') echo 'selected'; ?>>Fahrenheit to Celsius</option>
		</select>
		<button type="submit">Convert</button>
</form>
<?php
	if(isset($_POST['temperature']) && isset($_POST['conversion'])){
		$temperature = $_POST['temperature'];
		$conversion = $_POST['conversion'];

        echo '<h1>Hasil</h1>';

		if($conversion == 'c_to_f'){
			$result = ($temperature * 9/5) + 32;
			echo "<p>$temperature&deg;C is $result&deg;F</p>";
		} elseif($conversion == 'f_to_c'){
			$result = ($temperature - 32) * 5/9;
			echo "<p>$temperature&deg;F is $result&deg;C</p>";
		}
	}
?>