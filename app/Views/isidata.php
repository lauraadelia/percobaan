<?= $this->extend("layout/main") ?>
<?= $this->section("content") ?>
<!-- Page Heading -->
<!-- Content Row -->
<?= $this->include("include/error") ?>
<div class="card mb-4">
    <div class="card-header text-primary font-weight-bold">
        Isi Data Catatan Perjalanan
    </div>
    <div class="card-body">
        <form method="post" action="<?= base_url("/isidata/add") ?>">
            <div class="mb-4">
                <p>Tanggal</p>
                <input name="tanggal" type="date" class="form-control" placeholder="Tanggal">
            </div>
            <div class="mb-4">
                <p>Waktu</p>
                <input name="waktu" type="time" class="form-control" placeholder="Waktu">
            </div>
            <div class="mb-4">
                <p>Lokasi</p>
                <input name="lokasi" type="text" class="form-control" placeholder="Lokasi">
            </div>
            <div class="mb-4">
                <p>Suhu</p>
                <input name="suhu" type="number" class="form-control" placeholder="Suhu">
            </div>
            <button class="btn btn-success">Simpan</button>
        </form>
    </div>
</div>

<?= $this->endSection() ?>