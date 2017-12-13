<?php

$conn_string = "host=database port=5432 dbname=admin user=admin password=asdf";

do {
  $conn = pg_connect($conn_string, PGSQL_CONNECT_FORCE_NEW);
} while (!$conn);

$result = pg_query($conn, "SELECT inet_server_addr(), firstname, lastname FROM names");
if (!$result) {
  echo "An error occurred.\n";
  exit;
}

$hostname = gethostname();
echo "WWW hostname: $hostname </br>";

while ($row = pg_fetch_row($result)) {
  echo "DB IP: <b>$row[0]</b>&nbsp;&nbsp;&nbsp;&nbsp;Firstname: $row[1]  Lastname: $row[2]";
  echo "<br />\n";
}


pg_close($conn);
?>
