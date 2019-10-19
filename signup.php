<?php
    require "header.php";
?>

    <main>
	<div class="container-fluid p-2 m-auto bg-info">
        <h1>Sign-up</h1>
            <?php
                if(isset($_GET['error'])) {
                    if($_GET['error'] == "emptyfields") {
                        echo '<p>Fill in all fields!</p>';
                    }   
                    elseif($_GET['error'] == "invalidmailuid") {
                        echo '<p>Invalid username and e-mail!</p>';
                    }
                    elseif($_GET['error'] == "invalidmail") {
                        echo '<p>Invalid e-mail!</p>';
                    }
                    elseif($_GET['error'] == "invaliduid") {
                        echo '<p>Invalid username!</p>';
                    }
                    elseif($_GET['error'] == "passwordcheck") {
                        echo '<p>Your passwords do not match!</p>';
                    }
                    elseif($_GET['error'] == "usertaken") {
                        echo '<p>Username is already taken!</p>';
                    }
                }
                elseif(isset($_GET['signup']) == "success") {
                    echo '<p>Signup successful!</p>';
                }
            ?>
			
			
		<div class="container p-2 m-auto bg-white">
        <form action="includes/signup.inc.php" method="post">
			<div class = "form-group">
            <input type="text" name="username" placeholder="Username"><br>
            </div>
			<div class = "form-group">
			<input type="text" name="usermail" placeholder="E-mail"><br>
            </div>
			<div class = "form-group">
			<input type="text" name=firstname placeholder="First Name"><br>
			</div>
			<div class = "form-group">
			<input type="text" name=lastname placeholder="Last Name"><br>
            </div>
 		    <div class = "form-group">
			<input type="password" name="pwd" placeholder="Password"><br>
            </div>
			<div class = "form-group">
		    <input type="password" name="pwd-repeat" placeholder="Repeat password"><br>
            </div>
			<div class = "form-group">
			<select name="usertype">
            <option value="host">Host</option>
            <option value="occupant">Occupant</option>
            </select><br>
			</div>
            <button class="btn btn-info" type="submit" name="signup-submit">Signup</button><br>
        </form>
		</div>
	</div>
    </main>

<?php
    require "footer.php";
?>