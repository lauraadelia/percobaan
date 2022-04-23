<?= $this->extend("layout/centerform") ?>
<?= $this->section("content") ?>
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Register</h1>
</div>
<?= $this->include("include/error") ?>
<form method="post" action="<?= base_url("/auth/register") ?>" class="user">
    <div class="form-group">
        <input type="text" name="nik" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="NIK">
    </div>
    <div class="form-group">
        <input type="text" name="nama" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Nama">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <div class="form-group">
        <input type="password" name="confirmation_password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Konfirmasi Password">
    </div>
    <button class="btn btn-primary btn-user btn-block">
        Register
    </button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="<?= base_url("/login") ?>">I already have an account!</a>
</div>
<?= $this->endSection() ?>