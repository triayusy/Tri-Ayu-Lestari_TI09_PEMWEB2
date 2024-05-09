<?php
$praktikum = [
    "praktikum1" => "praktikum1.php",
    "praktikum2" => "praktikum2.php",
    "praktikum3" => "praktikum3.php",
]
?>
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Puskesmas Jati Asih</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="<?= $url ?>index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Page
    </div>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=  $url ?>kelurahan">
        <i class="fa-solid fa-building-columns"></i>
        <span>Kelurahan</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=  $url ?>pasien">
        <i class="fa-solid fa-person"></i>
            <span>Pasien</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=  $url ?>periksa">
        <i class="fa-solid fa-stethoscope"></i>
            <span>Periksa</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=  $url ?>paramedik">
        <i class="fa-solid fa-user-doctor"></i>
        <span>Paramedik</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="<?=  $url ?>unit_kerja">
        <i class="fa-solid fa-hospital"></i>
            <span>Unit Kerja</span>
        </a>
    </li>

</ul>

<script src="https://kit.fontawesome.com/b6bbd8ea5b.js" crossorigin="anonymous"></script>
