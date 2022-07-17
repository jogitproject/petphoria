<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [
            [
                'title' => 'Jazzmaster',
                'slug' => 'jazzmaster',
                'product_image' => 'img/featured1.png',
                'product_description' => 'A luxurious lifestyle with this timepiece from Hublot. Featuring a black ceramic dial with a two-tone blue star pattern design on hour markers, this watch offers a subtle yet sophisticated look. The Miyota 9132-20 movement is designed with a programmed power reserve of 72 hours and powers the watch via a powerful C9 Gloriette movement. The case is crafted in 18k rose gold, while the strap is made of black alligator.',
                'price' => '2000000',
                'is_sale' => true,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'title' => 'Ingersoll',
                'slug' => 'ingersoll',
                'product_image' => 'img/featured2.png',
                'product_description' => 'A luxurious lifestyle with this timepiece from Hublot. Featuring a black ceramic dial with a two-tone blue star pattern design on hour markers, this watch offers a subtle yet sophisticated look. The Miyota 9132-20 movement is designed with a programmed power reserve of 72 hours and powers the watch via a powerful C9 Gloriette movement. The case is crafted in 18k rose gold, while the strap is made of black alligator.',
                'price' => '3000000',
                'is_sale' => true,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
                [
                'title' => 'Submariner',
                'slug' => 'submariner',
                'product_image' => 'img/product7.png',
                'product_description' => 'The Oyster Perpetual Submariner is a reference among divers’ watches; it is the watch that unlocked the deep. </br></br>
                Launched in 1953, the Submariner was the first divers’ wristwatch waterproof to a depth of 100 metres (330 feet). This was the second great breakthrough in the technical mastery of waterproofness, following the invention of the Oyster, the world’s first waterproof wristwatch, in 1926. In watchmaking, the Submariner represented a historic turning point; it set the standard for divers’ watches. Today, the Submariner is waterproof to a depth of 300 metres (1,000 feet). </br></br>
                As an underwater survival tool, this watch’s design has been entirely by the practical needs of divers. Since 1953, the Submariner has evolved technically and  aesthetically as it has been endowed with features to improve overall functionality. The first watch was a pioneer and its subsequent versions have continued to set the benchmark for divers’ watches. </br></br>
                With its redesigned, sightly larger 41 mm, Oyster case, distinctive dial with large luminescent hour markers, unidirectional rotatable bezel with cerachrom insert and Oyster bracelet, the new generation Submariner and Submariner Date remain faithful to the orginal model.
',
                'price' => '132778500',
                'is_sale' => true,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'title' => 'Cosmograph Daytona',
                'slug' => 'cosmograph-daytona',
                'product_image' => 'img/product9.png',
                'product_description' => 'THIS OYSTER PERPETUAL COSMOGRAPH DAYTONA IN 18 CT YELLOW GOLD WITH A BLACK DIAL AND AN OYSTERFLEX BRACELET, FEATURES A BLACK CERACHROM BEZEL WITH TACHYMETRIC SCALE. </br></br>
                This chronograph was designed to be the ultimate timing tool for endurance racing drivers. More than 50 years after its creation, the Cosmograph Daytona remains in a class of its own among sport chronographs and continues to transcend time.</br></br>
                A key part of the model’s identity is the bezel moulded with a tachymetric scale for measuring average speeds of up to 400 miles or kilometres per hour. Blending high technology with sleek aesthetics, the black bezel is reminiscent of the 1965 model that was fitted with a black Plexiglas bezel insert.</br></br>
                The monobloc Cerachrom bezel in high-tech ceramic offers a number of advantages: it is corrosion resistant, virtually scratchproof and the colour is unaffected by UV rays. This extremely durable bezel also offers an exceptionally legible tachymetric scale, thanks to the deposition of a thin layer of platinum in the numerals and graduation via a PVD (Physical Vapour Deposition) process. The monobloc Cerachrom bezel is made in a single piece and holds the crystal firmly in place on the middle case, ensuring waterproofness.
',
                'price' => '434264000',
                'is_sale' => false,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
             [
                'title' => 'CELLINI MOONPHASE',
                'slug' => 'cellini-moonphase',
                'product_image' => 'img/product6.png',
                'product_description' => 'THE CELLINI MOONPHASE IN 18 CT EVEROSE GOLD WITH A LEATHER STRAP. </br></br>
                This model features an exclusive display of the phases of the moon. Its White dial with a blue enamel disc at 6 o’clock displays the lunar cycle where the full moon is depicted by a meteorite applique. </br></br>

                <b>The Rolex Moonphase marks a new milestone in the development of luxury watches,</b></br></br>
                confirming the Cellini range’s place at the apex of the world’s most prestigious chronometers. The introduction of the exclusive display of the lunar cycle has been awaited for decades — Rolex last manufactured timepieces with a lunar cycle in the 1950s. The Moonphase is the result of many years of research, innovation, prototype-modelling and testing for reliability and endurance.</br></br>
                But even among this exceptional array of highest-quality materials assembled by Rolex to create the Moonphase, one object has the power to send the owner’s imagination soaring across aeons of time and millions of miles of outer space: the meteoric iron disc representing the full Moon</br></br>
                Every privileged owner of a Moonphase will carry, for the rest of their lives, condensed on their wrist, a slice of a meteorite form across the Solar System – a celestial momento worn on the wrist which will, appropriately, mark the iconic and mysterious phases on the moon.

    ',
                'price' => '398336000',
                'is_sale' => false,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],
            [
                'title' => 'GST-B500AD-3ADR',
                'slug' => 'gst-b500ad-3adr',
                'product_image' => 'img/product10.png',
                'product_description' => 'Jam tangan pria Casio G-Shock dengan format analog digital. </br></br>
                Garis GST-B500 menyatukan komponen yang lebih kecil dan pemasangan dengan kepadatan tinggi, terus menghadirkan konektivitas Bluetooth dan pengisian daya surya, tetapi dalam profil yang lebih ramping. Carbon Core Guard menyerap guncangan eksternal untuk ketangguhan G-STEEL sejati, dan kenyamanannya melengkapi gaya hidup Anda yang unik. Pelindung tombol yang dirampingkan menawarkan tombol yang ramping namun cukup banyak yang mudah dioperasikan.</br></br>
                Bezel hadir dengan beberapa sentuhan akhir untuk menghadirkan tekstur logam yang luar biasa dari setiap sudut, untuk presentasi yang benar-benar canggih dengan tampilan istimewanya sendiri.

',
                'price' => '5939000',
                'is_sale' => false,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],

            [
                'title' => 'GST-B500GD-9ADR',
                'slug' => 'gst-b500gd-9adr',
                'product_image' => 'img/product12.png',
                'product_description' => 'Jam tangan pria Casio G-Shock G-Steel dengan format analog digital. </br></br>
                Garis GST-B500 menyatukan komponen yang lebih kecil dan pemasangan dengan kepadatan tinggi, terus menghadirkan konektivitas Bluetooth dan pengisian daya surya, tetapi dalam profil yang lebih ramping. Carbon Core Guard menyerap guncangan eksternal untuk ketangguhan G-STEEL sejati, dan kenyamanannya melengkapi gaya hidup Anda yang unik. Pelindung tombol yang dirampingkan menawarkan tombol yang ramping namun cukup banyak yang mudah dioperasikan.</br></br>
                Bezel dibuat dengan beberapa sentuhan akhir untuk menghadirkan tekstur logam yang luar biasa dari setiap sudut, untuk presentasi yang benar-benar canggih dengan tampilan istimewanya sendiri.

                ',
                'price' => '5939000',
                'is_sale' => false,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],

                  [
                'title' => 'Apple watch',
                'slug' => 'Apple-watch-series-7',
                'product_image' => 'img/product11.png',
                'product_description' => 'Layar Retina Selalu Aktif paling besar dan paling canggih menjadikan segala hal yang Anda lakukan dengan Apple Watch Series 7 lebih besar dan menakjubkan. Series 7 adalah Apple Watch paling tahan lama yang pernah dibuat, dengan kristal depan yang lebih tahan retakan. Berbagai fitur canggih memungkinkan Anda mengukur kadar oksigen darah,1 mendapatkan pemberitahuan kesehatan jantung, dan mengakses aplikasi pelacakan tidur dan kesadaran. Anda juga dapat memantau puluhan olahraga, termasuk yang baru seperti pilates dan tai chi.</br></br>

                Apple Watch Series 7 memerlukan iPhone 6s atau lebih baru dengan iOS 15 atau lebih baru. </br>
                1. Apple Watch Series 7, Apple Watch SE, dan Apple Watch Series 3 memiliki level tahan air 50 meter menurut standar ISO 22810:2010. Artinya, bisa digunakan untuk aktivitas air dangkal seperti berenang di kolam renang atau di laut. Namun, semuanya tidak boleh digunakan untuk scuba diving, ski air, atau aktivitas lainnya yang melibatkan air berkecepatan tinggi atau perendaman melebihi kedalaman dangkal. Series 7 juga tahan debu dengan level IP6x.</br>
                2. Pengukuran aplikasi Oksigen Darah bukan untuk tujuan medis, termasuk diagnosis mandiri atau konsultasi dengan dokter, dan hanya dirancang untuk tujuan kebugaran dan kesehatan secara umum.</br>
                3. Kekuatan baterai bervariasi tergantung penggunaan dan konfigurasi. Lihat apple.com/batteries untuk informasi selengkapnya.
                ',
                'price' => '7999999',
                'is_sale' => false,
                'created_at' => date('Y-m-d H:i:s', time()),
                'updated_at' => date('Y-m-d H:i:s', time())
            ],


    ];
    Product::insert($products);
    }
}
