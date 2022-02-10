  <!--==================== CONTACT ====================-->
        <section class="contact" id="contact">
            <img src="./assets/img/bg_contact.png" alt="" class="contact__img">

            <div class="contact__container container grid">
                <div class="contact__data">
                    <center><h1 class="contact__data-title"><?php echo $data['nama_perusahaan'] ?></h1></center>
                    <center><h2 class="data__contact__address"><?php echo $data['alamat'] ?></h2></center>
                </div>
            </div>
            
            <div class="container contact__data__container_cont">

                <div class="row contact__data__container container grid">

                    <div class="col contact__data__container__cp ">
                        <div class="data__contact">
                            <div class="data__contact__cp">
                                <a href="mailto:hello@atozmp.co.id" style="font-size: 1.5rem;" class="data__contact__cp__detail"><i class="ri-mail-fill"></i><?php echo $data['email'] ?></a>
                                <a href="tel:+02122784007" style="font-size: 1.5rem;" class="data__contact__cp__detail"><i class="ri-phone-fill"></i></i>0<?php echo $data['no_telp'] ?></a>
                                <a href="https://wa.me/62<?php echo $data['no_telp1'] ?>" style="font-size: 1.5rem;" class="data__contact__cp__detail"><i class="ri-whatsapp-fill"></i>0<?php echo $data['no_telp1'] ?></a>
                                <a href="https://wa.me/62<?php echo $data['no_telp2'] ?>" style="font-size: 1.5rem;" class="data__contact__cp__detail"><i class="ri-whatsapp-fill"></i>0<?php echo $data['no_telp2'] ?></a>
                            </div>
                        </div>
                    </div>

                    <div class="col contact__data__container__cp__maps">
                        <div class="col"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyDfOAzsXkiU9PcYKvYFG3_3iqxN-xozDNA&amp;q=place_id:<?php echo $data['place_id'] ?>&amp;zoom=11" width="100%" height="400"></iframe></div>
                    </div>
                </div>

            </div>

        </section>