<link rel="stylesheet" href="css/table.css">
<main class="main container" id="main">
    <main class="table" id="customers_table">
        <section class="table__header">
            <h1>Danh sách phản hồi của người dùng</h1>
        </section>
        <?php
$sql_lietke_lh = "SELECT * FROM tbl_lienhe ORDER BY id_lienhe DESC";
$result_lietke_lh = mysqli_query($connect, $sql_lietke_lh);
?>
        <section class="table__body">
            <table>
                <thead>
                    <tr>
                        <th> Id <span class="icon-arrow"></span></th>
                        <th> Họ và tên <span class="icon-arrow"></span></th>
                        <th>Email<span class="icon-arrow"></span></th>
                        <th>Vấn đề<span class="icon-arrow"></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                   $i = 0;
                   while ($row = mysqli_fetch_array($result_lietke_lh)) {
                       $i++;
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $row['hovaten'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['vande'] ?></td>
                    </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</main>