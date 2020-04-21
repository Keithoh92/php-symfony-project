<?php
if(empty($homePageStyle)) $homePageStyle = '';
if(empty($auctionsPageStyle)) $auctionsPageStyle = '';
if(empty($categoriesPageStyle)) $categoriesPageStyle = '';
if(empty($loginPageStyle)) $loginPageStyle = '';

?>

<!doctype html>
                <html lang="en">
                <head>
                    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <title>Charity Auctions - <?= $pageTitle ?></title>
                    <meta charset="utf-8">


                </head>
                <body class="container-fluid bg-light">

                <header class="bg-light">
                    <div class="mx-auto text-uppercase text-info text-danger font-italic page-header" style="width: 150px; height: 80px;">

                        <strong>E-Scores Dublin</strong>

                    </div>



                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column flex-sm-row">
                        <ul class="nav nav-pills">
                            <div class="btn-toolbar mx-2 ">
                                <li class="nav-item<?= $homePageStyle ?>">
                                    <a href="/index.php?action=home" class="flex-sm-fill text-sm-center nav-link active bg-danger text-white">Home</a>
                                </li>
                            </div>
                            <div class="btn-toolbar mx-2 ">
                                <li class="nav-item<?= $auctionsPageStyle ?>">
                                    <a href="/index.php?action=auctions" class="flex-sm-fill text-sm-center nav-link active bg-danger text-white">Leagues</a>
                                </li>
                            </div>
                            <div class="btn-toolbar mx-2">
                                <li class="nav-item<?= $categoriesPageStyle ?>">
                                    <a href="/index.php?action=categories" class="flex-sm-fill text-sm-center nav-link active bg-danger text-white">Clubs</a>
                                </li>
                            </div>
                            <div class="btn-toolbar mx-2">
                                <li class="nav-item<?= $loginPageStyle ?>">
                                    <a href="/index.php?action=login" class="flex-sm-fill text-sm-center nav-link active bg-danger text-white">Results</a>
                                </li>
                            </div>
                        </ul>

                    </nav>
                    <main class="mb-5">
                        <div class="container-fluid">
                            <div class="page-header">