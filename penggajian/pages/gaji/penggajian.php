<div id="top" class="row mb-3">
    <div class="col">
        <h3>penggajian</h3>
    </div>
    <div class="col">
        <a href="?page=pilih_karyawan_penggajian" class="btn btn-success float-end">
            <i class="fa fa-plus-circle"></i>
            Tambah
        </a>
        <div class="col">
            <a href="?page=pilih_bulan_tahun_penggajian" class="btn btn-primary float-end">
                <i class="fa fa-arrow-alt-circle-left"></i>
                Kembali
            </a>
        </div>
    </div>
</div>
<div id="content" class="row mb-3">
    <div class="col">
        <?php
        include "database/connection.php";

        $no = 1;
        $bulan = $_GET['bulan'];
        $tahun = $_GET['tahun'];

        $select_sql = "";
        if ($bulan == "semua") {
            if ($tahun == "semua") {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik";
            } else {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun = $tahun";
            }
        } else {
            if ($tahun != "semua") {
                $select_sql = "SELECT P.*, K.nama FROM penggajian P LEFT JOIN karyawan K ON P.karyawan_nik = K.nik WHERE tahun = $tahun AND blan = '$bulan'";
            }
        }

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
            <div class="alert alert-light" role="alert">
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
                    <th scope="col">NAMA</th>
                    <th scope="col">BULAN</th>
                    <th scope="col">TAHUN</th>
                    <th class="text-end" scope="col">GAJI DIBAYAR</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr class="align-middle">
                        <th scope="row"><?php echo $row["karyawan_nik"] ?></th>
                        <td><?php echo $row["nama"] ?></td>
                        <td><?php echo $row["bulan"] ?></td>
                        <td><?php echo $row["tahun"] ?></td>
                        <td class="text-end"><?php echo number_format($row["gaji_bayar"])  ?></td>
                        <td>
                            <a href="?page=penggajianhapus&id=<?= $row["id"] ?>&bulan<?= $bulan ?>&tahun=<?= $tahun ?>" onclick="javascript : return confirm('Konfirmasi data anda akan dihapus?')" class="btn btn-danger">
                                <i class="fa fa-trash"></i>
                                Hapus
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