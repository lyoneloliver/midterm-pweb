{{-- 
  REWRITE:
  - Latar belakang diubah ke `bg-gray-900` (lebih elegan).
  - Dibuat `h-screen` (tinggi penuh) dan `sticky top-0`.
  - class "sidebar-link" kustom dihapus, diganti utility class Tailwind.
  - Ditambahkan Ikon (bi bi-*)
  - Ditambahkan logic active state (request()->routeIs(...))
--}}
<aside class="w-64 bg-gray-900 text-gray-300 flex flex-col h-screen sticky top-0">
    
    {{-- Header Sidebar --}}
    <div class="p-6 text-2xl font-bold text-center text-white border-b border-gray-700">
        FRS System
    </div>

    {{-- Menu Navigasi --}}
    <nav class="flex-1 p-4 space-y-1">
        
        @if(Auth::user()->role === 'admin')
            <a href="{{ route('admin.dashboard') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('admin.dashboard') 
                         ? 'bg-blue-600 text-white'  /* <-- Style Aktif */
                         : 'hover:bg-gray-700 hover:text-white' /* Style Normal */
                      }}">
                <i class="bi bi-speedometer2 w-6 text-center text-lg"></i>
                <span class="ml-3">Dashboard</span>
            </a>

            <a href="{{ route('admin.users.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('admin.users.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-people w-6 text-center text-lg"></i>
                <span class="ml-3">Users</span>
            </a>

            <a href="{{ route('admin.departments.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('admin.departments.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-building w-6 text-center text-lg"></i>
                <span class="ml-3">Departments</span>
            </a>

            <a href="{{ route('admin.courses.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('admin.courses.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-journal-bookmark w-6 text-center text-lg"></i>
                <span class="ml-3">Courses</span>
            </a>

            <a href="{{ route('admin.settings.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('admin.settings.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-gear w-6 text-center text-lg"></i>
                <span class="ml-3">Settings</span>
            </a>

        @elseif(Auth::user()->role === 'lecturer')
            <a href="{{ route('lecturer.dashboard') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('lecturer.dashboard') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-speedometer2 w-6 text-center text-lg"></i>
                <span class="ml-3">Dashboard</span>
            </a>

            <a href="{{ route('lecturer.class-sections.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('lecturer.class-sections.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-journal-text w-6 text-center text-lg"></i>
                <span class="ml-3">Classes</span>
            </a>

            <a href="{{ route('lecturer.attendance.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('lecturer.attendance.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-clipboard-check w-6 text-center text-lg"></i>
                <span class="ml-3">Attendance</span>
            </a>

            <a href="{{ route('lecturer.grades.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('lecturer.grades.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-pencil-square w-6 text-center text-lg"></i>
                <span class="ml-3">Grades</span>
            </a>

        @elseif(Auth::user()->role === 'student')
            <a href="{{ route('student.dashboard') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('student.dashboard') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-house-door w-6 text-center text-lg"></i>
                <span class="ml-3">Dashboard</span>
            </a>
            
            <a href="{{ route('student.enrollments.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('student.enrollments.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-journal-check w-6 text-center text-lg"></i>
                <span class="ml-3">Enrollments</span>
            </a>

            <a href="{{ route('student.schedule.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('student.schedule.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-calendar-week w-6 text-center text-lg"></i>
                <span class="ml-3">Schedule</span>
            </a>

            <a href="{{ route('student.semester-enrollments.index') }}" 
               class="flex items-center px-4 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                      {{ request()->routeIs('student.semester-enrollments.*') 
                         ? 'bg-blue-600 text-white' 
                         : 'hover:bg-gray-700 hover:text-white' 
                      }}">
                <i class="bi bi-bar-chart-line w-6 text-center text-lg"></i>
                <span class="ml-3">Grades</span>
            </a>
        @endif
    </nav>

    {{-- Footer Sidebar --}}
    <footer class="p-4 text-sm text-center text-gray-500 border-t border-gray-700 mt-auto">
        &copy; {{ date('Y') }} FRS System
    </footer>
</aside>