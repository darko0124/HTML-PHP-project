<html>
<head>
<meta charset="UTF-8">
<title></title>
</head>
<body>
<?php
include 'config.php';
if (isset($_POST["submit"])) {
    $bookID = $_POST['bookID'];
    $booktitle = $_POST['booktitle'];
    $yearofpublishment = $_POST['yearofpublishment'];
    $numberofbooks = $_POST['numberofbooks'];
    $sql = "UPDATE Book SET ";
    if (!empty($booktitle)) {
        $sql .= "Book_title='$booktitle', ";
    }
    if (!empty($yearofpublishment)) {
        $sql .= "Year_of_publishment='$yearofpublishment', ";
    }
    if (!empty($numberofbooks)) {
        $sql .= "Numberofbooks='$numberofbooks', ";
    }
    $sql = rtrim($sql, ", ");
    $sql .= " WHERE Book_ID='$bookID'";
    mysqli_query($dbConn, $sql);
}
$result= mysqli_query($dbConn, "SELECT * FROM Book");
echo '<ol>';
while ($row = mysqli_fetch_array($result)) {
    echo '<li>'.$row['Book_title'].'- Година на издаване:'.$row['Year_of_publishment'].'- Останали бройки:'.$row['Numberofbooks'].'</li>';
}
echo '</ol>';
?>
<form method="post">
    Пореден номер на книга :<input type="text" name="bookID" placeholder="Пореден номер на книгата"><br>
    Заглавие на книга:<input type="text" name="booktitle" placeholder="Ново заглавие на книгата"><br>
    Година на издаване:<input type="text" name="yearofpublishment" placeholder="Нова година на издаване"><br>
    Останали бройки:<input type="text" name="numberofbooks" placeholder="Нов брой налични книги"><br>
    <input type="submit" name="submit" value="Актуализирай книга"><br>
</form>
<a href="index.php">Обратно към начало</a>
</body>
</html>
