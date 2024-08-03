<?php include("navbar.php") ?>

<div class="container-tv">
    <div class="logo-tv mx-auto text-center">
        <svg width="283" height="84" viewBox="0 0 283 84" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 21.886H25.9907C35.184 21.886 41.5617 26.4703 41.5617 32.7459C41.5617 37.0159 39.0234 40.4633 34.6827 42.3488C40.3992 44.5485 43.8014 48.6244 43.8014 53.3288C43.8014 60.2329 36.7731 65.002 26.9292 65.002H0V21.886ZM22.9512 38.9476C26.3533 38.9476 28.817 37.2562 28.817 34.9271C28.817 32.6073 26.3533 30.9714 22.9512 30.9714H12.3075V38.9383H22.9512V38.9476ZM24.8389 55.889C28.4543 55.889 31.0673 54.0682 31.0673 51.5635C31.0673 49.0496 28.465 47.238 24.8389 47.238H12.3075V55.8982H24.8389V55.889Z" fill="#DD1F26" />
            <path d="M103.799 65.132H86.0953V21.9251H96.9248L96.9619 55.4326L117 26.6775C111.173 13.8933 98.2773 5 83.3162 5C70.2819 5 58.8224 11.7441 52.2358 21.9251H83.3162V31.5503H69.55V65.132H58.7946V31.5503H47.8076C46.8349 34.8668 46.3069 38.3778 46.3069 42C46.3069 62.4361 62.8707 79 83.3069 79C103.743 79 120.307 62.4361 120.307 42C120.307 41.4534 120.288 40.9161 120.27 40.3788L103.799 65.132Z" fill="#202D61" />
            <path d="M132.202 64V22H141.922V56.08H162.982V64H132.202ZM171.413 64V22H181.133V64H171.413ZM206.525 64L188.405 22H198.905L214.745 59.2H208.565L224.645 22H234.305L216.125 64H206.525ZM249.751 38.92H269.971V46.48H249.751V38.92ZM250.471 56.2H273.331V64H240.811V22H272.551V29.8H250.471V56.2Z" fill="#062265" />
        </svg>
    </div>
</div>

<div class="jadwal-container">
    <div class="row">
        <div class="jadwal col-xl-6 col-lg-6 col-md-12">
            <div class="label">
                <img src="dist/img/label-dekstop.png" alt="">
                <h3 class="bold-heading4 pt-2">Jadwal</h3>
            </div>
            <div class="list-jadwal mb-3">
                <button data-day="Senin" onclick="showPage('Senin')">
                    <a class="semibold-heading6">Sen</a>
                </button>
                <button data-day="Selasa" onclick="showPage('Selasa')">
                    <a class="semibold-heading6">Sel</a>
                </button>
                <button data-day="Rabu" onclick="showPage('Rabu')">
                    <a class="semibold-heading6">Rab</a>
                </button>
                <button data-day="Kamis" onclick="showPage('Kamis')">
                    <a class="semibold-heading6">Kam</a>
                </button>
                <button data-day="Jumat" onclick="showPage('Jumat')">
                    <a class="semibold-heading6">Jum</a>
                </button>
                <button data-day="Sabtu" onclick="showPage('Sabtu')">
                    <a class="semibold-heading6">Sab</a>
                </button>
                <button data-day="Minggu" onclick="showPage('Minggu')">
                    <a class="semibold-heading6">Min</a>
                </button>
            </div>

            <?php
            date_default_timezone_set('Asia/Jakarta');
            $query = $koneksi->query("SELECT jadwal.*, acara.acara AS nama_acara FROM jadwal LEFT JOIN acara on jadwal.id_acara = acara.id");
            $arr_jadwal = array();
            while ($jadwal = $query->fetch(PDO::FETCH_ASSOC)) {
                $arr_jadwal[$jadwal['hari']][] = $jadwal;
            }
            $arr_hari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
            $current_time = date("H:i");
            ?>
            <?php foreach ($arr_hari as $hari) : ?>
                <div class="list-acara" id="<?= $hari; ?>">
                    <div class="list1">
                        <div class="text-jadwal">
                            <?php foreach ($arr_jadwal[$hari] as $value) :
                                // Extract start and end times from the 'jam' field
                                list($start_time, $end_time) = explode('-', $value['jam']);

                                // Check if the current time is within the range
                                $is_active_hours = (strtotime($start_time) <= strtotime($current_time)) && (strtotime($current_time) <= strtotime($end_time));

                                // Add the "active-hours" class if it's within the range
                                $wrapper_classes = 'text-jadwal-wrapper d-flex align-items-center';
                                $wrapper_classes .= $is_active_hours ? ' active-hours' : '';
                            ?>
                                <div class="<?= $wrapper_classes; ?>">
                                    <img src="dist/img/svg/jam-icon.svg" class="jam-icon">
                                    <img src="dist/img/svg/play-icon.svg" class="play-icon">
                                    <div class="hari-jam-wrapper w-100 d-flex flex-column pl-4">
                                        <p class="semibold-heading6"><?= $value['nama_acara']; ?></p>
                                        <p class="regular-heading6"><?= $value['jam']; ?></p>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <!-- Daftar acara lainnya -->
                </div>
            <?php endforeach; ?>
        </div>

        <div class="program-unggulan col-xl-6 col-lg-6 col-md-12 ">
            <div class="label">
                <img src="dist/img/label-dekstop.png" alt="">
                <h3 class="bold-heading4 pt-2">Program Unggulan</h3>
            </div>
            <div class="program">
                <?php
                $query = $koneksi->query("SELECT * FROM program_unggulan");
                while ($program_unggulan = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="program1">
                        <img src="admin/upload/program-unggulan/<?php echo $program_unggulan['image']; ?>" alt="" class="img-fluid">
                        <div class=" deskripsi-program">
                            <h1 class="semibold-heading5"><?php echo $program_unggulan['judul']; ?></h1>
                            <p class="regular-body-small"><?php echo $program_unggulan['deskripsi']; ?></p>
                            <p class="semibold-body-large"><?php echo $program_unggulan['jadwal']; ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div id="carouselExampleFade" class="slide carousel-fade" data-ride="carousel">
            <div class="carousel-inner">
                <?php
                $query = $koneksi->query("SELECT * FROM program_unggulan ORDER BY id DESC LIMIT 3");
                $first = true;
                while ($program_unggulan = $query->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="carousel-item <?php echo $first ? 'active' : ''; ?>">
                        <img src="admin/upload/program-unggulan/<?php echo $program_unggulan['image']; ?>" alt="">
                        <div class="deskripsi-program">
                            <h1 class="semibold-heading5"><?php echo $program_unggulan['judul']; ?></h1>
                            <p class="regular-body-small"><?php echo $program_unggulan['deskripsi']; ?></p>
                            <p class="semibold-body-large"><?php echo $program_unggulan['jadwal']; ?></p>
                        </div>
                    </div>
                <?php
                    $first = false;
                }
                ?>
            </div>
        </div>
    </div>
</div>

<div class="vidio-container" id="pagination-container">
    <div class="label">
        <img src="dist/img/label-dekstop.png" alt="">
        <h3 class="bold-heading3 pt-2">Vidio-terkini</h3>
    </div>

    <div class="container-video-terkini d-flex justify-content-around flex-wrap mt-3 mb-3">
        <?php
        include('api/youtube_api.php');
        if (!empty($videoList->items)) {
            foreach ($videoList->items as $item) {
                if (isset($item->id->videoId)) {
        ?>
                    <div class="video-terkini-wrap d-flex flex-column align-items-start">
                        <iframe style="border-radius: 16px;" width="293" height="165" src="https://www.youtube.com/embed/<?php echo $item->id->videoId; ?>" frameborder="0" allowfullscreen></iframe>
                        <div class="video-terkini-title pt-2">
                            <h4 class="semibold-body" style="width: 293px;"><?php echo $item->snippet->title; ?></h4>
                        </div>
                    </div>
        <?php
                }
            }
        } else {
            echo '<p class="error">' . $apiError . '</p>';
        }
        ?>
    </div>
</div>
