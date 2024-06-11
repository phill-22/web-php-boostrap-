<div class="row mb-3" id="top">
    <div class="col">
        <h3>Pilih Karyawan</h3>
    </div>
    <div class="col">
        <a href="javacript:history.back()" class="btn btn-primary float-end">
            <i class="fab fa-arrow-circle-left"></i>
            Kembali
        </a>
    </div>
</div>
<div class="row mb-3" id="content">
    <div class="col">
        <?php
        include "database/connection.php";
        $no = 1;
        $select_sql = "SELECT K.*,B.nama nama_bagian FROM karyawan K LEFT JOIN bagian B on K.bagian_id = B.id";
        $result = mysqli_query($connection, $select_sql);
        if (!$result) {
        ?>
            <div class="alert alert-danger" role="alert">
                <?php echo mysqli_error($connection) ?>
            </div>
        <?php
            return;
        }
        if (mysqli_num_rows($result) == 0) {
        ?>
            <div class="alert alert-ligght" role="alert">
                Data Kosong
            </div>
        <?php
            return;
        }
        ?>
        <table class="table bg-white rounded shadow-sm table-hover">
            <thead>
                <tr>
                    <th scope="col">NIK</th>
                    <th scope="col">Nama Karywan</th>
                    <th scope="col">Bagian</th>
                    <th scope="col" class="text-end">Gaji Pokok</th>
                    <th scope="col" width="200">Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="align-midle">
                        <th scope="row"><?php echo $row["nik"] ?></th>
                        <td><?php echo $row["nama"] ?></td>
                        <td class="text-end"><?php echo number_format($row["gaji_pokok"]) ?></td>
                        <td>
                            <a href="?page=penggajian_tambah&nik=<?php echo $row["nik"] ?>" class="btn btn-success">
                                <i class="fa fa-arrow-circle-left"></i>
                                Pilih
                            </a>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</div>