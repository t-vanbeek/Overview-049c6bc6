<?php
$host = 'localhost';
$db   = 'netland';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int) $e->getCode());
}

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css" />
    <title>netland</title>
    <meta charset="UTF-8">
</head>

<body>
    <h2 class="titel">Series</h2><br>
    <div class="series">

        <div class="serietitel">
            <h4>Title</h4>
            <span class="serietitels">
                <?php
                $stmt = $pdo->query('SELECT title FROM series');
                foreach ($stmt as $row) {
                    echo "" . $row['title'] . "<br>";
                }
                ?>
            </span>
        </div>
        <div class="serierating">
            <h4>Rating</h4>
            <?php
            $stmt = $pdo->query('SELECT rating FROM series');
            foreach ($stmt as $row) {
                echo "" . $row['rating'] . "<br>";
            }
            ?>
        </div>
    </div>
    <div class="middenstuk">

    </div>
    <h2 class="titel">Films</h2><br>
    <div class="films">

        <div class="filmtitel">
            <h4>Title</h4>
            <span class="filmtitels">
                <?php
                $stmt = $pdo->query('SELECT title FROM movies');
                foreach ($stmt as $row) {
                    echo "" . $row['title'] . "<br>";
                }
                ?>
            </span>
        </div>
        <div class="filmduur">
            <h4>Duur</h4>
            <?php
            $stmt = $pdo->query('SELECT duur FROM movies');
            foreach ($stmt as $row) {
                echo "" . $row['duur'] . "<br>";
            }
            ?>
        </div>
    </div>
</body>

</html>