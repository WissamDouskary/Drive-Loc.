<?php 
session_start();

if($_SESSION['role_id'] == 1){

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive & Loc - Admin Dashboard</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <style>
        .bg-primary { background-color: #FFD700; }
        .sidebar-link:hover { background-color: rgba(255, 215, 0, 0.1); }
    </style>
</head>
<body class="bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar -->
        <div class="w-64 bg-white shadow-lg">
            <div class="p-4">
                <h2 class="text-xl font-bold">Drive & Loc</h2>
                <p class="text-sm text-gray-600">Admin Panel</p>
            </div>
            <nav class="mt-6">
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-gray-700 hover:text-black border-l-4 border-primary">
                    Dashboard
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-gray-700 hover:text-black">
                    Vehicles
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-gray-700 hover:text-black">
                    Bookings
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-gray-700 hover:text-black">
                    Users
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-gray-700 hover:text-black">
                    Reviews
                </a>
                <a href="#" class="sidebar-link flex items-center px-4 py-3 text-gray-700 hover:text-black">
                    Settings
                </a>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex justify-between items-center px-6 py-4">
                    <h1 class="text-2xl font-bold">Dashboard</h1>
                    <div class="flex items-center space-x-4">
                        <span>Admin User</span>
                        <button class="text-gray-600 hover:text-gray-800">Logout</button>
                    </div>
                </div>
            </header>

            <!-- Dashboard Content -->
            <div class="p-6">
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-gray-500 text-sm">Total Bookings</h3>
                        <p class="text-3xl font-bold">1,234</p>
                        <span class="text-green-500 text-sm">+12% from last month</span>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-gray-500 text-sm">Active Vehicles</h3>
                        <p class="text-3xl font-bold">45</p>
                        <span class="text-green-500 text-sm">98% available</span>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-gray-500 text-sm">Total Users</h3>
                        <p class="text-3xl font-bold">892</p>
                        <span class="text-green-500 text-sm">+8% new users</span>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h3 class="text-gray-500 text-sm">Revenue</h3>
                        <p class="text-3xl font-bold">$12,345</p>
                        <span class="text-green-500 text-sm">+15% from last month</span>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="bg-white rounded-lg shadow mb-6">
                    <div class="p-6 border-b">
                        <h2 class="text-xl font-bold">Recent Bookings</h2>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">User</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Vehicle</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Date</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Action</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                <tr>
                                    <td class="px-6 py-4">#12345</td>
                                    <td class="px-6 py-4">John Doe</td>
                                    <td class="px-6 py-4">Toyota Corolla</td>
                                    <td class="px-6 py-4">2024-01-15</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-green-100 text-green-800 rounded-full text-sm">Active</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800">View</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-6 py-4">#12346</td>
                                    <td class="px-6 py-4">Jane Smith</td>
                                    <td class="px-6 py-4">Honda CR-V</td>
                                    <td class="px-6 py-4">2024-01-14</td>
                                    <td class="px-6 py-4">
                                        <span class="px-2 py-1 bg-yellow-100 text-yellow-800 rounded-full text-sm">Pending</span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <button class="text-blue-600 hover:text-blue-800">View</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Recent Reviews -->
                <div class="bg-white rounded-lg shadow">
                    <div class="p-6 border-b">
                        <h2 class="text-xl font-bold">Recent Reviews</h2>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <div class="border-b pb-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium">John Doe</p>
                                        <p class="text-sm text-gray-600">Toyota Corolla</p>
                                        <p class="mt-1">Great service and clean car!</p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-400">★★★★★</span>
                                    </div>
                                </div>
                            </div>
                            <div class="border-b pb-4">
                                <div class="flex justify-between items-start">
                                    <div>
                                        <p class="font-medium">Jane Smith</p>
                                        <p class="text-sm text-gray-600">Honda CR-V</p>
                                        <p class="mt-1">Very comfortable ride.</p>
                                    </div>
                                    <div class="flex items-center">
                                        <span class="text-yellow-400">★★★★☆</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?php 
}else if($_SESSION['role_id'] == 2){
    header('location: ../index.php');
    exit();
}else{
    header('location: ../autentification/signup.php');
    exit();
}
?>