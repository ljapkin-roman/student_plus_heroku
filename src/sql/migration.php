<?php
define('DB_HOST', 'ec2-23-21-229-200.compute-1.amazonaws.com;dbname=d1t1cfll04msd3');
define('DB_USER', 'ojgnelfnhcyyly');
define('DB_PASSWORD', '66e87004ba3afdba0d431151c529c0b1b3ee9c06c1a975b57bdc1c2372a2076a');
define('DB_NAME', 'd1t1cfll04msd3');

function connectDB() {
    $error_message = "no connect to base data";
    $conn = new PDO("pgsql:host=ec2-23-21-229-200.compute-1.amazonaws.com;dbname=d1t1cfll04msd3", DB_USER, DB_PASSWORD);
    if (!$conn)
        throw new Exception($error_message);
    else {
        $sth = $conn->prepare("INSERT INTO persons (personid, lastname) values (:number, :lastname)");
        $number_user = 3;
        $last_name = 'Palamar';
        $sth->execute(array(':number' => $number_user, ':lastname' => $last_name));
        if (!$query) {
            print_r("query is not exist");
            throw new Exception($error_message);
        }
        else {
            print_r("gongragulation");
            return $conn;
        }
    }
}
$conn = connectDB();
