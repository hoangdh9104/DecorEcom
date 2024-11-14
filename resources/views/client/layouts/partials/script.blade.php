@if (Auth::check())
    <script>
        document.querySelector('.dropdown-toggle').addEventListener('click', function() {
            const menu = document.getElementById('dropdown-menu');
            menu.classList.toggle('hidden');
        });
    </script>
@endif
