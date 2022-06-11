<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title><?php $title ?></title>

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <style>
        body,
        h1 {
            font-family: "Raleway", sans-serif
        }

        .bgimg {
            background-image: url('/w3images/forestbridge.jpg');
            min-height: 100%;
            background-position: center;
            background-size: cover;
        }
    </style>

    
</head>

<body style="background: #000000 url(https://images.hdqwalls.com/download/blue-mountains-3-qhd-1920x1080.jpg) center top/cover no-repeat; ">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
        <a href="<?= base_url() . 'home' ?>" class="navbar-brand">Evaluation</a>
        <ul class="navbar-nav me-auto">
            <li class="nav-item">
                <a href="<?= base_url() . 'scores' ?>" class="nav-link">Scores</a>
            </li>
            <li class="nav-item">
                <a href="<?= base_url() . 'record' ?>" class="nav-link">Record</a>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto">
            <?php if ($this->session->logged_in) : ?>
                <li class="nav-item dropdown me-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $this->session->name ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="<?= base_url() . 'report' ?>" class="dropdown-item">Report</a></li>
                        <li><a href="<?= base_url() . 'scores/evaluation' ?>" class="dropdown-item">Evaluation</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="<?= base_url() . 'logins/logout' ?>" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            <?php elseif ($this->session->super_logged_in) : ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $this->session->name ?>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a href="<?= base_url() . 'pending' ?>" class="dropdown-item">Pending</a></li>
                        <li><a href="<?= base_url() . 'power' ?>" class="dropdown-item">Power</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a href="<?= base_url() . 'logins/logout' ?>" class="dropdown-item">Logout</a></li>
                    </ul>
                </li>
            <?php elseif (!$this->session->super_logged_in and !$this->session->logged_in) : ?>
                <li class="nav-item">
                    <a href="<?= base_url() . 'logins/login' ?>" class="nav-link">Login</a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
    <div class="container">

        <?php if ($this->session->flashdata('score_approved')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('score_approved') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('score_rejected')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('score_rejected') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('no_score')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('no_score') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('score_created')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('score_created') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('login_success')) : ?>
            <div class="alert alert-success" role="alert">
                <?= $this->session->flashdata('login_success') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('login_faild')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('login_faild') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('logged_out')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('logged_out') ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('rejected')) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $this->session->flashdata('rejected') ?>
            </div>
        <?php endif; ?>