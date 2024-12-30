<?php 
session_start();

if(isset($_SESSION['role_id'])){

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Car Rental</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #FFD700;
            --secondary: #FFFFFF;
        }
        .bg-primary { background-color: var(--primary); }
        .btn-primary { 
            background-color: var(--primary);
            transition: transform 0.3s ease;
        }
        .btn-primary:hover {
            transform: translateY(-2px);
        }
        .card-hover {
            transition: transform 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body>
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-bold w-8 mr-24"><img src="../Drive-Loc/imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="LOGO"></span>
                </div>
                <div class="hidden w-full md:block md:w-auto">
                <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0">
                    <li>
                        <a href="../Drive-Loc/index.php" class="block py-2 pl-3 pr-4 text-black-200 border-b-2 border-black-200 md:p-0">Home</a>
                    </li>
                    <li>
                        <a href="../Drive-Loc/pages/vehicles.php" class="block py-2 pl-3 pr-4 text-white hover:text-blue-200 md:p-0">Cars</a>
                    </li>
                </ul>
                </div>
                <?php if(isset($_SESSION['user_id'])){ ?>
                <div class="flex items-center space-x-6">
                    <a href="#"><img width="50px" src="../Drive-Loc/imgs/profilephoto.png" alt=""></a>
                </div>
                <?php }else{ ?>
                <div class="flex items-center space-x-6">
                    <a href="../Drive-Loc/autentification/login.php">Login</a>
                    <a href="../Drive-Loc/autentification/signup.php" class="bg-white px-6 py-2 rounded-lg hover:bg-gray-100">Register</a>
                </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <main>
        <section class="bg-primary py-20">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h1 class="text-5xl font-bold mb-6">Discover Our Vehicle Fleet</h1>
                <p class="text-xl mb-8">Quick and easy rentals for all your travels</p>
                <a href="#vehicles" class="inline-block bg-white px-8 py-3 rounded-lg font-semibold hover:bg-gray-100">
                    View Our Vehicles
                </a>
            </div>
        </section>

        <section class="py-16 bg-white" id="vehicles">
            <div class="max-w-7xl mx-auto px-4">
                <h2 class="text-3xl font-bold text-center mb-12">Available Vehicles</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="rounded-lg shadow-lg overflow-hidden card-hover">
                        <img src="/api/placeholder/400/300" alt="City Car" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">Comfort City Car</h3>
                            <p class="text-gray-600 mb-4">Perfect for city driving</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold">$45/day</span>
                                <button class="btn-primary px-6 py-2 rounded-lg">Book Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg shadow-lg overflow-hidden card-hover">
                        <img src="/api/placeholder/400/300" alt="SUV" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">Family SUV</h3>
                            <p class="text-gray-600 mb-4">Ideal for travel</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold">$75/day</span>
                                <button class="btn-primary px-6 py-2 rounded-lg">Book Now</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-lg shadow-lg overflow-hidden card-hover">
                        <img src="/api/placeholder/400/300" alt="Premium" class="w-full h-48 object-cover">
                        <div class="p-6">
                            <h3 class="font-bold text-xl mb-2">Premium Sedan</h3>
                            <p class="text-gray-600 mb-4">Luxury within reach</p>
                            <div class="flex justify-between items-center">
                                <span class="text-lg font-bold">$95/day</span>
                                <button class="btn-primary px-6 py-2 rounded-lg">Book Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 text-center">
                <h2 class="text-3xl font-bold mb-8">Why Choose Us?</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-4">Quick Booking</h3>
                        <p>Simple and efficient process</p>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-4">Premium Service</h3>
                        <p>Recent and well-maintained vehicles</p>
                    </div>
                    <div class="p-6">
                        <h3 class="font-bold text-xl mb-4">24/7 Support</h3>
                        <p>A team at your service</p>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 Drive & Loc. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php 
}else{
    header('location: ../Drive-Loc/autentification/signup.php');
    exit();
}
?>