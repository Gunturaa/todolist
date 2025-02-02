<?php require_once "../templates/navbar_user.php";

$cekSumWp = "SELECT * FROM workspace WHERE id_user = $cekIdUser";
$SumWp = mysqli_num_rows(mysqli_query($link, $cekSumWp));

function cekPersen(String $status)
{
    global $link, $cekIdUser;
    $cekBagian = "SELECT * FROM workspace JOIN todo ON todo.id_goal = workspace.id_goal WHERE status = '$status' AND id_user = $cekIdUser";
    $sumBagian = mysqli_num_rows(mysqli_query($link, $cekBagian));

    $cekJumlah = "SELECT * FROM workspace JOIN todo ON todo.id_goal = workspace.id_goal WHERE id_user = $cekIdUser";
    $sumJumlah = mysqli_num_rows(mysqli_query($link, $cekJumlah));

    return $sumJumlah == 0 ? 0 : round($sumBagian / $sumJumlah * 100);
}
?>

<div class="content-wrapper bg-light">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-4 align-items-center">
                <div class="col-md-6">
                    <h1 class="m-0 fw-bold text-primary">Dashboard</h1>
                </div>
                <div class="col-md-6 text-end">
                    <nav>
                        <ol class="breadcrumb bg-white p-2 rounded shadow-sm">
                            <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-primary">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row g-3">
                <div class="col-lg-12 col-md-6">
                    <div class="card shadow border-0 p-3 text-white bg-info">
                        <div class="card-body d-flex align-items-center justify-content-between">
                            <div>
                                <h3 class="fw-bold"><?= $SumWp; ?></h3>
                                <p class="mb-0">Total Workspace</p>
                            </div>
                            <i class="fas fa-calendar fa-3x"></i>
                        </div>
                        <div class="card-footer bg-transparent border-0 text-center">
                            <a href="index?page=add_workspace" class="btn btn-light text-info fw-bold">Buat Workspace & Todo Baru <i class="fas fa-plus"></i></a>
                        </div>
                    </div>
                </div>

                <?php
                $statuses = [
                    "selesai" => ["color" => "success", "text" => "Pekerjaan Telah Selesai", "icon" => "fa-calendar-check"],
                    "belum" => ["color" => "warning", "text" => "Pekerjaan Yang Akan Datang", "icon" => "fa-calendar-alt"],
                    "telat" => ["color" => "danger", "text" => "Pekerjaan Terlambat", "icon" => "fa-calendar-times"]
                ];
                foreach ($statuses as $status => $data): ?>
                    <div class="col-lg-4 col-md-6">
                        <div class="card shadow border-0 p-3 text-white bg-<?= $data['color']; ?>">
                            <div class="card-body d-flex align-items-center justify-content-between">
                                <div>
                                    <h3 class="fw-bold"><?= cekPersen($status); ?><sup style="font-size: 20px">%</sup></h3>
                                    <p class="mb-0"><?= $data['text']; ?></p>
                                </div>
                                <i class="fas <?= $data['icon']; ?> fa-3x"></i>
                            </div>
                            <div class="card-footer bg-transparent border-0 text-center">
                                <a href="#" class="btn btn-light text-<?= $data['color']; ?> fw-bold">More Info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>

<?php require_once "../templates/footer.php"; ?>