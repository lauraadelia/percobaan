<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<!-- Page Heading -->
<!-- Content Row -->
<?= $this->include("include/error") ?>
<div class="card mb-4">
    <div class="card-header text-primary font-weight-bold">
        Data Catatan Perjalanan
    </div>
    <div class="card-body">
        
    <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal</th>
                                            <th>Waktu</th>
                                            <th>Lokasi</th>
                                            <th>Suhu</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach (array_reverse($catatanperjalanan["result"]) as $k=>$v)
                                        {
                                            ?>
                                            <tr>
                                                <td><?= $v[$catatanperjalanan["column"]["tanggal"]] ?></td>
                                                <td><?= $v[$catatanperjalanan["column"]["waktu"]] ?></td>
                                                <td><?= $v[$catatanperjalanan["column"]["lokasi"]] ?></td>
                                                <td><?= $v[$catatanperjalanan["column"]["suhu"]] ?></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script>
$(document).ready(function() {
  $('#dataTable').DataTable();
});

</script>
<?= $this->endSection() ?>