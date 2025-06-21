<!-- Navbar -->
    <nav class="bg-[#242424] p-3 border-b border-gray-800 text-white fixed top-0 w-full z-50">
    <div class="flex justify-between items-center">
        <!-- Logo -->
        <div class="text-lg font-bold">
            <a href="../Home.html">Topup<span class="text-[#D7FD52]">in</span></a>
        </div>

    <!-- Desktop Menu -->
    <div class="hidden md:flex items-center space-x-4">
        <div class="relative">
            <input type="text" class="text-gray-400 rounded px-3 py-1 w-48" placeholder="Search..." />
            <button class="absolute right-2 top-1/2 transform -translate-y-1/2">
                <i class="fas fa-search text-gray-400"></i>
            </button>
        </div>
        <a href="History.html" class="hover:text-[#D7FD52] flex items-center gap-1">
            <i class="fas fa-box"></i> Lacak Pesanan
        </a>
        <a href="#" class="hover:text-[#D7FD52]">
          <i class="fas fa-user"></i>
        </a>
    </div>

    <!-- Burger Button (Mobile) -->
    <button class="md:hidden block focus:outline-none" aria-label="Open main menu" onclick="toggleDropdown()">
      <i class="fas fa-bars text-xl"></i>
    </button>
  </div>
</nav>
