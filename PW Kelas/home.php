<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="style-native.css">
    <title>Toko Roti</title>
</head>
<body>
<header>
    <nav class="navbar" id="navbar">
        <a class="navbar-brand" href="#" style="font-size: 40px; color: white; display: flex; align-items: center;">
            <img src="assets/3526962.jpg" alt="Logo" width="60px" height="60px">
        </a>
        <div class="profile-drop" style="margin-left: auto;">
            <!-- Hidden checkbox to toggle dropdown visibility -->
            <input type="checkbox" id="profile-toggle" class="profile-toggle">
            
            <!-- Button with profile image -->
            <label for="profile-toggle" style="padding: 20px;">
                <img src="assets/3526962.jpg" alt="Profile Picture" class="profile-pic" style="width: 40px; height: 40px; border-radius: 50%;">
            </label>
            
            <!-- Dropdown menu -->
            <div class="profile-menu">
                <a href="myprofile.html">My Profile</a>
                <a href="inbox.html">Inbox</a>
                <a href="notifikasi.html">Notifikasi</a>
                <a href="library.html">Library</a>
                <hr style="height: 1px;">
                <a href="qna.html">Q&A</a>
                <a href="settings.html">Settings</a>
                <a href="login.html">Log Out</a>
            </div>
        </div>
    </nav>
</header>




    <main>
        <section>
            <div class="container" style="background-image: url(assets/background.jpg);">
                <div class="bg-blur" style="color: white;">
                    <h4 class="text-white" style="margin-top: 14vh;">Welcome to</h6>
                    <h4  style="font-size: 60px;">
                        TOKO ROTI KITA.
                    </h4>
                    <p style="font-size: 20px;">"Toko Roti: Tempat di mana kehangatan dan rasa berpadu, menghadirkan kelezatan dari seluruh dunia dalam setiap gigitan yang Anda nikmati."</p>
                    <button type="button"
                        style="border: 2px solid white; border-radius: 25px; width: 150px; height: 50px; background-color: rgba(128, 128, 128, 0.399);"><a href="login.html"
                            style="color: white; text-decoration: none;">Learn More</a></button>
                </div>
            </div>
        </section>

        <section>
            <div class="container" style="display: flex; justify-content: center; align-items: center; margin-top: 40px;">
                <div class="container" style="display: flex; width: 70%; padding: 30px; justify-content: space-between; background-color:#7e675e67; border-radius: 25px;">
                    <div class="container-left" style="width: 50%;">
                        <div class="title-populer">
                            <i class="bi bi-fire" style="color: #7E675E;"></i><a
                                style="padding-left: 5px;color: #7E675E;">Discount Bundle</a>
                        </div>
                        <h3 style="font-size: 45px; color: black; font-weight: bold;">Paket Cromboloni Eksklusif </h3>
                        <h6 style="color: #7E675E;">Diskon Hingga 30%</h6>
                        <p>
                            <span style="text-decoration: line-through; color: #7E675E;">Rp 150.000</span>
                            <span style="font-weight: bold; font-size: 20px; color: #7E675E; margin-left: 10px;">Rp 105.000</span>
                        </p>
                        <a href="beli.html" style="color: red;">Buy Now</a>
                    </div>
                    <div class="container-right" style="justify-content: center; align-items: center; display: flex; width: 50%;">
                        <img src="assets/group.jpeg" class="img-promo" alt="Promo Bundle" width="60%">

                    </div>
                </div>
            </div> 
        </section>

        <section>
         
                <div class="list-title" style="justify-content: space-between; display: flex; padding: 25px;">
                    <h5 style="color:#7E675E;">Menu Roti</h5>
                    <a href="best-seller.html" style="color: #7E675E; text-decoration: none;">See all <i
                            class="bi bi-arrow-right-circle" style="color: #7E675E;"></i></a>
                </div>

                <div class="container list-fiksi" style="padding-left: 70px;">
                    <div class="container list-fiksi">
                        <ol class="menu-roti">
                            <?php
                            // Include koneksi database
                            include 'inc/inc_connection.php';
                    
                            // Query untuk mengambil data
                            $sql = "SELECT nama, harga, img_path FROM product";
                            $result = $conn->query($sql);
                    
                            if ($result->num_rows > 0) {
                                // Loop data dari database
                                while ($row = $result->fetch_assoc()) {
                                    echo '
                                    <li class="roti-cover">
                                        <img src="' . $row["img_path"] . '" alt="' . htmlspecialchars($row["nama"]) . '" class="roti-image">
                                        <div class="title">' . htmlspecialchars($row["nama"]) . '</div>
                                        <div class="harga">Harga: Rp ' . number_format($row["harga"], 0, ',', '.') . '</div>
                                    </li>';
                                }
                            } else {
                                echo '<li class="roti-cover">Belum ada data tersedia.</li>';
                            }
                    
                            // Tutup koneksi
                            $conn->close();
                            ?>
                        </ol>
                    </div>                        
                        <!-- Add more books as needed -->
                    </ol>
                </div>
        </section>

    </main>



    <script>
    // Mengambil elemen navbar
    const navbar = document.getElementById("navbar");

    // Fungsi untuk mendeteksi scroll dan menambahkan kelas
    window.onscroll = function() {
        if (window.scrollY > 50) { // Ketika scroll lebih dari 50px
            navbar.classList.add("scrolled");
        } else {
            navbar.classList.remove("scrolled");
        }
    };
</script>

</body>
</html>