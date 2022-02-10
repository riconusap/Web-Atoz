 <!--==================== PROJECTS ====================-->
        <section class="place section" id="place">
            <h2 class="section__title">Our Projects</h2>
            <div class="place__container container grid">
                <!--==================== PROJECTS CARD 3 ====================-->
                <?php 
                $sql_project = mysqli_query($konek, "SELECT * FROM project") or die(mysqli_error($konek)); 
                    while ($data = mysqli_fetch_array($sql_project)) :
                ?>
                <div class="place__card">
                    <img src="<?php echo strtoupper($hostname) ?>assets/img/project/<?php echo $data['thumbnail'] ?>" alt="" class="place__img">
                    
                    <div class="place__content">
                        <span class="place__rating">
                            <i class="ri-star-line place__rating-icon"></i>
                            <span class="place__rating-number"><?php echo $data['lokasi'] ?> | <?php echo $data['tahun'] ?></span>
                        </span>

                        <div class="place__data">
                            <h3 class="place__title"><?php echo $data['nama_event'] ?></h3>
                            <!-- <span class="place__subtitle">TELKOM INDONESIA
                                INDIHOME</span> -->
                        </div>
                    </div>

                    <button class="button button--flex place__button">
                        <a href="index.php?page=project_library&id=<?php echo $data['id_project'] ?>">
                            <i class="ri-arrow-right-line"></i>
                        </a>
                    </button>
                </div>
                <?php endwhile; ?>
            </div>
        </section>