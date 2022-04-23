<?= $this->extend("layout/centerform") ?>
<?= $this->section("content") ?>
<div class="text-center">
    <h1 class="h4 text-gray-900 mb-4">Login</h1>
</div>
<?= $this->include("include/error") ?>
<form class="user" method="post" action="<?= base_url("/auth/login") ?>">
    <div class="form-group">
        <input type="text" name="nik" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="NIK">
    </div>
    <div class="form-group">
        <input type="password" name="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password">
    </div>
    <button class="btn btn-success btn-user btn-block">
        Login
    </button>
</form>
<hr>
<div class="text-center">
    <a class="small" href="<?= base_url("/register") ?>">Create an Account!</a>
</div>
<?= $this->endSection() ?>