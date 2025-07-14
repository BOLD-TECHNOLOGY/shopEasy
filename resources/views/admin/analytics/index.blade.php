<x-layouts.app :title="__('eliteShop | Analytics')">
    @include ('shop-easy.includes.dashboard-head')

    <div class="container">
        <h2>System Analytics</h2>

        <h4>Products per Category</h4>
        <canvas id="productsByCategoryChart"></canvas>

        <h4 class="mt-4">Products per Shop</h4>
        <canvas id="productsByShopChart"></canvas>

        <h4 class="mt-4">Users per Role</h4>
        <canvas id="usersByRoleChart"></canvas>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('productsByCategoryChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($productsByCategory->pluck('category')) !!},
                datasets: [{
                    label: 'Total Products',
                    data: {!! json_encode($productsByCategory->pluck('total')) !!},
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                }]
            },
        });

        new Chart(document.getElementById('productsByShopChart'), {
            type: 'bar',
            data: {
                labels: {!! json_encode($productsByShop->pluck('name')) !!},
                datasets: [{
                    label: 'Total Products',
                    data: {!! json_encode($productsByShop->pluck('products_count')) !!},
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                }]
            },
        });

        new Chart(document.getElementById('usersByRoleChart'), {
            type: 'pie',
            data: {
                labels: {!! json_encode($usersByRole->pluck('role')) !!},
                datasets: [{
                    label: 'User Count',
                    data: {!! json_encode($usersByRole->pluck('total')) !!},
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 205, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(201, 203, 207, 0.6)'
                    ],
                }]
            },
        });
    </script>
</x-layouts.app>
