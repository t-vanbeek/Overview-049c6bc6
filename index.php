<!DOCTYPE html>
<html>

<head>
    <title>netland</title>
    <meta charset="UTF-8">
</head>

<body>

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
          throw new \PDOException($e->getMessage(), (int)$e->getCode());
     }

    echo $pdo->query('select version()')->fetchColumn() . PHP_EOL;
    // print_r ($pdo->query('select * from series WHERE rating = 5')->fetchAll());
    ?>

</body>

</html>