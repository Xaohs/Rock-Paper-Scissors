<?php

session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Rock Paper Scissors</title>
	<link rel="shortcut icon" href="C:\xampp\htdocs\School\favicon.ico">
	<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
<?php
if (isset($_GET['P1'])) {
    $_SESSION['player1'] = $_GET['P1'];
} else if (isset($_GET['P2'])) {
    $CPU = $_GET['P2'];
}
if (isset($_POST['gamemode']) && $_POST['gamemode'] == "1v1") {
    $_SESSION['gamemode'] = "1v1";
	$_SESSION['status'] = "ingame";
} else if (isset($_POST['gamemode']) && $_POST['gamemode'] == "1vCPU") {
    $_SESSION['gamemode'] = "1vCPU";
	$_SESSION['status'] = "ingame";
} else if (empty($_SESSION['status'])) {
    ?>
	<h1>Select Gamemode</h1>
	<form method="post" action="game.php">
		<a><button type="submit" name="gamemode" value="1v1">Player versus Player</button></a><br>
		<a><button type="submit" name="gamemode" value="1vCPU">Player versus Professional Robot</button></a>
	</form>
	<?php
}
if (isset($_SESSION['gamemode']) && $_SESSION['gamemode'] == "1v1") {?>
    <form action="kill.php">
        <button type="submit">Give up</button>
    </form>
		<div class="p1">
			<div class="headersP1">
				<h1>Player 1</h1>
				</div>
					<a href="game.php?P1=Rock"><button class="rps"><img src="rock.png"></button></a>
					<a href="game.php?P1=Paper"><button class="rps"><img src="paper.png"></button></a>
					<a href="game.php?P1=Scissors"><button class="rps"><img src="scissors.png"></button></a>
		</div>
		<div class="p2">
			<div class="headersP2">
				<h1>Player 2</h1>
				</div>
					<a href="game.php?P2=Rock"><button class="rps"><img src="rock.png"></button></a>
					<a href="game.php?P2=Paper"><button class="rps"><img src="paper.png"></button></a>
					<a href="game.php?P2=Scissors"><button class="rps"><img src="scissors.png"></button></a>
		</div>
	<?php
}
if (isset($_SESSION['gamemode']) && $_SESSION['gamemode'] == "1vCPU") {?>
    <form action="kill.php">
        <button type="submit">Give up</button>
    </form>
		<div class="p1">
			<div class="headersP1">
				<h1>Player 1</h1>
				<?php if (isset($_SESSION['player1'])) {
    				?><h1 class="selected">&nbsp- <?=$_SESSION['player1']?></h1><?php
				}
    			?>
				</div>
					<a href="game.php?P1=Rock"><button class="rps"><img src="rock.png"></button></a>
					<a href="game.php?P1=Paper"><button class="rps"><img src="paper.png"></button></a>
					<a href="game.php?P1=Scissors"><button class="rps"><img src="scissors.png"></button></a>
		</div>
	<?php
}
if (isset($_SESSION['player1']) && isset($CPU) && $_SESSION['gamemode'] == "1v1") {
    if ($_SESSION['player1'] === $CPU) {
        ?> <h1 class="result"> <?='<br>Result: Tie!';?></h1><?php
	} else if ($_SESSION['player1'] === "Rock") {
        if ($CPU === "Scissors") {
            ?> <h1 class="result"> <?='<br>Result: Player 1 wins';?></h1><?php
		} else {
            ?> <h1 class="result"> <?='<br>Result: Player 2 wins';?></h1><?php
		}
    } else if ($_SESSION['player1'] === "Paper") {
        if ($CPU === "Rock") {
            ?> <h1 class="result"> <?='<br>Result: Player 1 wins';?></h1><?php
		} else {
            if ($CPU === "Scissors") {
                ?> <h1 class="result"> <?='<br>Result: Player 2 wins';?></h1><?php
			}
        }
    } else if ($_SESSION['player1'] === "Scissors") {
        if ($CPU === "Rock") {
            ?> <h1 class="result"> <?='<br>Result: Player 2 wins';?></h1><?php
		} else {
            if ($CPU === "Paper") {
                ?> <h1 class="result"> <?='<br>Result: Player 1 wins';?></h1><?php
			}
		}
    }
}
if (isset($_SESSION['player1']) && $_SESSION['gamemode'] == "1vCPU") {
    $CPUChoice = array('Rock', 'Paper', 'Scissors');
    shuffle($CPUChoice);
    $CPU = $CPUChoice[0];
    if ($_SESSION['player1'] === $CPU) {
        ?> <h1 class="result"> <?='<br>Result: Tie!';?></h1><?php
	} else if ($_SESSION['player1'] === "Rock") {
        if ($CPU === "Scissors") {
            ?> <h1 class="result"> <?='<br>Result: Player 1 wins';?></h1><?php
		} else {
            ?> <h1 class="result"> <?='<br>Result: Player 2 wins';?></h1><?php
		}
    } else if ($_SESSION['player1'] === "Paper") {
        if ($CPU === "Rock") {
            ?> <h1 class="result"> <?='<br>Result: Player 1 wins';?></h1><?php
		} else {
            if ($CPU === "Scissors") {
                ?> <h1 class="result"> <?='<br>Result: Player 2 wins';?></h1><?php
			}
		}
    } else if ($_SESSION['player1'] === "Scissors") {
        if ($CPU === "Rock") {
            ?> <h1 class="result"> <?='<br>Result: Player 2 wins';?></h1><?php
		} else {
            if ($CPU === "Paper") {
                ?> <h1 class="result"> <?='<br>Result: Player 1 wins';?></h1><?php
			}
        }
    }
}
?>
</div>
</body>
</html>
