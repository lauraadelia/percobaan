<?php
if (session()->get("gagal")) {
    ?>
    <div class="alert alert-danger"><?= session()->get("gagal") ?></div>
    <?php
}
if (session()->get("berhasil")) {
    ?>
    <div class="alert alert-success"><?= session()->get("berhasil") ?></div>
    <?php
}