<?php 
session_start();

if($_SESSION['role_id'] == 2){
    require_once('../classes/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Reservations - Drive & Loc</title>
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
        .btn-cancel {
            background-color: #FF4444;
            color: white;
            transition: transform 0.3s ease;
        }
        .btn-cancel:hover {
            transform: translateY(-2px);
            background-color: #FF0000;
        }
    </style>
</head>
<body>
    <!-- Navigation Bar (Same as original) -->
    <nav class="bg-primary shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-4">
                    <span class="text-2xl font-bold w-8 mr-24"><img src="../Drive-Loc/imgs/360_F_323469705_belmsoxt9kj49rxSmOBXpO0gHtfVJvjl-removebg-preview.png" alt="LOGO"></span>
                </div>
                <div class="hidden w-full md:block md:w-auto">
                    <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium rounded-lg md:flex-row md:space-x-8 md:mt-0">
                        <li>
                            <a href="../Drive-Loc/index.php" class="block py-2 pl-3 pr-4 text-white hover:text-blue-200 md:p-0">Home</a>
                        </li>
                        <li>
                            <a href="../Drive-Loc/pages/vehicles.php" class="block py-2 pl-3 pr-4 text-white hover:text-blue-200 md:p-0">Cars</a>
                        </li>
                        <li>
                            <a href="../Drive-Loc/pages/reservations.php" class="block py-2 pl-3 pr-4 text-black-200 border-b-2 border-black-200 md:p-0">My Reservations</a>
                        </li>
                    </ul>
                </div>
                <?php if(isset($_SESSION['user_id'])){ ?>
                    <!-- User Menu (Same as original) -->
                    <div class="flex items-center md:order-2 space-x-3 md:space-x-0 rtl:space-x-reverse">
                        <!-- ... (rest of the user menu code) ... -->
                    </div>
                <?php } ?>
            </div>
        </div>
    </nav>

    <main class="py-16">
        <div class="max-w-7xl mx-auto px-4">
            <h1 class="text-3xl font-bold mb-8">My Reservations</h1>
            
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Vehicle</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Start Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">End Date</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Total Price</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <?php
                            
                            while($row = $stmt->fetch()) {
                                $status_class = $row['status'] == 'active' ? 'text-green-600' : 'text-gray-500';
                            ?>
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">
                                            <?php echo htmlspecialchars($row['brand'] . ' ' . $row['model']); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <?php echo date('M d, Y', strtotime($row['start_date'])); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <?php echo date('M d, Y', strtotime($row['end_date'])); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            $<?php echo number_format($row['total_price'], 2); ?>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full <?php echo $status_class; ?>">
                                            <?php echo ucfirst($row['status']); ?>
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <?php if($row['status'] == 'active') { ?>
                                            <form action="../Drive-Loc/classes/reservation.php" method="POST">
                                                <input type="hidden" name="reservation_id" value="<?php echo $row['id']; ?>">
                                                <input type="hidden" name="action" value="cancel">
                                                <button type="submit" class="btn-cancel px-4 py-2 rounded-lg text-sm">
                                                    Cancel
                                                </button>
                                            </form>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 Drive & Loc. All rights reserved.</p>
        </div>
    </footer>

    <script src="../Drive-Loc/scripts/script.js"></script>
</body>
</html>
<?php 
} else {
    header('location: ../Drive-Loc/autentification/signup.php');
    exit();
}
?>